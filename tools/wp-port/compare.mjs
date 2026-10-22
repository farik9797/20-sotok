// Сверка WordPress-версии с макетом 1:1.
// Для каждой страницы: видимый текст, структура (секции, ссылки, картинки, видео) и попиксельное сравнение
// полностраничных снимков в двух темах и двух ширинах. Анимации выключены через prefers-reduced-motion —
// main.js в этом режиме GSAP не запускает, поэтому снимки детерминированы.
//
// node tools/wp-port/compare.mjs <база-макета> <база-WP> <папка-отчёта> [фильтр-страниц]
import pw from '/opt/homebrew/lib/node_modules/@playwright/mcp/node_modules/playwright/index.js';
import fs from 'node:fs';
import path from 'node:path';

const { chromium } = pw;
const [, , STATIC, WP, OUTDIR, FILTER] = process.argv;
const EXE = process.env.PW_EXE;
const PAGES = [
  ['index.html', ''], ['o-kompanii.html', 'o-kompanii/'], ['uslugi.html', 'uslugi/'],
  ['uslugi/plitka.html', 'uslugi/plitka/'], ['uslugi/gazon.html', 'uslugi/gazon/'], ['uslugi/poliv.html', 'uslugi/poliv/'],
  ['uslugi/drenazh.html', 'uslugi/drenazh/'], ['proekty.html', 'proekty/'], ['blog.html', 'blog/'],
  ['kontakty.html', 'kontakty/'], ['politika.html', 'politika/'],
].filter(([s]) => !FILTER || s.includes(FILTER));
const MODES = [
  { name: '1440-dark', w: 1440, h: 900, theme: 'dark' },
  { name: '390-dark', w: 390, h: 844, theme: 'dark', mobile: true },
  { name: '1440-light', w: 1440, h: 900, theme: 'light' },
  { name: '390-light', w: 390, h: 844, theme: 'light', mobile: true },
];
fs.mkdirSync(OUTDIR, { recursive: true });

// снимок страницы в «замороженном» состоянии + выжимка структуры
async function capture(ctx, url, file) {
  const p = await ctx.newPage();
  const errors = [];
  p.on('pageerror', (e) => errors.push(String(e).slice(0, 120)));
  p.on('console', (m) => { if (m.type() === 'error') errors.push(m.text().slice(0, 120)); });
  const resp = await p.goto(url, { waitUntil: 'load', timeout: 90000 });
  await p.evaluate(async () => {
    // ленивые картинки и постеры: проходим страницу, чтобы всё догрузилось
    for (let y = 0; y < document.body.scrollHeight; y += 600) { window.scrollTo(0, y); await new Promise((r) => setTimeout(r, 40)); }
    window.scrollTo(0, 0);
    document.querySelectorAll('img[loading="lazy"]').forEach((i) => { i.loading = 'eager'; });
    await Promise.all([...document.images].map((i) => i.complete ? 0 : new Promise((r) => { i.onload = i.onerror = r; setTimeout(r, 8000); })));
    // видео: стоп на первом кадре
    await Promise.all([...document.querySelectorAll('video')].map((v) => new Promise((r) => {
      try { v.pause(); v.removeAttribute('autoplay'); if (v.readyState > 0 && v.currentTime !== 0) { v.addEventListener('seeked', r, { once: true }); v.currentTime = 0; setTimeout(r, 3000); } else r(); } catch (e) { r(); }
    })));
    await document.fonts.ready;
    const st = document.createElement('style');
    st.textContent = '*,*::before,*::after{animation:none!important;transition:none!important;caret-color:transparent!important}' +
      '.cookie-bar,.scroll-progress,#wpadminbar,.cursor-ring,.cursor-dot{display:none!important}';
    document.head.appendChild(st);
  });
  await p.waitForTimeout(600);
  const info = await p.evaluate(() => {
    const vis = (e) => { const cs = getComputedStyle(e); return cs.display !== 'none' && cs.visibility !== 'hidden'; };
    const text = document.body.innerText.replace(/\s+/g, ' ').trim();
    return {
      text,
      sections: [...document.querySelectorAll('body section')].map((s) => (s.id || '') + '.' + s.className.trim().replace(/\s+/g, '.')),
      links: [...document.querySelectorAll('a[href]')].map((a) => a.getAttribute('href')).filter((h) => !h.startsWith('#')).length,
      images: [...document.images].filter(vis).map((i) => i.currentSrc.split('/').pop() + (i.naturalWidth ? '' : ' [не загружена]')),
      videos: [...document.querySelectorAll('video')].map((v) => (v.currentSrc || v.querySelector('source')?.getAttribute('src') || '').split('/').pop()),
      height: document.documentElement.scrollHeight,
      title: document.title,
    };
  });
  await p.screenshot({ path: file, fullPage: true });
  await p.close();
  return { status: resp ? resp.status() : 0, errors, ...info };
}

const browser = await chromium.launch({ executablePath: EXE });
const report = [];
for (const mode of MODES) {
  const ctxOpts = { viewport: { width: mode.w, height: mode.h }, deviceScaleFactor: 1, locale: 'ru-RU',
    reducedMotion: 'reduce', isMobile: !!mode.mobile, hasTouch: !!mode.mobile };
  for (const [src, wpPath] of PAGES) {
    const key = src.replace(/[/.]/g, '_');
    const res = {};
    for (const [label, base, rel] of [['static', STATIC, src], ['wp', WP, wpPath]]) {
      const ctx = await browser.newContext(ctxOpts);
      await ctx.addInitScript((t) => { try { localStorage.setItem('theme', t); localStorage.setItem('cookie-notice', 'hidden'); } catch (e) {} }, mode.theme);
      res[label] = await capture(ctx, base + rel, path.join(OUTDIR, `${mode.name}__${key}__${label}.png`));
      await ctx.close();
    }
    const s = res.static, w = res.wp;
    const diffList = (a, b) => ({ only_static: a.filter((x) => !b.includes(x)), only_wp: b.filter((x) => !a.includes(x)) });
    report.push({
      mode: mode.name, page: src, status: [s.status, w.status],
      text_equal: s.text === w.text,
      text_diff: s.text === w.text ? null : firstDiff(s.text, w.text),
      sections_equal: JSON.stringify(s.sections) === JSON.stringify(w.sections),
      links: [s.links, w.links], images: diffList(s.images, w.images), videos: diffList(s.videos, w.videos),
      height: [s.height, w.height], errors: { static: s.errors, wp: w.errors }, title_equal: s.title === w.title,
    });
    process.stdout.write(`${mode.name} ${src} — текст ${s.text === w.text ? 'совпал' : 'РАЗНЫЙ'}, высота ${s.height}/${w.height}\n`);
  }
}
await browser.close();
fs.writeFileSync(path.join(OUTDIR, 'report.json'), JSON.stringify(report, null, 1));

function firstDiff(a, b) {
  let i = 0;
  while (i < a.length && a[i] === b[i]) i++;
  return { at: i, static: a.slice(Math.max(0, i - 40), i + 80), wp: b.slice(Math.max(0, i - 40), i + 80) };
}
