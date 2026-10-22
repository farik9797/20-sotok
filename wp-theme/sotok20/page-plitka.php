<?php
/*
Template Name: Услуги — тротуарная плитка
page-plitka.php — собрано из макета uslugi/plitka.html скриптом tools/wp-port/build_theme.py.
*/
get_header();
?>

<section class="hero-sub">
  <div class="hero-media"><img src="<?php s20_img('plitka_s01_01', 'src'); ?>" alt="<?php s20_img('plitka_s01_01', 'alt'); ?>" aria-hidden="true" data-parallax="7"></div>
  <div class="hero-shade"></div>
  <div class="wrap hero-inner">
    <div class="eyebrow mb-6" data-hero-seq><?php s20_t('plitka_s01_02'); ?></div>
    <h1 class="h1 lg:max-w-[30ch]" data-hero-seq><?php s20_t('plitka_s01_03'); ?></h1>
    <div class="grid gap-8 lg:grid-cols-12 mt-10 items-end">
      <p class="lead muted lg:col-span-7" data-hero-seq><?php s20_t('plitka_s01_04'); ?></p>
      <div class="lg:col-span-5 grid gap-3 lg:w-max lg:justify-self-end" data-hero-seq>
        <a href="#raschet" class="btn btn-brass btn-lg w-full">Рассчитать бюджет за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <a href="<?php echo s20_url('proekty'); ?>" class="btn btn-ghost btn-lg w-full">Проекты</a>
      </div>
    </div>
    <div class="spec-strip hero-specs mt-12" data-hero-seq><div class="spec"><div class="spec-val"><?php s20_t('plitka_s01_05'); ?></div><div class="spec-lbl"><?php s20_t('plitka_s01_06'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('plitka_s01_07'); ?></div><div class="spec-lbl"><?php s20_t('plitka_s01_08'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('plitka_s01_09'); ?></div><div class="spec-lbl"><?php s20_t('plitka_s01_10'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('plitka_s01_11'); ?></div><div class="spec-lbl"><?php s20_t('plitka_s01_12'); ?></div></div></div>
  </div>
</section>

<!-- Ключевые показатели -->
<section class="specs" aria-label="Ключевые показатели">
  <div class="wrap">
    <div class="spec-strip" data-reveal="stagger"><div class="spec"><div class="spec-val"><?php s20_t('plitka_s02_01'); ?></div><div class="spec-lbl"><?php s20_t('plitka_s02_02'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('plitka_s02_03'); ?></div><div class="spec-lbl"><?php s20_t('plitka_s02_04'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('plitka_s02_05'); ?></div><div class="spec-lbl"><?php s20_t('plitka_s02_06'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('plitka_s02_07'); ?></div><div class="spec-lbl"><?php s20_t('plitka_s02_08'); ?></div></div></div>
  </div>
</section>

<section class="section light light-2" id="sostav">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">01</span><span class="eyebrow"><?php s20_t('plitka_s03_01'); ?></span></div><h2 class="h2"><?php s20_t('plitka_s03_02'); ?></h2></div>
      <p class="lead muted"><?php s20_t('plitka_s03_03'); ?></p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-10 hairline-b" data-reveal="stagger"><div class="incl"><div class="num">01</div><div><h3 class="h4"><?php s20_t('plitka_s03_04'); ?></h3><p><?php s20_t('plitka_s03_05'); ?></p></div></div><div class="incl"><div class="num">02</div><div><h3 class="h4"><?php s20_t('plitka_s03_06'); ?></h3><p><?php s20_t('plitka_s03_07'); ?></p></div></div><div class="incl"><div class="num">03</div><div><h3 class="h4"><?php s20_t('plitka_s03_08'); ?></h3><p><?php s20_t('plitka_s03_09'); ?></p></div></div><div class="incl"><div class="num">04</div><div><h3 class="h4"><?php s20_t('plitka_s03_10'); ?></h3><p><?php s20_t('plitka_s03_11'); ?></p></div></div><div class="incl"><div class="num">05</div><div><h3 class="h4"><?php s20_t('plitka_s03_12'); ?></h3><p><?php s20_t('plitka_s03_13'); ?></p></div></div><div class="incl"><div class="num">06</div><div><h3 class="h4"><?php s20_t('plitka_s03_14'); ?></h3><p><?php s20_t('plitka_s03_15'); ?></p></div></div></div>
  </div>
</section>

<section class="section sheet" id="inzheneriya">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">02</span><span class="eyebrow"><?php s20_t('plitka_s04_01'); ?></span></div><h2 class="h2"><?php s20_t('plitka_s04_02'); ?></h2></div>
      <p class="lead muted"><?php s20_t('plitka_s04_03'); ?></p>
    </div>
    <div class="grid gap-8 lg:grid-cols-12 items-start" data-reveal>
      <div class="lg:col-span-8 infog-frame infog-scroll"><svg class="infog" viewBox="0 0 900 480" role="img" aria-label="Пирог основания под парковку и пешеходную дорожку в разрезе"><defs>
<pattern id="p-plate" width="34" height="44" patternUnits="userSpaceOnUse"><rect width="34" height="44" fill="#EAE6DF"/><rect x="32" width="2" height="44" fill="rgba(42,47,53,.28)"/></pattern>
<pattern id="p-gravel" width="16" height="14" patternUnits="userSpaceOnUse"><rect width="16" height="14" fill="rgba(244,244,242,.07)"/><circle cx="4" cy="4" r="2.4" fill="rgba(244,244,242,.32)"/><circle cx="12" cy="10" r="1.8" fill="rgba(244,244,242,.24)"/></pattern>
<pattern id="p-sand" width="8" height="8" patternUnits="userSpaceOnUse"><rect width="8" height="8" fill="rgba(244,244,242,.05)"/><circle cx="2" cy="2" r=".9" fill="rgba(244,244,242,.35)"/><circle cx="6" cy="6" r=".9" fill="rgba(244,244,242,.25)"/></pattern>
<pattern id="p-soil" width="12" height="12" patternUnits="userSpaceOnUse" patternTransform="rotate(45)"><rect width="12" height="12" fill="rgba(35,39,44,.8)"/><rect width="1" height="12" fill="rgba(244,244,242,.16)"/></pattern>
<pattern id="p-turf" width="6" height="22" patternUnits="userSpaceOnUse"><rect width="6" height="22" fill="#2B4236"/><rect x="2.5" y="7" width="1" height="15" fill="rgba(244,244,242,.22)"/></pattern>
<pattern id="p-topsoil" width="10" height="10" patternUnits="userSpaceOnUse"><rect width="10" height="10" fill="rgba(184,134,11,.16)"/><circle cx="3" cy="3" r="1" fill="rgba(184,134,11,.5)"/><circle cx="8" cy="7" r=".8" fill="rgba(184,134,11,.4)"/></pattern>
<pattern id="p-mesh" width="6" height="6" patternUnits="userSpaceOnUse"><rect width="6" height="6" fill="none"/><rect width="6" height="1" fill="#B8860B"/><rect width="1" height="6" fill="#B8860B"/></pattern>
<pattern id="p-blind" width="10" height="10" patternUnits="userSpaceOnUse" patternTransform="rotate(45)"><rect width="10" height="10" fill="rgba(184,134,11,.08)"/><rect width="2" height="10" fill="rgba(184,134,11,.5)"/></pattern>
</defs><line x1="30" y1="110" x2="30" y2="440" stroke="rgba(244,244,242,.35)"/><line x1="26" y1="110" x2="34" y2="110" stroke="rgba(244,244,242,.5)"/><text x="22" y="114" class="lbl-s" text-anchor="end">0</text><line x1="26" y1="165" x2="34" y2="165" stroke="rgba(244,244,242,.5)"/><text x="22" y="169" class="lbl-s" text-anchor="end">100</text><line x1="26" y1="220" x2="34" y2="220" stroke="rgba(244,244,242,.5)"/><text x="22" y="224" class="lbl-s" text-anchor="end">200</text><line x1="26" y1="275" x2="34" y2="275" stroke="rgba(244,244,242,.5)"/><text x="22" y="279" class="lbl-s" text-anchor="end">300</text><line x1="26" y1="330" x2="34" y2="330" stroke="rgba(244,244,242,.5)"/><text x="22" y="334" class="lbl-s" text-anchor="end">400</text><line x1="26" y1="385" x2="34" y2="385" stroke="rgba(244,244,242,.5)"/><text x="22" y="389" class="lbl-s" text-anchor="end">500</text><line x1="26" y1="440" x2="34" y2="440" stroke="rgba(244,244,242,.5)"/><text x="22" y="444" class="lbl-s" text-anchor="end">600 мм</text><text x="40" y="62" class="cap">Парковка · легковой автомобиль</text><text x="40" y="84" class="lbl-s">нагрузка до 3,5 т · уклон 1,5–2 % от дома · бордюр на бетонном замке</text><rect x="40" y="110" width="340" height="44" fill="url(#p-plate)"/><text x="54" y="136.0" class="lbl t-dark">Тротуарная плитка</text><text x="366" y="136.0" class="lbl t-dark" text-anchor="end">80 мм</text><rect x="40" y="154" width="340" height="22" fill="rgba(184,134,11,.55)"/><text x="54" y="169.0" class="lbl-s">ЦПС — сухая цементно-песчаная смесь</text><text x="366" y="169.0" class="lbl-s" text-anchor="end">40 мм</text><rect x="40" y="176" width="340" height="138" fill="url(#p-gravel)"/><text x="54" y="204" class="lbl">Щебень фр. 20–40</text><text x="54" y="222" class="lbl-s">послойное уплотнение виброплитой, каждые 100–120 мм</text><text x="366" y="204" class="lbl" text-anchor="end">250 мм</text><line x1="40" y1="314" x2="380" y2="314" stroke="#B8860B" stroke-width="2" stroke-dasharray="8 5"/><text x="366" y="329" class="lbl-s t-brass" text-anchor="end">геотекстиль 200 г/м²</text><rect x="40" y="314" width="340" height="55" fill="url(#p-sand)"/><text x="54" y="345.5" class="lbl">Песок средней крупности</text><text x="366" y="345.5" class="lbl" text-anchor="end">100 мм</text><rect x="40" y="369" width="340" height="71" fill="url(#p-soil)"/><text x="54" y="408.5" class="lbl">Уплотнённый материковый грунт</text><rect x="374" y="214" width="34" height="48" fill="rgba(244,244,242,.18)" stroke="rgba(244,244,242,.35)"/><rect x="380" y="98" width="22" height="150" fill="#EAE6DF" opacity=".92"/><text x="414" y="236" class="lbl-s t-brass">бордюр</text><text x="414" y="250" class="lbl-s t-brass">на жёстком</text><text x="414" y="264" class="lbl-s t-brass">бетонном замке</text><text x="40" y="466" class="lbl-s">Σ пирога ≈ 470 мм · выемка грунта спецтехникой, вывоз</text><text x="520" y="62" class="cap">Пешеходная дорожка</text><text x="520" y="84" class="lbl-s">уклон 1–2 % · водоотвод в газон или ливнёвку</text><rect x="520" y="110" width="340" height="33" fill="url(#p-plate)"/><text x="534" y="130.5" class="lbl t-dark">Тротуарная плитка</text><text x="846" y="130.5" class="lbl t-dark" text-anchor="end">60 мм</text><rect x="520" y="143" width="340" height="17" fill="rgba(184,134,11,.55)"/><text x="534" y="155.5" class="lbl-s">ЦПС</text><text x="846" y="155.5" class="lbl-s" text-anchor="end">30 мм</text><rect x="520" y="160" width="340" height="82" fill="url(#p-gravel)"/><text x="534" y="188" class="lbl">Щебень фр. 20–40</text><text x="534" y="206" class="lbl-s">уплотнение виброплитой</text><text x="846" y="188" class="lbl" text-anchor="end">150 мм</text><line x1="520" y1="242" x2="860" y2="242" stroke="#B8860B" stroke-width="2" stroke-dasharray="8 5"/><text x="846" y="257" class="lbl-s t-brass" text-anchor="end">геотекстиль</text><rect x="520" y="242" width="340" height="55" fill="url(#p-sand)"/><text x="534" y="273.5" class="lbl">Песок средней крупности</text><text x="846" y="273.5" class="lbl" text-anchor="end">100 мм</text><rect x="520" y="297" width="340" height="143" fill="url(#p-soil)"/><text x="534" y="372.5" class="lbl">Уплотнённый материковый грунт</text><text x="520" y="466" class="lbl-s">Σ пирога ≈ 340 мм</text></svg></div>
      <ul class="lg:col-span-4 legend lg:pl-4"><li><?php s20_t('plitka_s04_04'); ?></li><li><?php s20_t('plitka_s04_05'); ?></li><li><?php s20_t('plitka_s04_06'); ?></li><li><?php s20_t('plitka_s04_07'); ?></li><li><?php s20_t('plitka_s04_08'); ?></li></ul>
    </div>
  </div>
</section>

<section class="section light" id="expert">
  <div class="wrap">
    <div class="section-index" data-reveal><span class="num">03</span><span class="eyebrow"><?php s20_t('plitka_s05_01'); ?></span></div>
    <div data-reveal>
      <h2 class="h2 max-w-none"><?php s20_t('plitka_s05_02'); ?></h2>
    </div>
    <div class="grid gap-10 lg:grid-cols-5 mt-10 lg:mt-14 items-start">
      <div class="lg:col-span-2" data-reveal>
        <div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('plitka_s05_03', 'src'); ?>" alt="<?php s20_img('plitka_s05_03', 'alt'); ?>" loading="lazy"><div class="photo-cap"><span>Мощение террасы · Минский район</span></div></div>
      </div>
      <div class="lg:col-span-3 prose max-w-none" style="font-size:1.05rem" data-reveal><p><?php s20_t('plitka_s05_04'); ?></p>
<p><?php s20_t('plitka_s05_05'); ?></p>
<p><?php s20_t('plitka_s05_06'); ?></p>
<p><?php s20_t('plitka_s05_07'); ?></p>
<p><?php s20_t('plitka_s05_08'); ?></p></div>
    </div>
  </div>
</section>


<section class="section sheet">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">04</span><span class="eyebrow"><?php s20_t('plitka_s06_01'); ?></span></div><h2 class="h2"><?php s20_t('plitka_s06_02'); ?></h2></div>
      <p class="lead muted"><?php s20_t('plitka_s06_03'); ?></p>
    </div>
    <div data-reveal><div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4"><div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-layout-grid"/></svg><h3 class="h4 mt-5"><?php s20_t('plitka_s06_04'); ?></h3><p><?php s20_t('plitka_s06_05'); ?></p></div><div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-layers"/></svg><h3 class="h4 mt-5"><?php s20_t('plitka_s06_06'); ?></h3><p><?php s20_t('plitka_s06_07'); ?></p></div><div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-ruler"/></svg><h3 class="h4 mt-5"><?php s20_t('plitka_s06_08'); ?></h3><p><?php s20_t('plitka_s06_09'); ?></p></div><div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-droplets"/></svg><h3 class="h4 mt-5"><?php s20_t('plitka_s06_10'); ?></h3><p><?php s20_t('plitka_s06_11'); ?></p></div></div></div>
  </div>
</section>

<section class="section sheet" id="raschet">
  <div class="wrap">
    <div class="grid gap-12 lg:grid-cols-12 items-start">
      <div class="lg:col-span-5" data-reveal>
        <div class="lg:sticky lg:top-28">
          <div class="section-index"><span class="num">05</span><span class="eyebrow"><?php s20_t('plitka_s07_01'); ?></span></div>
          <h2 class="h2" style="font-size:clamp(1.8rem,2.8vw,2.6rem);hyphens:auto;overflow-wrap:break-word"><?php s20_t('plitka_s07_02'); ?></h2>
          <p class="muted mt-6"><?php s20_t('plitka_s07_03'); ?></p>
        </div>
      </div>
      <div class="lg:col-span-7" data-reveal><div class="quiz quiz-mount" data-preselect=""></div></div>
    </div>
  </div>
</section>

<section class="section" id="proekty">
  <div class="wrap">
    <div class="section-head wide" data-reveal>
      <div><div class="section-index"><span class="num">06</span><span class="eyebrow"><?php s20_t('plitka_s08_01'); ?></span></div><h2 class="h2"><?php s20_t('plitka_s08_02'); ?></h2></div>
      <div class="lg:justify-self-end"><a class="btn btn-ghost" href="<?php echo s20_url('proekty'); ?>">Все инженерные кейсы <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a></div>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5" data-reveal="stagger">
<a class="case" href="<?php echo s20_url('proekty'); ?>#shitomirichi" data-tags="paving lawn irrigation drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('plitka_s08_03', 'src'); ?>" alt="<?php s20_img('plitka_s08_03', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Щитомиричи</span><span>2026</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Щитомиричи</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>600 м² газона</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2026</span></div>
    <h3 class="h3 mt-3"><?php s20_t('plitka_s08_04'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Дренаж</span><span class="tag">Газон</span><span class="tag">Полив</span></div>
  </div>
</a>
<a class="case" href="<?php echo s20_url('proekty'); ?>#mramor" data-tags="paving" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('plitka_s08_05', 'src'); ?>" alt="<?php s20_img('plitka_s08_05', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Пошаговая дорожка</span><span>2025</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-ruler"/></svg>30 м. п.</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>54 плиты</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2025</span></div>
    <h3 class="h3 mt-3"><?php s20_t('plitka_s08_06'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span></div>
  </div>
</a>
<a class="case" href="<?php echo s20_url('proekty'); ?>#yuhnovka" data-tags="paving lawn drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('plitka_s08_07', 'src'); ?>" alt="<?php s20_img('plitka_s08_07', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Юхновка</span><span>2024</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Юхновка</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>430 м²</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2024</span></div>
    <h3 class="h3 mt-3"><?php s20_t('plitka_s08_08'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Газон</span><span class="tag">Ливнёвка</span></div>
  </div>
</a>
    </div>
  </div>
</section>

<?php s20_set_preselect(''); get_footer();
