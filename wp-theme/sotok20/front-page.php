<?php
/*
front-page.php — собрано из макета index.html скриптом tools/wp-port/build_theme.py.
*/
get_header();
?>

<!-- 01 · Первый экран -->
<section class="hero">
  <div class="hero-media">
    <video autoplay muted loop playsinline poster="<?php echo S20_A; ?>img/hero.jpg" aria-hidden="true">
      <source src="<?php echo S20_A; ?>video/hero-sm.mp4" type="video/mp4" media="(max-width: 767px)">
      <source src="<?php echo S20_A; ?>video/hero.mp4" type="video/mp4">
    </video>
  </div>
  <div class="hero-shade"></div>
  <div class="wrap hero-inner">
    <div class="hero-main">
      <div class="eyebrow mb-6" data-hero-seq><?php s20_t('home_s01_01'); ?></div>
      <h1 class="h1 lg:max-w-[30ch]" data-hero-seq><?php s20_t('home_s01_02'); ?></h1>
      <div class="grid gap-8 lg:grid-cols-12 mt-8 lg:mt-10 items-end">
        <p class="lead muted lg:col-span-7" data-hero-seq><?php s20_t('home_s01_03'); ?></p>
        <div class="lg:col-span-5 grid gap-3 lg:w-max lg:justify-self-end" data-hero-seq>
          <button type="button" class="btn btn-brass btn-lg w-full" data-quiz-open>Рассчитать бюджет проекта за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
          <a href="<?php echo s20_url('proekty'); ?>" class="btn btn-ghost btn-lg w-full">Смотреть проекты</a>
        </div>
      </div>
    </div>
    
      <div class="spec-strip hero-specs mt-10 lg:mt-12" data-hero-seq>
      <div class="spec"><div class="spec-val"><?php s20_t('home_s01_04'); ?></div><div class="spec-lbl"><?php s20_t('home_s01_05'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('home_s01_06'); ?></div><div class="spec-lbl"><?php s20_t('home_s01_07'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('home_s01_08'); ?></div><div class="spec-lbl"><?php s20_t('home_s01_09'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('home_s01_10'); ?></div><div class="spec-lbl"><?php s20_t('home_s01_11'); ?></div></div>
  </div>
  </div>
</section>

<!-- Ключевые показатели -->
<section class="specs" aria-label="Ключевые показатели">
  <div class="wrap">
    <div class="spec-strip" data-reveal="stagger">
      <div class="spec"><div class="spec-val"><?php s20_t('home_s02_01'); ?></div><div class="spec-lbl"><?php s20_t('home_s02_02'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('home_s02_03'); ?></div><div class="spec-lbl"><?php s20_t('home_s02_04'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('home_s02_05'); ?></div><div class="spec-lbl"><?php s20_t('home_s02_06'); ?></div></div><div class="spec"><div class="spec-val"><?php s20_t('home_s02_07'); ?></div><div class="spec-lbl"><?php s20_t('home_s02_08'); ?></div></div>
  </div>
  </div>
</section>

<div class="hairline hairline-b py-5" aria-hidden="true">
  <div class="wrap"><div class="marquee"><div class="marquee-track"><span><svg class="ic " aria-hidden="true"><use href="#i-shovel"/></svg>Планировочные работы</span><span><svg class="ic " aria-hidden="true"><use href="#i-layers"/></svg>Мощение и тротуарная плитка</span><span><svg class="ic " aria-hidden="true"><use href="#i-waves"/></svg>Дренаж и ливнёвка</span><span><svg class="ic " aria-hidden="true"><use href="#i-sprout"/></svg>Рулонный и посевной газон</span><span><svg class="ic " aria-hidden="true"><use href="#i-droplets"/></svg>Автополив Hunter / Rain Bird</span><span><svg class="ic " aria-hidden="true"><use href="#i-sun"/></svg>Ландшафтное освещение</span><span><svg class="ic " aria-hidden="true"><use href="#i-shovel"/></svg>Планировочные работы</span><span><svg class="ic " aria-hidden="true"><use href="#i-layers"/></svg>Мощение и тротуарная плитка</span><span><svg class="ic " aria-hidden="true"><use href="#i-waves"/></svg>Дренаж и ливнёвка</span><span><svg class="ic " aria-hidden="true"><use href="#i-sprout"/></svg>Рулонный и посевной газон</span><span><svg class="ic " aria-hidden="true"><use href="#i-droplets"/></svg>Автополив Hunter / Rain Bird</span><span><svg class="ic " aria-hidden="true"><use href="#i-sun"/></svg>Ландшафтное освещение</span><span><svg class="ic " aria-hidden="true"><use href="#i-shovel"/></svg>Планировочные работы</span><span><svg class="ic " aria-hidden="true"><use href="#i-layers"/></svg>Мощение и тротуарная плитка</span><span><svg class="ic " aria-hidden="true"><use href="#i-waves"/></svg>Дренаж и ливнёвка</span><span><svg class="ic " aria-hidden="true"><use href="#i-sprout"/></svg>Рулонный и посевной газон</span><span><svg class="ic " aria-hidden="true"><use href="#i-droplets"/></svg>Автополив Hunter / Rain Bird</span><span><svg class="ic " aria-hidden="true"><use href="#i-sun"/></svg>Ландшафтное освещение</span></div></div></div>
</div>

<!-- Видео-мост -->
<section class="most" id="rabota-v-kadre" aria-label="Работы студии в видео">
  <video data-clip data-most muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-most.webp" aria-label="Автополив на газоне, мощёная дорожка и вид с воздуха на готовый участок с подсветкой">
    <source src="<?php echo S20_A; ?>video/most-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/most.mp4" type="video/mp4">
  </video>
  <div class="most-cap"><div class="wrap"><span class="eyebrow"><?php s20_t('home_s03_01'); ?></span><p><?php s20_t('home_s03_02'); ?></p></div></div>
</section>

<!-- 02 · Преимущества -->
<section class="section sheet" id="preimushchestva">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">02</span><span class="eyebrow"><?php s20_t('home_s04_01'); ?></span></div>
        <h2 class="h2"><?php s20_t('home_s04_02'); ?></h2>
      </div>
      <div class="fir-plate"><p class="lead"><?php s20_t('home_s04_03'); ?></p></div>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 hairline-b" data-reveal="stagger">
<article class="feature feature-video">
  <video class="feature-bg" data-clip data-most muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-card-niveliry.webp" aria-hidden="true">
    <source src="<?php echo S20_A; ?>video/card-niveliry-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/card-niveliry.mp4" type="video/mp4">
  </video>
  <div class="num">01</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-scan-line"/></svg>
  <h3 class="h3"><?php s20_t('home_s04_04'); ?></h3>
  <p><?php s20_t('home_s04_05'); ?></p>
</article>
<article class="feature feature-video">
  <video class="feature-bg" data-clip data-most muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-card-kompleks.webp" aria-hidden="true">
    <source src="<?php echo S20_A; ?>video/card-kompleks-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/card-kompleks.mp4" type="video/mp4">
  </video>
  <div class="num">02</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-file-check-2"/></svg>
  <h3 class="h3"><?php s20_t('home_s04_06'); ?></h3>
  <p><?php s20_t('home_s04_07'); ?></p>
</article>
<article class="feature feature-video">
  <video class="feature-bg" data-clip data-most muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-card-ukladka.webp" aria-hidden="true">
    <source src="<?php echo S20_A; ?>video/card-ukladka-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/card-ukladka.mp4" type="video/mp4">
  </video>
  <div class="num">03</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-video"/></svg>
  <h3 class="h3"><?php s20_t('home_s04_08'); ?></h3>
  <p><?php s20_t('home_s04_09'); ?></p>
</article>
<article class="feature feature-video">
  <video class="feature-bg" data-clip data-most muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-card-dom.webp" aria-hidden="true">
    <source src="<?php echo S20_A; ?>video/card-dom-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/card-dom.mp4" type="video/mp4">
  </video>
  <div class="num">04</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-lock"/></svg>
  <h3 class="h3"><?php s20_t('home_s04_10'); ?></h3>
  <p><?php s20_t('home_s04_11'); ?></p>
</article>
    </div>
  </div>
</section>

<!-- 03 · Каталог услуг -->
<section class="section light light-2" id="uslugi">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">03</span><span class="eyebrow"><?php s20_t('home_s05_01'); ?></span></div>
        <h2 class="h2"><?php s20_t('home_s05_02'); ?></h2>
      </div>
      <p class="lead muted"><?php s20_t('home_s05_03'); ?></p>
    </div>
    <div class="grid md:grid-cols-2 gap-5 lg:gap-7 swipe" data-reveal="stagger">
<a class="svc" href="<?php echo s20_url('uslugi/plitka'); ?>" data-cursor-label="Подробнее">
  <div class="svc-media"><img src="<?php s20_img('home_s05_04', 'src'); ?>" alt="<?php s20_img('home_s05_04', 'alt'); ?>" loading="lazy" data-parallax="6"></div>
  <span class="svc-tag">01 / Мощение</span>
  <div class="svc-body">
    <div class="num">01</div>
    <div><h3 class="h3"><?php s20_t('home_s05_05'); ?></h3><p><?php s20_t('home_s05_06'); ?></p></div>
    <span class="svc-arrow"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
  </div>
</a>
<a class="svc svc-fir" href="<?php echo s20_url('uslugi/gazon'); ?>" data-cursor-label="Подробнее">
  <div class="svc-media"><img src="<?php s20_img('home_s05_07', 'src'); ?>" alt="<?php s20_img('home_s05_07', 'alt'); ?>" loading="lazy" data-parallax="6"></div>
  <span class="svc-tag">02 / Газон</span>
  <div class="svc-body">
    <div class="num">02</div>
    <div><h3 class="h3"><?php s20_t('home_s05_08'); ?></h3><p><?php s20_t('home_s05_09'); ?></p></div>
    <span class="svc-arrow"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
  </div>
</a>
<a class="svc" href="<?php echo s20_url('uslugi/poliv'); ?>" data-cursor-label="Подробнее">
  <div class="svc-media"><img src="<?php s20_img('home_s05_10', 'src'); ?>" alt="<?php s20_img('home_s05_10', 'alt'); ?>" loading="lazy" data-parallax="6"></div>
  <span class="svc-tag">03 / Полив · Свет</span>
  <div class="svc-body">
    <div class="num">03</div>
    <div><h3 class="h3"><?php s20_t('home_s05_11'); ?></h3><p><?php s20_t('home_s05_12'); ?></p></div>
    <span class="svc-arrow"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
  </div>
</a>
<a class="svc" href="<?php echo s20_url('uslugi/drenazh'); ?>" data-cursor-label="Подробнее">
  <div class="svc-media"><img src="<?php s20_img('home_s05_13', 'src'); ?>" alt="<?php s20_img('home_s05_13', 'alt'); ?>" loading="lazy" data-parallax="6"></div>
  <span class="svc-tag">04 / Дренаж</span>
  <div class="svc-body">
    <div class="num">04</div>
    <div><h3 class="h3"><?php s20_t('home_s05_14'); ?></h3><p><?php s20_t('home_s05_15'); ?></p></div>
    <span class="svc-arrow"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
  </div>
</a>
    </div>
  </div>
</section>

<!-- 04 · Примеры работ -->
<section class="section light" id="proekty">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">04</span><span class="eyebrow"><?php s20_t('home_s06_01'); ?></span></div>
        <h2 class="h2"><?php s20_t('home_s06_02'); ?></h2>
      </div>
      <p class="lead muted"><?php s20_t('home_s06_03'); ?></p>
    </div>
    <div class="grid gap-5 lg:gap-7 md:grid-cols-3 swipe items-stretch" data-reveal>
<a class="case" href="<?php echo s20_url('proekty'); ?>#shitomirichi" data-tags="paving lawn irrigation drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('home_s06_04', 'src'); ?>" alt="<?php s20_img('home_s06_04', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Щитомиричи</span><span>2026</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Щитомиричи</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>600 м² газона</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2026</span></div>
    <h3 class="h3 mt-3"><?php s20_t('home_s06_05'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Дренаж</span><span class="tag">Газон</span><span class="tag">Полив</span></div>
  </div>
</a>
<a class="case" href="<?php echo s20_url('proekty'); ?>#mramor" data-tags="paving" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('home_s06_06', 'src'); ?>" alt="<?php s20_img('home_s06_06', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Пошаговая дорожка</span><span>2025</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-ruler"/></svg>30 м. п.</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>54 плиты</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2025</span></div>
    <h3 class="h3 mt-3"><?php s20_t('home_s06_07'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span></div>
  </div>
</a>
<a class="case" href="<?php echo s20_url('proekty'); ?>#yuhnovka" data-tags="paving lawn drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('home_s06_08', 'src'); ?>" alt="<?php s20_img('home_s06_08', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Юхновка</span><span>2024</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Юхновка</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>430 м²</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2024</span></div>
    <h3 class="h3 mt-3"><?php s20_t('home_s06_09'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Газон</span><span class="tag">Ливнёвка</span></div>
  </div>
</a>
    </div>
    <div class="grid gap-3 sm:grid-cols-2 lg:w-max mt-8" data-reveal>
      <a class="btn btn-ghost" href="<?php echo s20_url('proekty'); ?>">Все проекты <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
      <a class="btn btn-ghost" href="<?php echo esc_html(s20_c('instagram')); ?>" target="_blank" rel="noopener"><svg class="ic " aria-hidden="true"><use href="#i-si-instagram"/></svg> Instagram</a>
    </div>
  </div>
</section>

<section class="section-tight cta-fir">
  <div class="wrap">
    <div class="cta-band" data-reveal>
      <div>
        <div class="eyebrow mb-4"><?php s20_t('home_s07_01'); ?></div>
        <h2 class="h2" style="font-size:clamp(1.7rem,3vw,2.8rem)"><?php s20_t('home_s07_02'); ?></h2>
        <p class="muted mt-4 lead" style="font-size:1.05rem"><?php s20_t('home_s07_03'); ?></p>
      </div>
      <div class="lg:justify-self-end grid gap-3">
        <button type="button" class="btn btn-brass btn-lg" data-quiz-open>Рассчитать бюджет проекта за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        <a href="<?php echo esc_html(s20_c('tel')); ?>" class="btn btn-ghost btn-lg"><svg class="ic " aria-hidden="true"><use href="#i-phone"/></svg> <?php echo esc_html(s20_c('phone')); ?></a>
      </div>
    </div>
  </div>
</section>


<?php s20_set_preselect(''); get_footer();
