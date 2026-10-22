<?php
/* page-poliv.php — собрано из макета uslugi/poliv.html скриптом tools/wp-port/build_theme.py. */
get_header();
?>

<section class="hero-sub">
  <div class="hero-media"><img src="<?php echo S20_A; ?>img/hero-svc-irrigation.jpg" alt="" aria-hidden="true" data-parallax="7"></div>
  <div class="hero-shade"></div>
  <div class="wrap hero-inner">
    <div class="eyebrow mb-6" data-hero-seq>Услуга 03 · Полив · Свет</div>
    <h1 class="h1 lg:max-w-[30ch]" data-hero-seq>Автоматический полив и ландшафтное освещение</h1>
    <div class="grid gap-8 lg:grid-cols-12 mt-10 items-end">
      <p class="lead muted lg:col-span-7" data-hero-seq>Проектируем зоны полива без слепых пятен, ставим оборудование Hunter и Rain Bird с датчиками погоды и управлением со смартфона. Освещение прокладываем в той же траншее — одной командой</p>
      <div class="lg:col-span-5 grid gap-3 lg:w-max lg:justify-self-end" data-hero-seq>
        <a href="#raschet" class="btn btn-brass btn-lg w-full">Рассчитать бюджет за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <a href="<?php echo s20_url('proekty'); ?>" class="btn btn-ghost btn-lg w-full">Проекты</a>
      </div>
    </div>
    <div class="spec-strip hero-specs mt-12" data-hero-seq><div class="spec"><div class="spec-val">0</div><div class="spec-lbl">слепых зон: перекрытие head-to-head в каждом проекте</div></div><div class="spec"><div class="spec-val">100 <b>%</b></div><div class="spec-lbl">управление со смартфона: Hunter Hydrawise / Rain Bird LNK</div></div><div class="spec"><div class="spec-val">−30 <b>%</b></div><div class="spec-lbl">воды за сезон при работе датчика погоды</div></div><div class="spec"><div class="spec-val">12 <b>В</b></div><div class="spec-lbl">безопасное ландшафтное освещение в одной траншее с поливом</div></div></div>
  </div>
</section>

<!-- Ключевые показатели -->
<section class="specs" aria-label="Ключевые показатели">
  <div class="wrap">
    <div class="spec-strip" data-reveal="stagger"><div class="spec"><div class="spec-val">0</div><div class="spec-lbl">слепых зон: перекрытие head-to-head в каждом проекте</div></div><div class="spec"><div class="spec-val">100 <b>%</b></div><div class="spec-lbl">управление со смартфона: Hunter Hydrawise / Rain Bird LNK</div></div><div class="spec"><div class="spec-val">−30 <b>%</b></div><div class="spec-lbl">воды за сезон при работе датчика погоды</div></div><div class="spec"><div class="spec-val">12 <b>В</b></div><div class="spec-lbl">безопасное ландшафтное освещение в одной траншее с поливом</div></div></div>
  </div>
</section>

<section class="section light light-2" id="sostav">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">01</span><span class="eyebrow">Что входит</span></div><h2 class="h2">Полив, который не нужно включать, и свет, который не нужно выключать</h2></div>
      <p class="lead muted">Система должна быть автономной: контроллер знает погоду, вы видите всё в приложении, а сервис перед зимой — по календарю.</p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-10 hairline-b" data-reveal="stagger"><div class="incl"><div class="num">01</div><div><h3 class="h4">Проект зон полива</h3><p>Гидравлический расчёт, подбор форсунок, перекрытие head-to-head. План согласуем до начала работ.</p></div></div><div class="incl"><div class="num">02</div><div><h3 class="h4">Оборудование Hunter / Rain Bird</h3><p>Роторы PGP и MP Rotator для газона, капельные линии для изгородей и цветников, электромагнитные клапаны в боксах.</p></div></div><div class="incl"><div class="num">03</div><div><h3 class="h4">Контроллер с Wi-Fi и датчик погоды</h3><p>Hunter Hydrawise или Rain Bird LNK: график корректируется по прогнозу, управление — со смартфона из любой точки.</p></div></div><div class="incl"><div class="num">04</div><div><h3 class="h4">Монтаж до газона и мощения</h3><p>Гильзы под дорожками и парковкой, трассы на глубине 30–40 см. Все работы — до укладки рулона.</p></div></div><div class="incl"><div class="num">05</div><div><h3 class="h4">Ландшафтное освещение 12 В</h3><p>Подсветка дорожек, деревьев, фасада. Низковольтная система, трансформатор, астрономический таймер.</p></div></div><div class="incl"><div class="num">06</div><div><h3 class="h4">Пусконаладка и зимняя консервация</h3><p>Настройка каждой зоны, обучение в приложении, продувка компрессором перед зимой.</p></div></div></div>
  </div>
</section>

<section class="section sheet" id="inzheneriya">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">02</span><span class="eyebrow">Инженерия</span></div><h2 class="h2">Проектирование без слепых зон: как это выглядит на плане</h2></div>
      <p class="lead muted">Дождеватель, поставленный «на глаз», поливает круг вокруг себя. Всё, что между кругами, сохнет. В проекте радиус каждой форсунки достигает соседней.</p>
    </div>
    <div class="grid gap-8 lg:grid-cols-12 items-start" data-reveal>
      <div class="lg:col-span-8 infog-frame infog-scroll"><svg class="infog" viewBox="0 0 900 400" role="img" aria-label="План полива: расстановка на глаз со слепой зоной и проект с перекрытием head-to-head"><defs>
<pattern id="p-plate" width="34" height="44" patternUnits="userSpaceOnUse"><rect width="34" height="44" fill="#EAE6DF"/><rect x="32" width="2" height="44" fill="rgba(42,47,53,.28)"/></pattern>
<pattern id="p-gravel" width="16" height="14" patternUnits="userSpaceOnUse"><rect width="16" height="14" fill="rgba(244,244,242,.07)"/><circle cx="4" cy="4" r="2.4" fill="rgba(244,244,242,.32)"/><circle cx="12" cy="10" r="1.8" fill="rgba(244,244,242,.24)"/></pattern>
<pattern id="p-sand" width="8" height="8" patternUnits="userSpaceOnUse"><rect width="8" height="8" fill="rgba(244,244,242,.05)"/><circle cx="2" cy="2" r=".9" fill="rgba(244,244,242,.35)"/><circle cx="6" cy="6" r=".9" fill="rgba(244,244,242,.25)"/></pattern>
<pattern id="p-soil" width="12" height="12" patternUnits="userSpaceOnUse" patternTransform="rotate(45)"><rect width="12" height="12" fill="rgba(35,39,44,.8)"/><rect width="1" height="12" fill="rgba(244,244,242,.16)"/></pattern>
<pattern id="p-turf" width="6" height="22" patternUnits="userSpaceOnUse"><rect width="6" height="22" fill="#2B4236"/><rect x="2.5" y="7" width="1" height="15" fill="rgba(244,244,242,.22)"/></pattern>
<pattern id="p-topsoil" width="10" height="10" patternUnits="userSpaceOnUse"><rect width="10" height="10" fill="rgba(184,134,11,.16)"/><circle cx="3" cy="3" r="1" fill="rgba(184,134,11,.5)"/><circle cx="8" cy="7" r=".8" fill="rgba(184,134,11,.4)"/></pattern>
<pattern id="p-mesh" width="6" height="6" patternUnits="userSpaceOnUse"><rect width="6" height="6" fill="none"/><rect width="6" height="1" fill="#B8860B"/><rect width="1" height="6" fill="#B8860B"/></pattern>
<pattern id="p-blind" width="10" height="10" patternUnits="userSpaceOnUse" patternTransform="rotate(45)"><rect width="10" height="10" fill="rgba(184,134,11,.08)"/><rect width="2" height="10" fill="rgba(184,134,11,.5)"/></pattern>
<clipPath id="cpA"><rect x="40" y="96" width="380" height="260"/></clipPath><clipPath id="cpB"><rect x="480" y="96" width="380" height="260"/></clipPath></defs><text x="40" y="52" class="cap">«На глаз» — 4 дождевателя по углам</text><text x="40" y="74" class="lbl-s">радиус не достаёт до центра: слепая зона, ручной полив из шланга</text><rect x="40" y="96" width="380" height="260" fill="url(#p-blind)" stroke="rgba(244,244,242,.4)"/><circle cx="40" cy="96" r="170" fill="rgba(43,66,54,.62)" stroke="rgba(244,244,242,.38)" clip-path="url(#cpA)"/><circle cx="420" cy="96" r="170" fill="rgba(43,66,54,.62)" stroke="rgba(244,244,242,.38)" clip-path="url(#cpA)"/><circle cx="40" cy="356" r="170" fill="rgba(43,66,54,.62)" stroke="rgba(244,244,242,.38)" clip-path="url(#cpA)"/><circle cx="420" cy="356" r="170" fill="rgba(43,66,54,.62)" stroke="rgba(244,244,242,.38)" clip-path="url(#cpA)"/><circle cx="40" cy="96" r="6" fill="#B8860B" stroke="#2A2F35" stroke-width="2"/><circle cx="420" cy="96" r="6" fill="#B8860B" stroke="#2A2F35" stroke-width="2"/><circle cx="40" cy="356" r="6" fill="#B8860B" stroke="#2A2F35" stroke-width="2"/><circle cx="420" cy="356" r="6" fill="#B8860B" stroke="#2A2F35" stroke-width="2"/><text x="230" y="222" class="lbl t-brass" text-anchor="middle">слепая зона</text><text x="230" y="240" class="lbl-s" text-anchor="middle">≈ 20 % газона без воды</text><text x="40" y="382" class="lbl-s">план газона 19 × 13 м</text><text x="480" y="52" class="cap">Проект «20 соток» — перекрытие head-to-head</text><text x="480" y="74" class="lbl-s">радиус каждой форсунки достигает соседней: 100 % покрытия, роторы Hunter PGP / MP Rotator</text><rect x="480" y="96" width="380" height="260" fill="rgba(244,244,242,.04)" stroke="rgba(244,244,242,.4)"/><circle cx="480" cy="96" r="200" fill="rgba(43,66,54,.55)" stroke="rgba(244,244,242,.38)" clip-path="url(#cpB)"/><circle cx="670" cy="96" r="200" fill="rgba(43,66,54,.55)" stroke="rgba(244,244,242,.38)" clip-path="url(#cpB)"/><circle cx="860" cy="96" r="200" fill="rgba(43,66,54,.55)" stroke="rgba(244,244,242,.38)" clip-path="url(#cpB)"/><circle cx="480" cy="356" r="200" fill="rgba(43,66,54,.55)" stroke="rgba(244,244,242,.38)" clip-path="url(#cpB)"/><circle cx="670" cy="356" r="200" fill="rgba(43,66,54,.55)" stroke="rgba(244,244,242,.38)" clip-path="url(#cpB)"/><circle cx="860" cy="356" r="200" fill="rgba(43,66,54,.55)" stroke="rgba(244,244,242,.38)" clip-path="url(#cpB)"/><circle cx="480" cy="96" r="6" fill="#B8860B" stroke="#2A2F35" stroke-width="2"/><circle cx="670" cy="96" r="6" fill="#B8860B" stroke="#2A2F35" stroke-width="2"/><circle cx="860" cy="96" r="6" fill="#B8860B" stroke="#2A2F35" stroke-width="2"/><circle cx="480" cy="356" r="6" fill="#B8860B" stroke="#2A2F35" stroke-width="2"/><circle cx="670" cy="356" r="6" fill="#B8860B" stroke="#2A2F35" stroke-width="2"/><circle cx="860" cy="356" r="6" fill="#B8860B" stroke="#2A2F35" stroke-width="2"/><line x1="486" y1="96" x2="664" y2="96" stroke="#B8860B" stroke-dasharray="4 4"/><text x="575" y="88" class="lbl-s t-brass" text-anchor="middle">шаг = радиус</text><text x="670" y="230" class="lbl" text-anchor="middle">0 слепых зон</text><text x="670" y="248" class="lbl-s" text-anchor="middle">6 роторов · 2 зоны · датчик погоды</text><text x="480" y="382" class="lbl-s">план газона 19 × 13 м</text></svg></div>
      <ul class="lg:col-span-4 legend lg:pl-4"><li><span class="badge-num">1</span><span>Латунная точка — дождеватель (ротор или спрей). Зелёная область — зона орошения, штриховка — слепая зона.</span></li><li><span class="badge-num">2</span><span>Перекрытие head-to-head: шаг между дождевателями равен радиусу, поэтому каждая точка газона получает воду минимум от двух форсунок.</span></li><li><span class="badge-num">3</span><span>Разные зоны — разное давление и время: газон, изгороди и цветники поливаются по своим программам.</span></li><li><span class="badge-num">4</span><span>Датчик погоды и контроллер с Wi-Fi корректируют график по прогнозу и отменяют полив в дождь.</span></li></ul>
    </div>
  </div>
</section>

<section class="section light" id="expert">
  <div class="wrap">
    <div class="section-index" data-reveal><span class="num">03</span><span class="eyebrow">Экспертный блок</span></div>
    <div data-reveal>
      <h2 class="h2 max-w-none">Hunter и Rain Bird: чем отличаются системы и почему датчик погоды обязателен</h2>
    </div>
    <div class="grid gap-10 lg:grid-cols-5 mt-10 lg:mt-14 items-start">
      <div class="lg:col-span-2" data-reveal>
        <div class="photo" style="aspect-ratio:4/3"><img src="<?php echo S20_A; ?>img/lighting.jpg" alt="Ландшафтное освещение дома и сада вечером" loading="lazy"><div class="photo-cap"><span>Полив и освещение · Минский район</span></div></div>
      </div>
      <div class="lg:col-span-3 prose max-w-none" style="font-size:1.05rem" data-reveal><p>Мы работаем с двумя производителями — Hunter и Rain Bird. Оба — американские, оба десятилетиями стоят на гольф-полях и частных участках, и по надёжности между ними нет разницы, которая имела бы значение для заказчика. Разница — в экосистеме управления и в том, что удобнее конкретно вам.</p>
<p><b>Hunter Hydrawise</b> — контроллер с Wi-Fi и приложением, которое показывает каждую зону, историю поливов и прогноз. Расход воды виден по дням. <b>Rain Bird LNK WiFi</b> — похожая логика, чуть проще интерфейс, отлично интегрируется с роторами Rain Bird серии 5000.</p>
<p><b>Датчик погоды — не опция.</b> Без него контроллер поливает по расписанию: и в дождь, и в жару одинаково. Датчик дождя и температуры отменяет полив, когда вода не нужна, и добавляет циклы в засуху. По нашим объектам это экономит около трети воды за сезон и, главное, не заливает газон.</p>
<p><b>Управление со смартфона</b> — это не про «поиграть с приложением». Это уведомление о разрыве трубы, возможность отложить полив на время вечеринки и доступ к системе для нашего сервисного инженера без вашего присутствия.</p></div>
    </div>
  </div>
</section>


<section class="section sheet">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">04</span><span class="eyebrow">Оборудование</span></div><h2 class="h2">Что стоит на объекте</h2></div>
      <p class="lead muted">Только оригинальные компоненты с гарантией производителя. Никаких «аналогов» в скрытых частях системы.</p>
    </div>
    <div data-reveal><div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4"><div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-circle-dot"/></svg><h3 class="h4 mt-5">Роторы Hunter PGP / MP Rotator</h3><p>Для газона: равномерная струя, регулируемый сектор и радиус, стойкость к песку.</p></div><div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-droplets"/></svg><h3 class="h4 mt-5">Капельные линии</h3><p>Для живых изгородей, цветников и деревьев: вода к корням, без переувлажнения листвы.</p></div><div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-smartphone"/></svg><h3 class="h4 mt-5">Контроллер с Wi-Fi</h3><p>Hunter Hydrawise / Rain Bird LNK: приложение, история, уведомления, доступ для сервиса.</p></div><div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-thermometer-sun"/></svg><h3 class="h4 mt-5">Датчик погоды</h3><p>Отмена полива в дождь и при заморозках, корректировка по температуре и прогнозу.</p></div></div></div>
  </div>
</section>

<section class="section sheet" id="raschet">
  <div class="wrap">
    <div class="grid gap-12 lg:grid-cols-12 items-start">
      <div class="lg:col-span-5" data-reveal>
        <div class="lg:sticky lg:top-28">
          <div class="section-index"><span class="num">05</span><span class="eyebrow">Расчёт</span></div>
          <h2 class="h2" style="font-size:clamp(1.8rem,2.8vw,2.6rem);hyphens:auto;overflow-wrap:break-word">Предварительный бюджет — за 1 минуту</h2>
          <p class="muted mt-6">Три вопроса. Ответ — цифры и примеры похожих объектов в Telegram или Viber. Выезд инженера на участок — бесплатно при заказе комплекса работ.</p>
        </div>
      </div>
      <div class="lg:col-span-7" data-reveal><div class="quiz quiz-mount" data-preselect="irrigation"></div></div>
    </div>
  </div>
</section>

<section class="section" id="proekty">
  <div class="wrap">
    <div class="section-head wide" data-reveal>
      <div><div class="section-index"><span class="num">06</span><span class="eyebrow">Проекты</span></div><h2 class="h2">Объекты, где мы делали полив</h2></div>
      <div class="lg:justify-self-end"><a class="btn btn-ghost" href="<?php echo s20_url('proekty'); ?>">Все инженерные кейсы <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a></div>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5" data-reveal="stagger">
<a class="case" href="<?php echo s20_url('proekty'); ?>#shitomirichi" data-tags="paving lawn irrigation drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php echo S20_A; ?>img/real/shitomirichi-1.webp" alt="Мощение, дренаж, рулонный газон и автополив — Щитомиричи" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Щитомиричи</span><span>2026</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Щитомиричи</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>600 м² газона</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2026</span></div>
    <h3 class="h3 mt-3">Комплекс: мощение, дренаж, газон и автополив</h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Дренаж</span><span class="tag">Газон</span><span class="tag">Полив</span></div>
  </div>
</a>
    </div>
  </div>
</section>

<?php s20_set_preselect('irrigation'); get_footer();
