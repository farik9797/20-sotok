# Промпты для видео-фона первого экрана (Google Flow / Veo)

Итоговый файл: `assets/video/hero.mp4` (16:9, 1080p, без звука, 24–32 с, петля). Постер: `assets/img/hero.jpg`.

## Общий стиль (в начало каждого промпта)
Cinematic hero background video for a premium landscape engineering studio website. Moody, restrained, architectural aesthetic in the spirit of a high-end Scandinavian design studio. Muted palette: anthracite grey, warm stone, deep fir green, hints of brass in the light. Overcast-to-golden-hour lighting, soft shadows, slight haze. Slow, steady camera, shallow depth of field, 35mm lens look, fine film grain. Photorealistic, no people, no faces, no text, no logos, no watermarks. 16:9, 4K, 24 fps, seamless slow motion suitable for looping.

## Кадр 1 — автополив
A pop-up rotor sprinkler rising from a perfectly flat, freshly mown lawn next to a modern dark-clad private house. A slow arc of fine water spray catches low warm sunlight, droplets sparkling and drifting. Low camera angle at grass level, slow lateral dolly move to the right. Water mist in the foreground, house softly out of focus in the background. Calm, precise, engineered feel.

## Кадр 2 — газон крупно (начало и конец петли)
Extreme close-up of dense, deep green rolled turf with water droplets on the blades after irrigation. Camera glides slowly forward just above the grass, droplets refracting soft light. A faint reflection of a dark modern house in a droplet. Shallow depth of field, gentle motion, meditative rhythm.

## Кадр 3 — мощение
Large-format light grey paving slabs on a private driveway, perfectly aligned with crisp joints, a brass-toned brick edge running along a curved border. Overhead-to-oblique camera slowly tracking along the joints, a red laser level line visible on the surface. Rain-damp stone with subtle reflections, water flowing along a linear drainage channel. Precise geometry, architectural calm.

## Кадр 4 — общий план участка
Slow aerial drone shot rising over a landscaped plot in a suburban Belarusian cottage village at dusk: dark modern house, immaculate lawn, curved paved paths, warm garden lights just switching on, sprinklers working in the distance. Birch and pine trees around the edge, slight evening mist. Smooth, slow ascent, no fast movement.

## Негативный промпт
no people, no text, no logos, no bright neon greens, no oversaturated colors, no fast camera moves, no shaky footage, no lens flares, no cartoon or 3D-render look

## Сборка
- По 8 с на кадр, 2–3 варианта каждого, склейка в Scenebuilder: 2 → 1 → 3 → 4 → 2.
- Сжатие: `ffmpeg -i hero_flow.mp4 -an -vf "scale=1920:-2,fps=24" -c:v libx264 -crf 26 -preset slow -movflags +faststart assets/video/hero.mp4`
- Постер: `ffmpeg -ss 00:00:02 -i assets/video/hero.mp4 -frames:v 1 -q:v 3 assets/img/hero.jpg`

## Объединённый промпт (все 4 кадра одной последовательностью)
Cinematic hero background video for a premium landscape engineering studio website, one continuous slow montage of four shots with soft cross-dissolves. Moody, restrained, architectural aesthetic in the spirit of a high-end Scandinavian design studio. Muted palette: anthracite grey, warm stone, deep fir green, hints of brass in the light. Overcast-to-golden-hour lighting, soft shadows, slight haze, shallow depth of field, 35mm lens look, fine film grain. Slow, steady camera throughout, no fast movement. Photorealistic, no people, no faces, no text, no logos, no watermarks. 16:9, 4K, 24 fps.

Shot 1: extreme close-up of dense deep-green rolled turf with water droplets on the blades, camera gliding slowly forward just above the grass, droplets refracting soft light.
Shot 2: dissolve to a pop-up rotor sprinkler rising from a perfectly flat lawn next to a modern dark-clad private house, a slow arc of fine water spray catching low warm sunlight, low camera angle at grass level, slow lateral dolly to the right.
Shot 3: dissolve to large-format light grey paving slabs on a private driveway with crisp joints and a curved brass-toned brick edge, oblique camera slowly tracking along the joints, a red laser level line on the rain-damp stone, water flowing along a linear drainage channel.
Shot 4: dissolve to a slow aerial drone shot rising over the whole landscaped plot in a suburban Belarusian cottage village at dusk: dark modern house, immaculate lawn, curved paved paths, warm garden lights switching on, sprinklers working in the distance, birch and pine trees around the edge, slight evening mist.
End on the drone shot slowly settling, ready to loop back to the turf close-up.

Negative: no people, no text, no logos, no bright neon greens, no oversaturated colors, no fast camera moves, no shaky footage, no lens flares, no cartoon or 3D-render look.

Применение в Flow: первый клип с пометкой `Play only Shot 1 in this clip`, далее Extend с тем же промптом и пометками `Continue with Shot 2` … `Shot 4` — итого 32 секунды.
