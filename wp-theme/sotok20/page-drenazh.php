<?php
/*
Template Name: Услуги — дренаж
page-drenazh.php — собрано из макета uslugi/drenazh.html скриптом tools/wp-port/build_theme.py.
*/
get_header();
?>

<section class="hero-sub">
  <div class="hero-media"><img src="<?php s20_img('drenazh_s01_01', 'src'); ?>" alt="<?php s20_img('drenazh_s01_01', 'alt'); ?>" aria-hidden="true" data-parallax="7"></div>
  <div class="hero-shade"></div>
  <div class="wrap hero-inner">
    <div class="eyebrow mb-6" data-hero-seq><?php s20_t('drenazh_s01_02'); ?></div>
    <h1 class="h1 lg:max-w-[30ch]" data-hero-seq><?php s20_t('drenazh_s01_03'); ?></h1>
    <div class="grid gap-8 lg:grid-cols-12 mt-10 items-end">
      <p class="lead muted lg:col-span-7" data-hero-seq><?php s20_t('drenazh_s01_04'); ?></p>
      <div class="lg:col-span-5 grid gap-3 lg:w-max lg:justify-self-end" data-hero-seq>
        <a href="#raschet" class="btn btn-brass btn-lg w-full">Рассчитать бюджет за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <a href="<?php echo s20_url('proekty'); ?>" class="btn btn-ghost btn-lg w-full">Проекты</a>
      </div>
    </div>
    <div class="spec-strip hero-specs mt-12" data-hero-seq><div class="spec"><div class="spec-val"><?php s20_t('drenazh_s01_05'); ?></div><div class="spec-lbl"><?php s20_t('drenazh_s01_06'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('drenazh_s01_07'); ?></div><div class="spec-lbl"><?php s20_t('drenazh_s01_08'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('drenazh_s01_09'); ?></div><div class="spec-lbl"><?php s20_t('drenazh_s01_10'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('drenazh_s01_11'); ?></div><div class="spec-lbl"><?php s20_t('drenazh_s01_12'); ?></div></div></div>
  </div>
</section>

<!-- Ключевые показатели -->
<section class="specs" aria-label="Ключевые показатели">
  <div class="wrap">
    <div class="spec-strip" data-reveal="stagger"><div class="spec"><div class="spec-val"><?php s20_t('drenazh_s02_01'); ?></div><div class="spec-lbl"><?php s20_t('drenazh_s02_02'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('drenazh_s02_03'); ?></div><div class="spec-lbl"><?php s20_t('drenazh_s02_04'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('drenazh_s02_05'); ?></div><div class="spec-lbl"><?php s20_t('drenazh_s02_06'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('drenazh_s02_07'); ?></div><div class="spec-lbl"><?php s20_t('drenazh_s02_08'); ?></div></div></div>
  </div>
</section>

<section class="section light light-2" id="sostav">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">01</span><span class="eyebrow"><?php s20_t('drenazh_s03_01'); ?></span></div><h2 class="h2"><?php s20_t('drenazh_s03_02'); ?></h2></div>
      <p class="lead muted"><?php s20_t('drenazh_s03_03'); ?></p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-10 hairline-b" data-reveal="stagger"><div class="incl"><div class="num">01</div><div><h3 class="h4"><?php s20_t('drenazh_s03_04'); ?></h3><p><?php s20_t('drenazh_s03_05'); ?></p></div></div><div class="incl"><div class="num">02</div><div><h3 class="h4"><?php s20_t('drenazh_s03_06'); ?></h3><p><?php s20_t('drenazh_s03_07'); ?></p></div></div><div class="incl"><div class="num">03</div><div><h3 class="h4"><?php s20_t('drenazh_s03_08'); ?></h3><p><?php s20_t('drenazh_s03_09'); ?></p></div></div><div class="incl"><div class="num">04</div><div><h3 class="h4"><?php s20_t('drenazh_s03_10'); ?></h3><p><?php s20_t('drenazh_s03_11'); ?></p></div></div><div class="incl"><div class="num">05</div><div><h3 class="h4"><?php s20_t('drenazh_s03_12'); ?></h3><p><?php s20_t('drenazh_s03_13'); ?></p></div></div><div class="incl"><div class="num">06</div><div><h3 class="h4"><?php s20_t('drenazh_s03_14'); ?></h3><p><?php s20_t('drenazh_s03_15'); ?></p></div></div></div>
  </div>
</section>

<section class="section sheet" id="inzheneriya">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">02</span><span class="eyebrow"><?php s20_t('drenazh_s04_01'); ?></span></div><h2 class="h2"><?php s20_t('drenazh_s04_02'); ?></h2></div>
      <p class="lead muted"><?php s20_t('drenazh_s04_03'); ?></p>
    </div>
    <div class="grid gap-8 lg:grid-cols-12 items-start" data-reveal>
      <div class="lg:col-span-8 infog-frame infog-scroll"><svg class="infog" viewBox="0 0 900 420" role="img" aria-label="Схема дренажа: отмостка, дренажная траншея, коллектор с уклоном, колодец с переливом и вывод за границу участка"><defs>
<pattern id="p-plate" width="34" height="44" patternUnits="userSpaceOnUse"><rect width="34" height="44" fill="#EAE6DF"/><rect x="32" width="2" height="44" fill="rgba(42,47,53,.28)"/></pattern>
<pattern id="p-gravel" width="16" height="14" patternUnits="userSpaceOnUse"><rect width="16" height="14" fill="rgba(244,244,242,.07)"/><circle cx="4" cy="4" r="2.4" fill="rgba(244,244,242,.32)"/><circle cx="12" cy="10" r="1.8" fill="rgba(244,244,242,.24)"/></pattern>
<pattern id="p-sand" width="8" height="8" patternUnits="userSpaceOnUse"><rect width="8" height="8" fill="rgba(244,244,242,.05)"/><circle cx="2" cy="2" r=".9" fill="rgba(244,244,242,.35)"/><circle cx="6" cy="6" r=".9" fill="rgba(244,244,242,.25)"/></pattern>
<pattern id="p-soil" width="12" height="12" patternUnits="userSpaceOnUse" patternTransform="rotate(45)"><rect width="12" height="12" fill="rgba(35,39,44,.8)"/><rect width="1" height="12" fill="rgba(244,244,242,.16)"/></pattern>
<pattern id="p-turf" width="6" height="22" patternUnits="userSpaceOnUse"><rect width="6" height="22" fill="#2B4236"/><rect x="2.5" y="7" width="1" height="15" fill="rgba(244,244,242,.22)"/></pattern>
<pattern id="p-topsoil" width="10" height="10" patternUnits="userSpaceOnUse"><rect width="10" height="10" fill="rgba(184,134,11,.16)"/><circle cx="3" cy="3" r="1" fill="rgba(184,134,11,.5)"/><circle cx="8" cy="7" r=".8" fill="rgba(184,134,11,.4)"/></pattern>
<pattern id="p-mesh" width="6" height="6" patternUnits="userSpaceOnUse"><rect width="6" height="6" fill="none"/><rect width="6" height="1" fill="#B8860B"/><rect width="1" height="6" fill="#B8860B"/></pattern>
<pattern id="p-blind" width="10" height="10" patternUnits="userSpaceOnUse" patternTransform="rotate(45)"><rect width="10" height="10" fill="rgba(184,134,11,.08)"/><rect width="2" height="10" fill="rgba(184,134,11,.5)"/></pattern>
<marker id="arr" viewBox="0 0 10 10" refX="9" refY="5" markerWidth="8" markerHeight="8" orient="auto"><path d="M0 0 L10 5 L0 10 Z" fill="#B8860B"/></marker></defs><path d="M0 250 L900 262 L900 420 L0 420 Z" fill="url(#p-soil)"/><line x1="0" y1="250" x2="900" y2="262" stroke="rgba(244,244,242,.5)"/><rect x="80" y="250" width="150" height="58" fill="rgba(35,39,44,.95)" stroke="rgba(244,244,242,.3)"/><rect x="80" y="150" width="150" height="100" fill="#343A41" stroke="rgba(244,244,242,.5)"/><polygon points="68,150 155,100 242,150" fill="#23272C" stroke="rgba(244,244,242,.5)"/><line x1="243" y1="150" x2="243" y2="246" stroke="rgba(244,244,242,.7)" stroke-width="3"/><rect x="236" y="246" width="14" height="6" fill="#B8860B"/><text x="254" y="176" class="lbl-s">водосток с крыши —</text><text x="254" y="190" class="lbl-s">в ливнёвку, отдельной линией</text><polygon points="230,250 300,251 300,245 230,242" fill="#EAE6DF" opacity=".85"/><rect x="236" y="252" width="44" height="80" fill="url(#p-gravel)"/><rect x="238" y="254" width="40" height="76" fill="none" stroke="#B8860B" stroke-dasharray="5 4"/><circle cx="258" cy="316" r="9" fill="#2A2F35" stroke="#F4F4F2" stroke-width="2" stroke-dasharray="3 3"/><line x1="267" y1="316" x2="620" y2="338" stroke="#F4F4F2" stroke-width="3"/><line x1="400" y1="296" x2="520" y2="303" stroke="#B8860B" stroke-width="1.5" marker-end="url(#arr)"/><text x="460" y="288" class="lbl-s t-brass" text-anchor="middle">уклон коллектора 0,5–1 %</text><rect x="620" y="254" width="48" height="120" fill="#23272C" stroke="#F4F4F2"/><rect x="612" y="248" width="64" height="7" fill="#EAE6DF"/><line x1="622" y1="346" x2="666" y2="346" stroke="rgba(244,244,242,.5)" stroke-dasharray="4 3"/><line x1="668" y1="330" x2="792" y2="336" stroke="#F4F4F2" stroke-width="3"/><line x1="770" y1="200" x2="770" y2="410" stroke="#B8860B" stroke-dasharray="6 5"/><text x="778" y="214" class="lbl-s t-brass">граница участка</text><rect x="790" y="300" width="90" height="90" fill="url(#p-gravel)" stroke="rgba(244,244,242,.35)"/><circle cx="300" cy="226" r="11" fill="#B8860B"/><text x="300" y="230" class="lbl t-dark" text-anchor="middle" style="font-weight:600">1</text><circle cx="258" cy="356" r="11" fill="#B8860B"/><text x="258" y="360" class="lbl t-dark" text-anchor="middle" style="font-weight:600">2</text><circle cx="470" cy="340" r="11" fill="#B8860B"/><text x="470" y="344" class="lbl t-dark" text-anchor="middle" style="font-weight:600">3</text><circle cx="644" cy="228" r="11" fill="#B8860B"/><text x="644" y="232" class="lbl t-dark" text-anchor="middle" style="font-weight:600">4</text><circle cx="835" cy="282" r="11" fill="#B8860B"/><text x="835" y="286" class="lbl t-dark" text-anchor="middle" style="font-weight:600">5</text></svg></div>
      <ul class="lg:col-span-4 legend lg:pl-4"><li><?php s20_t('drenazh_s04_04'); ?></li><li><?php s20_t('drenazh_s04_05'); ?></li><li><?php s20_t('drenazh_s04_06'); ?></li><li><?php s20_t('drenazh_s04_07'); ?></li><li><?php s20_t('drenazh_s04_08'); ?></li></ul>
    </div>
  </div>
</section>

<section class="section light" id="expert">
  <div class="wrap">
    <div class="section-index" data-reveal><span class="num">03</span><span class="eyebrow"><?php s20_t('drenazh_s05_01'); ?></span></div>
    <div data-reveal>
      <h2 class="h2 max-w-none"><?php s20_t('drenazh_s05_02'); ?></h2>
    </div>
    <div class="grid gap-10 lg:grid-cols-5 mt-10 lg:mt-14 items-start">
      <div class="lg:col-span-2" data-reveal>
        <div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('drenazh_s05_03', 'src'); ?>" alt="<?php s20_img('drenazh_s05_03', 'alt'); ?>" loading="lazy"><div class="photo-cap"><span>Линейный водоотвод · Минский район</span></div></div>
      </div>
      <div class="lg:col-span-3 prose max-w-none" style="font-size:1.05rem" data-reveal><p><?php s20_t('drenazh_s05_04'); ?></p>
<p><?php s20_t('drenazh_s05_05'); ?></p>
<p><?php s20_t('drenazh_s05_06'); ?></p>
<p><?php s20_t('drenazh_s05_07'); ?></p>
<p><?php s20_t('drenazh_s05_08'); ?></p></div>
    </div>
  </div>
</section>


<section class="section sheet">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">04</span><span class="eyebrow"><?php s20_t('drenazh_s06_01'); ?></span></div><h2 class="h2"><?php s20_t('drenazh_s06_02'); ?></h2></div>
      <p class="lead muted"><?php s20_t('drenazh_s06_03'); ?></p>
    </div>
    <div data-reveal><div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4"><div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-cloud-rain"/></svg><h3 class="h4 mt-5"><?php s20_t('drenazh_s06_04'); ?></h3><p><?php s20_t('drenazh_s06_05'); ?></p></div><div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-waves"/></svg><h3 class="h4 mt-5"><?php s20_t('drenazh_s06_06'); ?></h3><p><?php s20_t('drenazh_s06_07'); ?></p></div><div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-map"/></svg><h3 class="h4 mt-5"><?php s20_t('drenazh_s06_08'); ?></h3><p><?php s20_t('drenazh_s06_09'); ?></p></div><div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-droplets"/></svg><h3 class="h4 mt-5"><?php s20_t('drenazh_s06_10'); ?></h3><p><?php s20_t('drenazh_s06_11'); ?></p></div></div></div>
  </div>
</section>

<section class="section sheet" id="raschet">
  <div class="wrap">
    <div class="grid gap-12 lg:grid-cols-12 items-start">
      <div class="lg:col-span-5" data-reveal>
        <div class="lg:sticky lg:top-28">
          <div class="section-index"><span class="num">05</span><span class="eyebrow"><?php s20_t('drenazh_s07_01'); ?></span></div>
          <h2 class="h2" style="font-size:clamp(1.8rem,2.8vw,2.6rem);hyphens:auto;overflow-wrap:break-word"><?php s20_t('drenazh_s07_02'); ?></h2>
          <p class="muted mt-6"><?php s20_t('drenazh_s07_03'); ?></p>
        </div>
      </div>
      <div class="lg:col-span-7" data-reveal><div class="quiz quiz-mount" data-preselect="drainage"></div></div>
    </div>
  </div>
</section>

<section class="section" id="proekty">
  <div class="wrap">
    <div class="section-head wide" data-reveal>
      <div><div class="section-index"><span class="num">06</span><span class="eyebrow"><?php s20_t('drenazh_s08_01'); ?></span></div><h2 class="h2"><?php s20_t('drenazh_s08_02'); ?></h2></div>
      <div class="lg:justify-self-end"><a class="btn btn-ghost" href="<?php echo s20_url('proekty'); ?>">Все инженерные кейсы <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a></div>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5" data-reveal="stagger">
<a class="case" href="<?php echo s20_url('proekty'); ?>#shitomirichi" data-tags="paving lawn irrigation drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('drenazh_s08_03', 'src'); ?>" alt="<?php s20_img('drenazh_s08_03', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Щитомиричи</span><span>2026</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Щитомиричи</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>600 м² газона</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2026</span></div>
    <h3 class="h3 mt-3"><?php s20_t('drenazh_s08_04'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Дренаж</span><span class="tag">Газон</span><span class="tag">Полив</span></div>
  </div>
</a>
<a class="case" href="<?php echo s20_url('proekty'); ?>#yuhnovka" data-tags="paving lawn drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('drenazh_s08_05', 'src'); ?>" alt="<?php s20_img('drenazh_s08_05', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Юхновка</span><span>2024</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Юхновка</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>430 м²</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2024</span></div>
    <h3 class="h3 mt-3"><?php s20_t('drenazh_s08_06'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Газон</span><span class="tag">Ливнёвка</span></div>
  </div>
</a>
    </div>
  </div>
</section>

<?php s20_set_preselect('drainage'); get_footer();
