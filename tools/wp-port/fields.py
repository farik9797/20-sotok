"""Превращает тексты и картинки макета в поля SCF/ACF со значениями по умолчанию из макета.

Каждый текстовый элемент (заголовок, абзац, пункт списка, ячейка, надзаголовок) и каждая
картинка страницы получает своё поле. В шаблоне на их месте — вызов s20_t()/s20_img(),
который выводит значение поля, а пока поле пустое — исходный текст макета. Поэтому сразу
после установки сайт совпадает с макетом 1:1, а редактор правит контент в админке.

Ссылки и контакты внутри текстов хранятся заполнителями ({url:uslugi}, {asset}, {phone}…),
их разворачивает s20_expand() — так тексты не привязаны к домену и меняются вместе с настройками.
"""
import hashlib
import html
import html.parser
import re

FIELD_TAGS = {'h1', 'h2', 'h3', 'h4', 'p', 'li', 'dt', 'dd', 'th', 'td', 'figcaption'}
FIELD_CLASSES = {'eyebrow', 'spec-val', 'spec-lbl'}
BLOCK_TAGS = FIELD_TAGS | {'div', 'ul', 'ol', 'section', 'article', 'table', 'dl', 'figure', 'header', 'footer', 'nav', 'form'}
VOID = {'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'source', 'track', 'wbr'}

# контакты: строка макета → ключ настройки сайта
CONTACTS = [
    ('tel:+375445173050', '{tel}'),
    ('https://t.me/+375445173050', '{telegram}'),
    ('viber://chat?number=%2B375445173050', '{viber}'),
    ('mailto:by20sotok@gmail.com', 'mailto:{email}'),
    ('https://www.instagram.com/20sotok.by/', '{instagram}'),
    ('+375 (44) 517-30-50', '{phone}'),
    ('by20sotok@gmail.com', '{email}'),
    ('Ежедневно 9:00–20:00', '{hours}'),
    ('ИП Денисов Евгений Игоревич', '{company}'),
    ('УНП 193435021', 'УНП {unp}'),
    ('г. Минск, ул. Козыревская, 15, офис 604', '{office}'),
]


def to_placeholders(raw):
    """Сырой HTML макета → текст с заполнителями (для значений по умолчанию)."""
    s = re.sub(r'(?<=")(?:\.\./)*assets/', '{asset}', raw)

    def page(m):
        path, anchor = m.group(1), m.group(2) or ''
        return '"{url:%s}%s"' % ('' if path == 'index' else path, anchor)
    s = re.sub(r'"(?:\.\./)*([a-z0-9-]+(?:/[a-z0-9-]+)?)\.html(#[^"]*)?"', page, s)
    for src, ph in CONTACTS:
        s = s.replace(src, ph)
    return s


def contacts_php(s):
    """Контакты в тексте шаблона → вызовы настроек сайта."""
    for src, ph in CONTACTS:
        php = re.sub(r'\{(\w+)\}', lambda m: "<?php echo esc_html(s20_c('%s')); ?>" % m.group(1), ph)
        s = s.replace(src, php)
    return s


class _Scanner(html.parser.HTMLParser):
    """Находит текстовые элементы и картинки с точными смещениями в исходной строке."""

    def __init__(self, text):
        super().__init__(convert_charrefs=False)
        self.text = text
        self.line_starts = [0]
        for m in re.finditer('\n', text):
            self.line_starts.append(m.end())
        self.stack = []      # [tag, attrs, start, inner_start, has_block_child]
        self.found = []      # (kind, start, inner_start, inner_end, end, tag, attrs)

    def _offset(self):
        line, col = self.getpos()
        return self.line_starts[line - 1] + col

    def handle_starttag(self, tag, attrs):
        start = self._offset()
        end_of_tag = start + len(self.get_starttag_text())
        attrs = dict(attrs)
        if tag == 'img':
            self.found.append(('img', start, None, None, end_of_tag, tag, attrs))
            return
        if tag in VOID:
            return
        if tag in BLOCK_TAGS:
            for item in self.stack:
                item[4] = True
        self.stack.append([tag, attrs, start, end_of_tag, False])

    def handle_startendtag(self, tag, attrs):
        if tag == 'img':
            start = self._offset()
            self.found.append(('img', start, None, None, start + len(self.get_starttag_text()), tag, dict(attrs)))

    def handle_endtag(self, tag):
        if tag in VOID:
            return
        pos = self._offset()
        while self.stack:
            item = self.stack.pop()
            if item[0] == tag:
                t, attrs, start, inner_start, has_block = item
                classes = set((attrs.get('class') or '').split())
                wanted = t in FIELD_TAGS or (classes & FIELD_CLASSES)
                inner = self.text[inner_start:pos]
                if wanted and not has_block and re.sub(r'<[^>]+>', '', inner).strip():
                    self.found.append(('text', start, inner_start, pos, None, t, attrs))
                return


def _label(tag, attrs, inner):
    text = html.unescape(re.sub(r'<[^>]+>', ' ', inner))
    text = re.sub(r'\s+', ' ', text).strip()
    kind = {'h1': 'Заголовок H1', 'h2': 'Заголовок H2', 'h3': 'Заголовок H3', 'h4': 'Заголовок H4',
            'p': 'Абзац', 'li': 'Пункт списка', 'dt': 'Термин', 'dd': 'Значение', 'th': 'Заголовок колонки',
            'td': 'Ячейка', 'figcaption': 'Подпись'}.get(tag, 'Текст')
    classes = (attrs.get('class') or '').split()
    if 'eyebrow' in classes:
        kind = 'Надзаголовок'
    elif 'spec-val' in classes:
        kind = 'Цифра'
    elif 'spec-lbl' in classes:
        kind = 'Подпись к цифре'
    return '%s: «%s»' % (kind, text[:60] + ('…' if len(text) > 60 else ''))


def _sections(body):
    """Границы секций верхнего уровня и подписи для вкладок редактора."""
    out = []
    for m in re.finditer(r'<section\b[^>]*>', body):
        if any(a <= m.start() < b for a, b, _ in out):
            continue
        depth, end = 0, None
        for t in re.finditer(r'<(/?)section\b[^>]*>', body[m.start():]):
            depth += -1 if t.group(1) else 1
            if depth == 0:
                end = m.start() + t.end()
                break
        chunk = body[m.start():end]
        eb = re.search(r'class="eyebrow[^"]*"[^>]*>(.*?)</', chunk, re.S)
        hd = re.search(r'<h[12][^>]*>(.*?)</h[12]>', chunk, re.S)
        name = eb.group(1) if eb else (hd.group(1) if hd else '')
        name = re.sub(r'\s+', ' ', html.unescape(re.sub(r'<[^>]+>', ' ', name))).strip()
        out.append((m.start(), end, name))
    return out


def extract(page_key, body):
    """Возвращает (тело с маркерами полей, список полей).

    Маркеры \x00T:key\x00 и \x00I:key:src|alt\x00 заменяются на PHP после переписывания адресов.
    """
    sc = _Scanner(body)
    sc.feed(body)
    sc.close()
    sections = _sections(body)
    # вложенные кандидаты: оставляем внешний текстовый элемент, всё внутри него — часть его текста
    texts = [(f[2], f[3]) for f in sc.found if f[0] == 'text']
    def inside(f):
        a = f[1]
        return any(s0 < a and (f[4] or f[3]) <= e0 for s0, e0 in texts if (s0, e0) != (f[2], f[3]))
    sc.found = [f for f in sc.found if not inside(f)]
    fields = []
    edits = []          # (start, end, replacement)
    counters = {}
    for kind, start, inner_start, inner_end, end, tag, attrs in sorted(sc.found, key=lambda x: x[1]):
        sec_idx = next((i for i, (a, b, _) in enumerate(sections) if a <= start < b), -1)
        prefix = '%s_s%02d' % (page_key, sec_idx + 1) if sec_idx >= 0 else '%s_x' % page_key
        n = counters[prefix] = counters.get(prefix, 0) + 1
        key = '%s_%02d' % (prefix, n)
        tab = sections[sec_idx][2] if sec_idx >= 0 else 'Прочее'
        tab_no = sec_idx + 1 if sec_idx >= 0 else 99
        if kind == 'text':
            raw = body[inner_start:inner_end]
            default = to_placeholders(raw)
            fields.append({'key': key, 'type': 'text', 'tab': tab, 'tab_no': tab_no,
                           'label': _label(tag, attrs, raw), 'default': default})
            edits.append((inner_start, inner_end, '\x00T:%s\x00' % key))
        else:
            src = attrs.get('src', '')
            if 'assets/' not in src:
                continue
            tagtext = body[start:end]
            asset = re.sub(r'^(?:\.\./)*assets/', '', src)
            alt = attrs.get('alt', '')
            new = re.sub(r'\ssrc="[^"]*"', ' src="\x00I:%s:src\x00"' % key, tagtext, count=1)
            if 'alt="' in new:
                new = re.sub(r'\salt="[^"]*"', ' alt="\x00I:%s:alt\x00"' % key, new, count=1)
            fields.append({'key': key, 'type': 'image', 'tab': tab, 'tab_no': tab_no,
                           'label': 'Картинка: %s' % (alt[:60] or asset), 'default': asset,
                           'alt': html.unescape(alt)})
            edits.append((start, end, new))
    for start, end, rep in sorted(edits, key=lambda e: e[0], reverse=True):
        body = body[:start] + rep + body[end:]
    return body, fields


def markers_to_php(s):
    s = re.sub(r'\x00T:([\w]+)\x00', r"<?php s20_t('\1'); ?>", s)
    s = re.sub(r'\x00I:([\w]+):(src|alt)\x00', r"<?php s20_img('\1', '\2'); ?>", s)
    return s


def stable_hash(s):
    return hashlib.md5(s.encode('utf-8')).hexdigest()[:8]
