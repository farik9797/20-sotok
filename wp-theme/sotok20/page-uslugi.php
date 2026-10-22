<?php
/*
Template Name: Услуги
page-uslugi.php — собрано из макета uslugi.html скриптом tools/wp-port/build_theme.py.
*/
get_header();
?>


<section class="hero-sub">
  <div class="hero-media">
    <video autoplay muted loop playsinline poster="<?php echo S20_A; ?>img/real/hero-uslugi.webp" aria-hidden="true">
      <source src="<?php echo S20_A; ?>video/hero-uslugi-sm.mp4" type="video/mp4" media="(max-width: 767px)">
      <source src="<?php echo S20_A; ?>video/hero-uslugi.mp4" type="video/mp4">
    </video>
  </div>
  <div class="hero-shade"></div>
  <div class="wrap hero-inner">
    <div class="eyebrow mb-6" data-hero-seq><?php s20_t('uslugi_s01_01'); ?></div>
    <h1 class="h1 lg:max-w-[30ch]" data-hero-seq><?php s20_t('uslugi_s01_02'); ?></h1>
    <div class="grid gap-8 lg:grid-cols-12 mt-10 items-end">
      <p class="lead muted lg:col-span-7" data-hero-seq><?php s20_t('uslugi_s01_03'); ?></p>
      <div class="lg:col-span-5 grid gap-3 lg:w-max lg:justify-self-end" data-hero-seq>
        <button type="button" class="btn btn-brass btn-lg w-full" data-quiz-open>Рассчитать бюджет за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        <a href="<?php echo s20_url('proekty'); ?>" class="btn btn-ghost btn-lg w-full">Смотреть проекты</a>
      </div>
    </div>
    <div class="spec-strip hero-specs mt-12" data-hero-seq><div class="spec"><div class="spec-val"><?php s20_t('uslugi_s01_04'); ?></div><div class="spec-lbl"><?php s20_t('uslugi_s01_05'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('uslugi_s01_06'); ?></div><div class="spec-lbl"><?php s20_t('uslugi_s01_07'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('uslugi_s01_08'); ?></div><div class="spec-lbl"><?php s20_t('uslugi_s01_09'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('uslugi_s01_10'); ?></div><div class="spec-lbl"><?php s20_t('uslugi_s01_11'); ?></div></div></div>
  </div>
</section>

<!-- Ключевые показатели -->
<section class="specs" aria-label="Ключевые показатели">
  <div class="wrap">
    <div class="spec-strip" data-reveal="stagger"><div class="spec"><div class="spec-val"><?php s20_t('uslugi_s02_01'); ?></div><div class="spec-lbl"><?php s20_t('uslugi_s02_02'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('uslugi_s02_03'); ?></div><div class="spec-lbl"><?php s20_t('uslugi_s02_04'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('uslugi_s02_05'); ?></div><div class="spec-lbl"><?php s20_t('uslugi_s02_06'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('uslugi_s02_07'); ?></div><div class="spec-lbl"><?php s20_t('uslugi_s02_08'); ?></div></div></div>
  </div>
</section>

<!-- 01 · Направления -->
<section class="section light light-2" id="napravleniya">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">01</span><span class="eyebrow"><?php s20_t('uslugi_s03_01'); ?></span></div>
        <h2 class="h2"><?php s20_t('uslugi_s03_02'); ?></h2>
      </div>
      <p class="lead muted"><?php s20_t('uslugi_s03_03'); ?></p>
    </div>
    <div class="grid md:grid-cols-2 gap-5 lg:gap-7" data-reveal="stagger">
<a class="svc" href="<?php echo s20_url('uslugi/plitka'); ?>" data-cursor-label="Подробнее">
  <div class="svc-media"><img src="<?php s20_img('uslugi_s03_04', 'src'); ?>" alt="<?php s20_img('uslugi_s03_04', 'alt'); ?>" loading="lazy" data-parallax="6"></div>
  <span class="svc-tag">01 / Мощение</span>
  <div class="svc-body">
    <div class="num">01</div>
    <div><h3 class="h3"><?php s20_t('uslugi_s03_05'); ?></h3><p><?php s20_t('uslugi_s03_06'); ?></p></div>
    <span class="svc-arrow"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
  </div>
</a>
<a class="svc svc-fir" href="<?php echo s20_url('uslugi/gazon'); ?>" data-cursor-label="Подробнее">
  <div class="svc-media"><img src="<?php s20_img('uslugi_s03_07', 'src'); ?>" alt="<?php s20_img('uslugi_s03_07', 'alt'); ?>" loading="lazy" data-parallax="6"></div>
  <span class="svc-tag">02 / Газон</span>
  <div class="svc-body">
    <div class="num">02</div>
    <div><h3 class="h3"><?php s20_t('uslugi_s03_08'); ?></h3><p><?php s20_t('uslugi_s03_09'); ?></p></div>
    <span class="svc-arrow"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
  </div>
</a>
<a class="svc" href="<?php echo s20_url('uslugi/poliv'); ?>" data-cursor-label="Подробнее">
  <div class="svc-media"><img src="<?php s20_img('uslugi_s03_10', 'src'); ?>" alt="<?php s20_img('uslugi_s03_10', 'alt'); ?>" loading="lazy" data-parallax="6"></div>
  <span class="svc-tag">03 / Полив · Свет</span>
  <div class="svc-body">
    <div class="num">03</div>
    <div><h3 class="h3"><?php s20_t('uslugi_s03_11'); ?></h3><p><?php s20_t('uslugi_s03_12'); ?></p></div>
    <span class="svc-arrow"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
  </div>
</a>
<a class="svc" href="<?php echo s20_url('uslugi/drenazh'); ?>" data-cursor-label="Подробнее">
  <div class="svc-media"><img src="<?php s20_img('uslugi_s03_13', 'src'); ?>" alt="<?php s20_img('uslugi_s03_13', 'alt'); ?>" loading="lazy" data-parallax="6"></div>
  <span class="svc-tag">04 / Дренаж</span>
  <div class="svc-body">
    <div class="num">04</div>
    <div><h3 class="h3"><?php s20_t('uslugi_s03_14'); ?></h3><p><?php s20_t('uslugi_s03_15'); ?></p></div>
    <span class="svc-arrow"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
  </div>
</a>
    </div>
  </div>
</section>

<!-- 02 · Комплекс под ключ -->
<section class="section sheet has-bg" id="kompleks">
  <img class="sec-bg" src="<?php s20_img('uslugi_s04_01', 'src'); ?>" alt="<?php s20_img('uslugi_s04_01', 'alt'); ?>" aria-hidden="true" loading="lazy">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">02</span><span class="eyebrow"><?php s20_t('uslugi_s04_02'); ?></span></div><h2 class="h2"><?php s20_t('uslugi_s04_03'); ?></h2></div>
      <p class="lead muted"><?php s20_t('uslugi_s04_04'); ?></p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-10 hairline-b swipe" data-reveal="stagger"><div class="incl"><div class="num">01</div><div><h3 class="h4"><?php s20_t('uslugi_s04_05'); ?></h3><p><?php s20_t('uslugi_s04_06'); ?></p></div></div><div class="incl"><div class="num">02</div><div><h3 class="h4"><?php s20_t('uslugi_s04_07'); ?></h3><p><?php s20_t('uslugi_s04_08'); ?></p></div></div><div class="incl"><div class="num">03</div><div><h3 class="h4"><?php s20_t('uslugi_s04_09'); ?></h3><p><?php s20_t('uslugi_s04_10'); ?></p></div></div><div class="incl"><div class="num">04</div><div><h3 class="h4"><?php s20_t('uslugi_s04_11'); ?></h3><p><?php s20_t('uslugi_s04_12'); ?></p></div></div><div class="incl"><div class="num">05</div><div><h3 class="h4"><?php s20_t('uslugi_s04_13'); ?></h3><p><?php s20_t('uslugi_s04_14'); ?></p></div></div><div class="incl"><div class="num">06</div><div><h3 class="h4"><?php s20_t('uslugi_s04_15'); ?></h3><p><?php s20_t('uslugi_s04_16'); ?></p></div></div></div>
  </div>
</section>

<!-- 03 · Один подрядчик -->
<section class="section light has-bg" id="odin-podryadchik">
  <img class="sec-bg" src="<?php s20_img('uslugi_s05_01', 'src'); ?>" alt="<?php s20_img('uslugi_s05_01', 'alt'); ?>" aria-hidden="true" loading="lazy">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">03</span><span class="eyebrow"><?php s20_t('uslugi_s05_02'); ?></span></div><h2 class="h2"><?php s20_t('uslugi_s05_03'); ?></h2></div>
      <p class="lead muted"><?php s20_t('uslugi_s05_04'); ?></p>
    </div>
    <div data-reveal><div class="overflow-x-auto"><table class="cmp"><thead><tr><th></th><th><?php s20_t('uslugi_s05_05'); ?></th><th><?php s20_t('uslugi_s05_06'); ?></th></tr></thead><tbody>
<tr><td><?php s20_t('uslugi_s05_07'); ?></td><td class="win" data-th="Комплекс одной командой"><?php s20_t('uslugi_s05_08'); ?></td><td data-th="Четыре подрядчика"><?php s20_t('uslugi_s05_09'); ?></td></tr>
<tr><td><?php s20_t('uslugi_s05_10'); ?></td><td class="win" data-th="Комплекс одной командой"><?php s20_t('uslugi_s05_11'); ?></td><td data-th="Четыре подрядчика"><?php s20_t('uslugi_s05_12'); ?></td></tr>
<tr><td><?php s20_t('uslugi_s05_13'); ?></td><td class="win" data-th="Комплекс одной командой"><?php s20_t('uslugi_s05_14'); ?></td><td data-th="Четыре подрядчика"><?php s20_t('uslugi_s05_15'); ?></td></tr>
<tr><td><?php s20_t('uslugi_s05_16'); ?></td><td class="win" data-th="Комплекс одной командой"><?php s20_t('uslugi_s05_17'); ?></td><td data-th="Четыре подрядчика"><?php s20_t('uslugi_s05_18'); ?></td></tr>
<tr><td><?php s20_t('uslugi_s05_19'); ?></td><td class="win" data-th="Комплекс одной командой"><?php s20_t('uslugi_s05_20'); ?></td><td data-th="Четыре подрядчика"><?php s20_t('uslugi_s05_21'); ?></td></tr>
</tbody></table></div></div>
  </div>
</section>

<!-- 04 · Как проходит работа -->
<section class="section sheet has-bg" id="process">
  <img class="sec-bg" src="<?php s20_img('uslugi_s06_01', 'src'); ?>" alt="<?php s20_img('uslugi_s06_01', 'alt'); ?>" aria-hidden="true" loading="lazy">
  <div class="wrap">
    <div class="grid gap-12 lg:grid-cols-12">
      <div class="lg:col-span-4" data-reveal>
        <div class="lg:sticky lg:top-28">
          <div class="section-index"><span class="num">04</span><span class="eyebrow"><?php s20_t('uslugi_s06_02'); ?></span></div>
          <h2 class="h2"><?php s20_t('uslugi_s06_03'); ?></h2>
          <p class="muted mt-6"><?php s20_t('uslugi_s06_04'); ?></p>
          <button type="button" class="btn btn-brass mt-8" data-quiz-open>Начать с расчёта <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        </div>
      </div>
      <div class="lg:col-span-8 steps"><span class="step-line" aria-hidden="true"></span><div class="hairline-b" data-reveal="stagger">
<div class="step">
  <div class="num">01</div>
  <div><h3 class="h3"><?php s20_t('uslugi_s06_05'); ?></h3><p><?php s20_t('uslugi_s06_06'); ?></p></div>
</div>
<div class="step">
  <div class="num">02</div>
  <div><h3 class="h3"><?php s20_t('uslugi_s06_07'); ?></h3><p><?php s20_t('uslugi_s06_08'); ?></p></div>
</div>
<div class="step">
  <div class="num">03</div>
  <div><h3 class="h3"><?php s20_t('uslugi_s06_09'); ?></h3><p><?php s20_t('uslugi_s06_10'); ?></p></div>
</div>
<div class="step">
  <div class="num">04</div>
  <div><h3 class="h3"><?php s20_t('uslugi_s06_11'); ?></h3><p><?php s20_t('uslugi_s06_12'); ?></p></div>
</div>
<div class="step">
  <div class="num">05</div>
  <div><h3 class="h3"><?php s20_t('uslugi_s06_13'); ?></h3><p><?php s20_t('uslugi_s06_14'); ?></p></div>
</div>
      </div>
      </div>
    </div>
  </div>
</section>

<section class="section-tight cta-fir">
  <div class="wrap">
    <div class="cta-band" data-reveal>
      <div>
        <div class="eyebrow mb-4"><?php s20_t('uslugi_s07_01'); ?></div>
        <h2 class="h2" style="font-size:clamp(1.7rem,3vw,2.8rem)"><?php s20_t('uslugi_s07_02'); ?></h2>
        <p class="muted mt-4 lead" style="font-size:1.05rem"><?php s20_t('uslugi_s07_03'); ?></p>
      </div>
      <div class="lg:justify-self-end grid gap-3">
        <button type="button" class="btn btn-brass btn-lg" data-quiz-open>Рассчитать бюджет проекта за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        <a href="<?php echo esc_html(s20_c('tel')); ?>" class="btn btn-ghost btn-lg"><svg class="ic " aria-hidden="true"><use href="#i-phone"/></svg> <?php echo esc_html(s20_c('phone')); ?></a>
      </div>
    </div>
  </div>
</section>


<?php s20_set_preselect(''); get_footer();
