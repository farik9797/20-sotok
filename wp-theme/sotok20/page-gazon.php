<?php
/* page-gazon.php — собрано из макета uslugi/gazon.html скриптом tools/wp-port/build_theme.py. */
get_header();
?>

<section class="hero-sub">
  <div class="hero-media"><img src="<?php echo S20_A; ?>img/hero-svc-lawn.jpg" alt="" aria-hidden="true" data-parallax="7"></div>
  <div class="hero-shade"></div>
  <div class="wrap hero-inner">
    <div class="eyebrow mb-6" data-hero-seq>Услуга 02 · Газон</div>
    <h1 class="h1 lg:max-w-[30ch]" data-hero-seq>Устройство премиальных газонов и озеленение</h1>
    <div class="grid gap-8 lg:grid-cols-12 mt-10 items-end">
      <p class="lead muted lg:col-span-7" data-hero-seq>Рулонный газон на подготовленном по нивелиру основании с защитной сеткой от кротов. Ровная плоскость без луж и проплешин — и через три недели уже можно косить</p>
      <div class="lg:col-span-5 grid gap-3 lg:w-max lg:justify-self-end" data-hero-seq>
        <a href="#raschet" class="btn btn-brass btn-lg w-full">Рассчитать бюджет за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <a href="<?php echo s20_url('proekty'); ?>" class="btn btn-ghost btn-lg w-full">Проекты</a>
      </div>
    </div>
    <div class="spec-strip hero-specs mt-12" data-hero-seq><div class="spec"><div class="spec-val">3 <b>нед.</b></div><div class="spec-lbl">от укладки рулонного газона до первого покоса</div></div><div class="spec"><div class="spec-val">16 <b>мм</b></div><div class="spec-lbl">ячейка оцинкованной сетки от кротов под плодородным слоем</div></div><div class="spec"><div class="spec-val">1–2 <b>%</b></div><div class="spec-lbl">уклон плоскости газона для отвода воды</div></div><div class="spec"><div class="spec-val">120 <b>мм</b></div><div class="spec-lbl">плодородный слой на подготовленном основании</div></div></div>
  </div>
</section>

<!-- Ключевые показатели -->
<section class="specs" aria-label="Ключевые показатели">
  <div class="wrap">
    <div class="spec-strip" data-reveal="stagger"><div class="spec"><div class="spec-val">3 <b>нед.</b></div><div class="spec-lbl">от укладки рулонного газона до первого покоса</div></div><div class="spec"><div class="spec-val">16 <b>мм</b></div><div class="spec-lbl">ячейка оцинкованной сетки от кротов под плодородным слоем</div></div><div class="spec"><div class="spec-val">1–2 <b>%</b></div><div class="spec-lbl">уклон плоскости газона для отвода воды</div></div><div class="spec"><div class="spec-val">120 <b>мм</b></div><div class="spec-lbl">плодородный слой на подготовленном основании</div></div></div>
  </div>
</section>

<section class="section light light-2" id="sostav">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">01</span><span class="eyebrow">Что входит</span></div><h2 class="h2">Газон, который остаётся ровным и через пять лет</h2></div>
      <p class="lead muted">Рулон — это верхние 2 см. Результат определяют основание, сетка, плодородный слой и полив, который включается сам.</p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-10 hairline-b" data-reveal="stagger"><div class="incl"><div class="num">01</div><div><h3 class="h4">Планировка основания по нивелиру</h3><p>Снимаем рельеф, задаём уклоны 1–2 %, уплотняем материковый грунт — без «блюдец», где стоит вода.</p></div></div><div class="incl"><div class="num">02</div><div><h3 class="h4">Сетка от кротов</h3><p>Оцинкованная сетка укладывается на основание внахлёст до плодородного слоя. Позже её положить невозможно.</p></div></div><div class="incl"><div class="num">03</div><div><h3 class="h4">Плодородный слой 100–150 мм</h3><p>Просеянный грунт с песком, планировка правилом, прикатка. Ровная плоскость под рулон.</p></div></div><div class="incl"><div class="num">04</div><div><h3 class="h4">Рулонный газон премиум</h3><p>Свежая срезка, укладка в день доставки со смещением швов, прикатка, первый полив в течение часа.</p></div></div><div class="incl"><div class="num">05</div><div><h3 class="h4">Озеленение и мульчирование</h3><p>Живые изгороди, деревья, кустарники. Приствольные круги с корой или гравием — защита от триммера.</p></div></div><div class="incl"><div class="num">06</div><div><h3 class="h4">Автополив и уход</h3><p>Проектируем полив вместе с газоном: первые три недели — режим укоренения, потом — автономный график.</p></div></div></div>
  </div>
</section>

<section class="section sheet" id="inzheneriya">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">02</span><span class="eyebrow">Инженерия</span></div><h2 class="h2">Ловушка с кротами: что происходит под газоном</h2></div>
      <p class="lead muted">Кроты приходят с соседних участков и из леса — это вопрос времени. Сетка стоит недорого на этапе закладки и невозможна без полной переделки потом.</p>
    </div>
    <div class="grid gap-8 lg:grid-cols-12 items-start" data-reveal>
      <div class="lg:col-span-8 infog-frame infog-scroll"><svg class="infog" viewBox="0 0 900 340" role="img" aria-label="Разрез газона без сетки и с защитной сеткой от кротов"><defs>
<pattern id="p-plate" width="34" height="44" patternUnits="userSpaceOnUse"><rect width="34" height="44" fill="#EAE6DF"/><rect x="32" width="2" height="44" fill="rgba(42,47,53,.28)"/></pattern>
<pattern id="p-gravel" width="16" height="14" patternUnits="userSpaceOnUse"><rect width="16" height="14" fill="rgba(244,244,242,.07)"/><circle cx="4" cy="4" r="2.4" fill="rgba(244,244,242,.32)"/><circle cx="12" cy="10" r="1.8" fill="rgba(244,244,242,.24)"/></pattern>
<pattern id="p-sand" width="8" height="8" patternUnits="userSpaceOnUse"><rect width="8" height="8" fill="rgba(244,244,242,.05)"/><circle cx="2" cy="2" r=".9" fill="rgba(244,244,242,.35)"/><circle cx="6" cy="6" r=".9" fill="rgba(244,244,242,.25)"/></pattern>
<pattern id="p-soil" width="12" height="12" patternUnits="userSpaceOnUse" patternTransform="rotate(45)"><rect width="12" height="12" fill="rgba(35,39,44,.8)"/><rect width="1" height="12" fill="rgba(244,244,242,.16)"/></pattern>
<pattern id="p-turf" width="6" height="22" patternUnits="userSpaceOnUse"><rect width="6" height="22" fill="#2B4236"/><rect x="2.5" y="7" width="1" height="15" fill="rgba(244,244,242,.22)"/></pattern>
<pattern id="p-topsoil" width="10" height="10" patternUnits="userSpaceOnUse"><rect width="10" height="10" fill="rgba(184,134,11,.16)"/><circle cx="3" cy="3" r="1" fill="rgba(184,134,11,.5)"/><circle cx="8" cy="7" r=".8" fill="rgba(184,134,11,.4)"/></pattern>
<pattern id="p-mesh" width="6" height="6" patternUnits="userSpaceOnUse"><rect width="6" height="6" fill="none"/><rect width="6" height="1" fill="#B8860B"/><rect width="1" height="6" fill="#B8860B"/></pattern>
<pattern id="p-blind" width="10" height="10" patternUnits="userSpaceOnUse" patternTransform="rotate(45)"><rect width="10" height="10" fill="rgba(184,134,11,.08)"/><rect width="2" height="10" fill="rgba(184,134,11,.5)"/></pattern>
</defs><line x1="30" y1="110" x2="30" y2="299" stroke="rgba(244,244,242,.35)"/><line x1="26" y1="110" x2="34" y2="110" stroke="rgba(244,244,242,.5)"/><text x="22" y="114" class="lbl-s" text-anchor="end">0</text><line x1="26" y1="173" x2="34" y2="173" stroke="rgba(244,244,242,.5)"/><text x="22" y="177" class="lbl-s" text-anchor="end">100</text><line x1="26" y1="236" x2="34" y2="236" stroke="rgba(244,244,242,.5)"/><text x="22" y="240" class="lbl-s" text-anchor="end">200</text><line x1="26" y1="299" x2="34" y2="299" stroke="rgba(244,244,242,.5)"/><text x="22" y="303" class="lbl-s" text-anchor="end">300 мм</text><text x="40" y="62" class="cap">Без сетки</text><text x="40" y="84" class="lbl-s">типичная укладка «газон на грунт» — сезон, и кроты приходят с соседних участков</text><rect x="40" y="110" width="380" height="22" fill="url(#p-turf)"/><text x="54" y="126" class="lbl t-light">Рулонный газон 20–25 мм</text><rect x="40" y="132" width="380" height="76" fill="url(#p-topsoil)"/><text x="54" y="162" class="lbl">Плодородный слой</text><text x="54" y="180" class="lbl-s">100–150 мм</text><rect x="40" y="208" width="380" height="112" fill="url(#p-soil)"/><text x="54" y="255" class="lbl">Основание: материковый грунт</text><text x="54" y="273" class="lbl-s">спланирован по нивелиру, уплотнён</text><path d="M 70 300 C 160 296, 200 210, 250 160 C 270 140, 285 128, 300 122" fill="none" stroke="rgba(244,244,242,.55)" stroke-width="7" stroke-linecap="round"/><path d="M 272 110 Q 300 86 328 110 Z" fill="rgba(184,134,11,.55)"/><text x="338" y="100" class="lbl-s t-brass">кротовина: просадка, проплешины,</text><text x="338" y="114" class="lbl-s t-brass">разрушенная дернина</text><text x="480" y="62" class="cap">С защитной сеткой — стандарт «20 соток»</text><text x="480" y="84" class="lbl-s">оцинкованная сетка укладывается на основание до плодородного слоя</text><rect x="480" y="110" width="380" height="22" fill="url(#p-turf)"/><text x="494" y="126" class="lbl t-light">Рулонный газон 20–25 мм</text><rect x="480" y="132" width="380" height="76" fill="url(#p-topsoil)"/><text x="494" y="162" class="lbl">Плодородный слой</text><text x="494" y="180" class="lbl-s">100–150 мм</text><rect x="480" y="205" width="380" height="6" fill="url(#p-mesh)"/><rect x="480" y="205" width="380" height="6" fill="none" stroke="#B8860B" stroke-width="1"/><text x="846" y="199" class="lbl-s t-brass" text-anchor="end">сетка от кротов, ячейка 16 мм</text><rect x="480" y="211" width="380" height="109" fill="url(#p-soil)"/><text x="494" y="257" class="lbl">Основание: материковый грунт</text><text x="494" y="275" class="lbl-s">спланирован по нивелиру, уплотнён</text><path d="M 510 300 C 600 296, 640 252, 686 222" fill="none" stroke="rgba(244,244,242,.55)" stroke-width="7" stroke-linecap="round"/><circle cx="688" cy="221" r="7" fill="none" stroke="#B8860B" stroke-width="2"/><text x="704" y="240" class="lbl-s t-brass">ход остановлен сеткой</text></svg></div>
      <ul class="lg:col-span-4 legend lg:pl-4"><li><span class="badge-num">1</span><span>Без сетки крот проходит через рыхлый плодородный слой и выходит на поверхность: кротовины, просадки, разрушенная дернина.</span></li><li><span class="badge-num">2</span><span>Сетка укладывается на уплотнённое основание под плодородный слой — крот упирается в неё и уходит.</span></li><li><span class="badge-num">3</span><span>Ячейка 16 мм и оцинковка: сетка не мешает корням и не ржавеет в грунте.</span></li><li><span class="badge-num">4</span><span>Ловушки и отпугиватели — временные меры, они не защищают участок постоянно.</span></li></ul>
    </div>
  </div>
</section>

<section class="section light" id="expert">
  <div class="wrap">
    <div class="section-index" data-reveal><span class="num">03</span><span class="eyebrow">Экспертный блок</span></div>
    <div data-reveal>
      <h2 class="h2 max-w-none">Ловушка с кротами: почему укладка сетки обязательна на этапе закладки территории</h2>
    </div>
    <div class="grid gap-10 lg:grid-cols-5 mt-10 lg:mt-14 items-start">
      <div class="lg:col-span-2" data-reveal>
        <div class="photo" style="aspect-ratio:4/3"><img src="<?php echo S20_A; ?>img/garden-path.jpg" alt="Газон и дорожка в саду" loading="lazy"><div class="photo-cap"><span>Газон второго сезона · Минский район</span></div></div>
      </div>
      <div class="lg:col-span-3 prose max-w-none" style="font-size:1.05rem" data-reveal><p>Самая частая история, с которой к нам приходят: «положили газон год назад, а теперь весь участок в кротовинах». Мы вынуждены отвечать, что защитить уже уложенный газон по-настоящему нельзя — только снять его и сделать заново.</p>
<p><b>Почему так.</b> Сетка от кротов работает только в одном месте — между уплотнённым основанием и плодородным слоем. Туда нельзя попасть, не сняв рулон и не перебрав грунт. Любые «поверхностные» решения — ультразвуковые отпугиватели, ловушки, препараты — дают временный эффект, а популяция кротов на соседних участках никуда не уходит.</p>
<p><b>Что делаем мы.</b> На этапе закладки укладываем оцинкованную сетку с ячейкой 16 мм на подготовленное основание внахлёст 100 мм, крепим скобами, затем формируем 100–150 мм плодородного слоя и стелем рулон. Сетка не мешает корням, не ржавеет и не требует обслуживания.</p>
<p>Это несколько процентов от стоимости газона — и единственный способ не делать газон дважды.</p></div>
    </div>
  </div>
</section>


<section class="section sheet">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">04</span><span class="eyebrow">Сравнение</span></div><h2 class="h2">Рулонный или посевной газон: честное сравнение</h2></div>
      <p class="lead muted">Мы делаем оба. Но для участков, где важен результат в этом сезоне, рекомендуем рулонный — и объясняем, почему.</p>
    </div>
    <div data-reveal><div class="overflow-x-auto"><table class="cmp"><thead><tr><th></th><th>Рулонный газон</th><th>Посевной газон</th></tr></thead><tbody>
<tr><td>Результат</td><td class="win">Через 2–3 недели — плотный ковёр</td><td>Полноценный вид — на второй сезон</td></tr>
<tr><td>Сорняки в первый год</td><td class="win">Практически нет: дернина уже сформирована</td><td>Требуют постоянной прополки и подсева</td></tr>
<tr><td>Окно работ</td><td class="win">Апрель — октябрь, включая жаркие месяцы при поливе</td><td>Только весна и конец лета</td></tr>
<tr><td>Стоимость на старте</td><td>Выше: материал + логистика</td><td class="win">Ниже</td></tr>
<tr><td>Стоимость за 2 года с уходом</td><td class="win">Сопоставима или ниже — меньше подсевов и обработок</td><td>Растёт за счёт ухода и переделок</td></tr>
<tr><td>Кому подходит</td><td class="win">Тем, кто хочет готовый участок в этом сезоне без участия в уходе</td><td>Тем, кто готов ухаживать сам и ждать</td></tr>
</tbody></table></div></div>
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
      <div class="lg:col-span-7" data-reveal><div class="quiz quiz-mount" data-preselect="lawn"></div></div>
    </div>
  </div>
</section>

<section class="section" id="proekty">
  <div class="wrap">
    <div class="section-head wide" data-reveal>
      <div><div class="section-index"><span class="num">06</span><span class="eyebrow">Проекты</span></div><h2 class="h2">Объекты, где мы делали газон</h2></div>
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
<a class="case" href="<?php echo s20_url('proekty'); ?>#yuhnovka" data-tags="paving lawn drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php echo S20_A; ?>img/real/yuhnovka-1.webp" alt="Мощение 430 м², посевной газон и посадки — Юхновка" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Юхновка</span><span>2024</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Юхновка</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>430 м²</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2024</span></div>
    <h3 class="h3 mt-3">Мощение 430 м², посевной газон и хвойные посадки</h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Газон</span><span class="tag">Ливнёвка</span></div>
  </div>
</a>
    </div>
  </div>
</section>

<?php s20_set_preselect('lawn'); get_footer();
