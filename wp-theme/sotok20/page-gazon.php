<?php
/*
Template Name: Услуги — газон
page-gazon.php — собрано из макета uslugi/gazon.html скриптом tools/wp-port/build_theme.py.
*/
get_header();
?>

<section class="hero-sub">
  <div class="hero-media"><img src="<?php s20_img('gazon_s01_01', 'src'); ?>" alt="<?php s20_img('gazon_s01_01', 'alt'); ?>" aria-hidden="true" data-parallax="7"></div>
  <div class="hero-shade"></div>
  <div class="wrap hero-inner">
    <div class="eyebrow mb-6" data-hero-seq><?php s20_t('gazon_s01_02'); ?></div>
    <h1 class="h1 lg:max-w-[30ch]" data-hero-seq><?php s20_t('gazon_s01_03'); ?></h1>
    <div class="grid gap-8 lg:grid-cols-12 mt-10 items-end">
      <p class="lead muted lg:col-span-7" data-hero-seq><?php s20_t('gazon_s01_04'); ?></p>
      <div class="lg:col-span-5 grid gap-3 lg:w-max lg:justify-self-end" data-hero-seq>
        <a href="#raschet" class="btn btn-brass btn-lg w-full">Рассчитать бюджет за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <a href="<?php echo s20_url('proekty'); ?>" class="btn btn-ghost btn-lg w-full">Проекты</a>
      </div>
    </div>
    <div class="spec-strip hero-specs mt-12" data-hero-seq><div class="spec"><div class="spec-val"><?php s20_t('gazon_s01_05'); ?></div><div class="spec-lbl"><?php s20_t('gazon_s01_06'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('gazon_s01_07'); ?></div><div class="spec-lbl"><?php s20_t('gazon_s01_08'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('gazon_s01_09'); ?></div><div class="spec-lbl"><?php s20_t('gazon_s01_10'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('gazon_s01_11'); ?></div><div class="spec-lbl"><?php s20_t('gazon_s01_12'); ?></div></div></div>
  </div>
</section>

<!-- Ключевые показатели -->
<section class="specs" aria-label="Ключевые показатели">
  <div class="wrap">
    <div class="spec-strip" data-reveal="stagger"><div class="spec"><div class="spec-val"><?php s20_t('gazon_s02_01'); ?></div><div class="spec-lbl"><?php s20_t('gazon_s02_02'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('gazon_s02_03'); ?></div><div class="spec-lbl"><?php s20_t('gazon_s02_04'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('gazon_s02_05'); ?></div><div class="spec-lbl"><?php s20_t('gazon_s02_06'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('gazon_s02_07'); ?></div><div class="spec-lbl"><?php s20_t('gazon_s02_08'); ?></div></div></div>
  </div>
</section>

<section class="section light light-2" id="sostav">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">01</span><span class="eyebrow"><?php s20_t('gazon_s03_01'); ?></span></div><h2 class="h2"><?php s20_t('gazon_s03_02'); ?></h2></div>
      <p class="lead muted"><?php s20_t('gazon_s03_03'); ?></p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-10 hairline-b" data-reveal="stagger"><div class="incl"><div class="num">01</div><div><h3 class="h4"><?php s20_t('gazon_s03_04'); ?></h3><p><?php s20_t('gazon_s03_05'); ?></p></div></div><div class="incl"><div class="num">02</div><div><h3 class="h4"><?php s20_t('gazon_s03_06'); ?></h3><p><?php s20_t('gazon_s03_07'); ?></p></div></div><div class="incl"><div class="num">03</div><div><h3 class="h4"><?php s20_t('gazon_s03_08'); ?></h3><p><?php s20_t('gazon_s03_09'); ?></p></div></div><div class="incl"><div class="num">04</div><div><h3 class="h4"><?php s20_t('gazon_s03_10'); ?></h3><p><?php s20_t('gazon_s03_11'); ?></p></div></div><div class="incl"><div class="num">05</div><div><h3 class="h4"><?php s20_t('gazon_s03_12'); ?></h3><p><?php s20_t('gazon_s03_13'); ?></p></div></div><div class="incl"><div class="num">06</div><div><h3 class="h4"><?php s20_t('gazon_s03_14'); ?></h3><p><?php s20_t('gazon_s03_15'); ?></p></div></div></div>
  </div>
</section>

<section class="section sheet" id="inzheneriya">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">02</span><span class="eyebrow"><?php s20_t('gazon_s04_01'); ?></span></div><h2 class="h2"><?php s20_t('gazon_s04_02'); ?></h2></div>
      <p class="lead muted"><?php s20_t('gazon_s04_03'); ?></p>
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
      <ul class="lg:col-span-4 legend lg:pl-4"><li><?php s20_t('gazon_s04_04'); ?></li><li><?php s20_t('gazon_s04_05'); ?></li><li><?php s20_t('gazon_s04_06'); ?></li><li><?php s20_t('gazon_s04_07'); ?></li></ul>
    </div>
  </div>
</section>

<section class="section light" id="expert">
  <div class="wrap">
    <div class="section-index" data-reveal><span class="num">03</span><span class="eyebrow"><?php s20_t('gazon_s05_01'); ?></span></div>
    <div data-reveal>
      <h2 class="h2 max-w-none"><?php s20_t('gazon_s05_02'); ?></h2>
    </div>
    <div class="grid gap-10 lg:grid-cols-5 mt-10 lg:mt-14 items-start">
      <div class="lg:col-span-2" data-reveal>
        <div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('gazon_s05_03', 'src'); ?>" alt="<?php s20_img('gazon_s05_03', 'alt'); ?>" loading="lazy"><div class="photo-cap"><span>Газон второго сезона · Минский район</span></div></div>
      </div>
      <div class="lg:col-span-3 prose max-w-none" style="font-size:1.05rem" data-reveal><p><?php s20_t('gazon_s05_04'); ?></p>
<p><?php s20_t('gazon_s05_05'); ?></p>
<p><?php s20_t('gazon_s05_06'); ?></p>
<p><?php s20_t('gazon_s05_07'); ?></p></div>
    </div>
  </div>
</section>


<section class="section sheet">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">04</span><span class="eyebrow"><?php s20_t('gazon_s06_01'); ?></span></div><h2 class="h2"><?php s20_t('gazon_s06_02'); ?></h2></div>
      <p class="lead muted"><?php s20_t('gazon_s06_03'); ?></p>
    </div>
    <div data-reveal><div class="overflow-x-auto"><table class="cmp"><thead><tr><th></th><th><?php s20_t('gazon_s06_04'); ?></th><th><?php s20_t('gazon_s06_05'); ?></th></tr></thead><tbody>
<tr><td><?php s20_t('gazon_s06_06'); ?></td><td class="win"><?php s20_t('gazon_s06_07'); ?></td><td><?php s20_t('gazon_s06_08'); ?></td></tr>
<tr><td><?php s20_t('gazon_s06_09'); ?></td><td class="win"><?php s20_t('gazon_s06_10'); ?></td><td><?php s20_t('gazon_s06_11'); ?></td></tr>
<tr><td><?php s20_t('gazon_s06_12'); ?></td><td class="win"><?php s20_t('gazon_s06_13'); ?></td><td><?php s20_t('gazon_s06_14'); ?></td></tr>
<tr><td><?php s20_t('gazon_s06_15'); ?></td><td><?php s20_t('gazon_s06_16'); ?></td><td class="win"><?php s20_t('gazon_s06_17'); ?></td></tr>
<tr><td><?php s20_t('gazon_s06_18'); ?></td><td class="win"><?php s20_t('gazon_s06_19'); ?></td><td><?php s20_t('gazon_s06_20'); ?></td></tr>
<tr><td><?php s20_t('gazon_s06_21'); ?></td><td class="win"><?php s20_t('gazon_s06_22'); ?></td><td><?php s20_t('gazon_s06_23'); ?></td></tr>
</tbody></table></div></div>
  </div>
</section>

<section class="section sheet" id="raschet">
  <div class="wrap">
    <div class="grid gap-12 lg:grid-cols-12 items-start">
      <div class="lg:col-span-5" data-reveal>
        <div class="lg:sticky lg:top-28">
          <div class="section-index"><span class="num">05</span><span class="eyebrow"><?php s20_t('gazon_s07_01'); ?></span></div>
          <h2 class="h2" style="font-size:clamp(1.8rem,2.8vw,2.6rem);hyphens:auto;overflow-wrap:break-word"><?php s20_t('gazon_s07_02'); ?></h2>
          <p class="muted mt-6"><?php s20_t('gazon_s07_03'); ?></p>
        </div>
      </div>
      <div class="lg:col-span-7" data-reveal><div class="quiz quiz-mount" data-preselect="lawn"></div></div>
    </div>
  </div>
</section>

<section class="section" id="proekty">
  <div class="wrap">
    <div class="section-head wide" data-reveal>
      <div><div class="section-index"><span class="num">06</span><span class="eyebrow"><?php s20_t('gazon_s08_01'); ?></span></div><h2 class="h2"><?php s20_t('gazon_s08_02'); ?></h2></div>
      <div class="lg:justify-self-end"><a class="btn btn-ghost" href="<?php echo s20_url('proekty'); ?>">Все инженерные кейсы <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a></div>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5" data-reveal="stagger">
<a class="case" href="<?php echo s20_url('proekty'); ?>#shitomirichi" data-tags="paving lawn irrigation drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('gazon_s08_03', 'src'); ?>" alt="<?php s20_img('gazon_s08_03', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Щитомиричи</span><span>2026</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Щитомиричи</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>600 м² газона</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2026</span></div>
    <h3 class="h3 mt-3"><?php s20_t('gazon_s08_04'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Дренаж</span><span class="tag">Газон</span><span class="tag">Полив</span></div>
  </div>
</a>
<a class="case" href="<?php echo s20_url('proekty'); ?>#yuhnovka" data-tags="paving lawn drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('gazon_s08_05', 'src'); ?>" alt="<?php s20_img('gazon_s08_05', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Юхновка</span><span>2024</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Юхновка</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>430 м²</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2024</span></div>
    <h3 class="h3 mt-3"><?php s20_t('gazon_s08_06'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Газон</span><span class="tag">Ливнёвка</span></div>
  </div>
</a>
    </div>
  </div>
</section>

<?php s20_set_preselect('lawn'); get_footer();
