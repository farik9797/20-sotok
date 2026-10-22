#!/usr/bin/env python3
"""Попиксельное сравнение снимков макета и WordPress, собранных compare.mjs.

python3 tools/wp-port/pixdiff.py <папка-отчёта>
Для каждой пары считает долю отличающихся пикселей (порог 16 по сумме каналов —
отсекает шум сглаживания) и сохраняет картинку различий, если они есть.
"""
import json
import pathlib
import sys

from PIL import Image, ImageChops

out = pathlib.Path(sys.argv[1])
rows = []
for st in sorted(out.glob('*__static.png')):
    wp = st.with_name(st.name.replace('__static.png', '__wp.png'))
    a, b = Image.open(st).convert('RGB'), Image.open(wp).convert('RGB')
    mode, page, _ = st.name.split('__')
    if a.size != b.size:
        rows.append((mode, page, None, f'размер {a.size} ≠ {b.size}'))
        h = min(a.height, b.height)
        a, b = a.crop((0, 0, a.width, h)), b.crop((0, 0, b.width, h))
    diff = ImageChops.difference(a, b)
    mask = diff.convert('L').point(lambda v: 255 if v > 16 else 0)
    changed = sum(1 for v in mask.getdata() if v)
    share = changed / (a.width * a.height)
    bbox = mask.getbbox()
    note = ''
    if changed:
        vis = Image.blend(a, Image.new('RGB', a.size, (255, 0, 0)), 0.0)
        vis.paste((255, 0, 0), mask=mask)
        vis.save(out / f'{mode}__{page}__DIFF.png')
        note = f'область отличий {bbox}'
    rows.append((mode, page, share, note))

bad = 0
for mode, page, share, note in rows:
    flag = 'ок ' if share == 0 else 'РАЗ'
    if share != 0:
        bad += 1
    print(f'{flag} {mode:11} {page:22} {"" if share is None else f"{share * 100:.4f}%":>10}  {note}')
print(f'\nпар: {len(rows)}, с отличиями: {bad}')
json.dump([dict(mode=m, page=p, share=s, note=n) for m, p, s, n in rows], open(out / 'pixdiff.json', 'w'), ensure_ascii=False, indent=1)
