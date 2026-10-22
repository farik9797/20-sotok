<?php
/*
Template Name: Проекты
page-proekty.php — собрано из макета proekty.html скриптом tools/wp-port/build_theme.py.
*/
get_header();
?>

<section class="section sheet" style="padding-top:160px">
  <div class="wrap">
    <div class="section-head wide" data-reveal>
      <div>
        <div class="eyebrow mb-5"><?php s20_t('proekty_s01_01'); ?></div>
        <h1 class="h1" style="font-size:clamp(2.4rem,4.8vw,4.6rem)"><?php s20_t('proekty_s01_02'); ?></h1>
      </div>
      <p class="lead muted lg:pb-2"><?php s20_t('proekty_s01_03'); ?></p>
    </div>
    <div class="filter" data-reveal><button type="button" data-filter="all" class=is-active>Все</button><button type="button" data-filter="paving">Мощение</button><button type="button" data-filter="lawn">Газон</button><button type="button" data-filter="irrigation">Полив</button><button type="button" data-filter="drainage">Дренаж</button><button type="button" data-filter="lighting">Освещение</button></div>
  </div>
</section>

<!-- избранный кейс -->
<section class="section-tight" id="mramor">
  <div class="wrap">
    <article class="case" style="padding:clamp(20px,3vw,40px)" data-tags="paving" data-reveal>
      <div class="grid gap-10 lg:grid-cols-12">
        <div class="lg:col-span-7">
          <div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s02_01', 'src'); ?>" alt="<?php s20_img('proekty_s02_01', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Пошаговая дорожка</span><span>2025</span></div></div>
        </div>
        <div class="lg:col-span-5">
          <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-ruler"/></svg>30 м. п.</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>54 плиты</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2025</span></div>
          <h2 class="h2 mt-4" style="font-size:clamp(1.7rem,2.8vw,2.6rem)"><?php s20_t('proekty_s02_02'); ?></h2>
          <dl class="dl mt-8">
            <div><dt><?php s20_t('proekty_s02_03'); ?></dt><dd><?php s20_t('proekty_s02_04'); ?></dd></div>
            <div><dt><?php s20_t('proekty_s02_05'); ?></dt><dd><?php s20_t('proekty_s02_06'); ?></dd></div>
            <div><dt><?php s20_t('proekty_s02_07'); ?></dt><dd><?php s20_t('proekty_s02_08'); ?></dd></div>
          </dl>
        </div>
      </div>
      <div class="grid gap-10 lg:grid-cols-12 mt-12 pt-10 hairline">
        <div class="lg:col-span-7">
          <div class="eyebrow mb-5"><?php s20_t('proekty_s02_09'); ?></div>
          <ul class="grid gap-4 text-[.98rem]"><li class="flex gap-3"><?php s20_t('proekty_s02_10'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s02_11'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s02_12'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s02_13'); ?></li></ul>
        </div>
        <div class="lg:col-span-5">
          <div class="eyebrow mb-5"><?php s20_t('proekty_s02_14'); ?></div>
          <p class="muted"><?php s20_t('proekty_s02_15'); ?></p>
        </div>
      </div>
      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 mt-10 swipe" data-reveal="stagger">
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s02_16', 'src'); ?>" alt="<?php s20_img('proekty_s02_16', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s02_17', 'src'); ?>" alt="<?php s20_img('proekty_s02_17', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s02_18', 'src'); ?>" alt="<?php s20_img('proekty_s02_18', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s02_19', 'src'); ?>" alt="<?php s20_img('proekty_s02_19', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
      </div>
    </article>
  </div>
</section>
<section class="section-tight" id="shitomirichi">
  <div class="wrap">
    <article class="case" style="padding:clamp(20px,3vw,40px)" data-tags="paving lawn irrigation drainage" data-reveal>
      <div class="grid gap-10 lg:grid-cols-12">
        <div class="lg:col-span-7">
          <div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s03_01', 'src'); ?>" alt="<?php s20_img('proekty_s03_01', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Щитомиричи</span><span>2026</span></div></div>
        </div>
        <div class="lg:col-span-5">
          <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Щитомиричи</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>600 м² газона</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2026</span></div>
          <h2 class="h2 mt-4" style="font-size:clamp(1.7rem,2.8vw,2.6rem)"><?php s20_t('proekty_s03_02'); ?></h2>
          <dl class="dl mt-8">
            <div><dt><?php s20_t('proekty_s03_03'); ?></dt><dd><?php s20_t('proekty_s03_04'); ?></dd></div>
            <div><dt><?php s20_t('proekty_s03_05'); ?></dt><dd><?php s20_t('proekty_s03_06'); ?></dd></div>
            <div><dt><?php s20_t('proekty_s03_07'); ?></dt><dd><?php s20_t('proekty_s03_08'); ?></dd></div>
          </dl>
        </div>
      </div>
      <div class="grid gap-10 lg:grid-cols-12 mt-12 pt-10 hairline">
        <div class="lg:col-span-7">
          <div class="eyebrow mb-5"><?php s20_t('proekty_s03_09'); ?></div>
          <ul class="grid gap-4 text-[.98rem]"><li class="flex gap-3"><?php s20_t('proekty_s03_10'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s03_11'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s03_12'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s03_13'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s03_14'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s03_15'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s03_16'); ?></li></ul>
        </div>
        <div class="lg:col-span-5">
          <div class="eyebrow mb-5"><?php s20_t('proekty_s03_17'); ?></div>
          <p class="muted"><?php s20_t('proekty_s03_18'); ?></p>
        </div>
      </div>
      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 mt-10 swipe" data-reveal="stagger">
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s03_19', 'src'); ?>" alt="<?php s20_img('proekty_s03_19', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s03_20', 'src'); ?>" alt="<?php s20_img('proekty_s03_20', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s03_21', 'src'); ?>" alt="<?php s20_img('proekty_s03_21', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s03_22', 'src'); ?>" alt="<?php s20_img('proekty_s03_22', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
      </div>
    </article>
  </div>
</section>
<section class="section-tight" id="yuhnovka">
  <div class="wrap">
    <article class="case" style="padding:clamp(20px,3vw,40px)" data-tags="paving lawn drainage" data-reveal>
      <div class="grid gap-10 lg:grid-cols-12">
        <div class="lg:col-span-7">
          <div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s04_01', 'src'); ?>" alt="<?php s20_img('proekty_s04_01', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Юхновка</span><span>2024</span></div></div>
        </div>
        <div class="lg:col-span-5">
          <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Юхновка</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>430 м² мощения</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2024</span></div>
          <h2 class="h2 mt-4" style="font-size:clamp(1.7rem,2.8vw,2.6rem)"><?php s20_t('proekty_s04_02'); ?></h2>
          <dl class="dl mt-8">
            <div><dt><?php s20_t('proekty_s04_03'); ?></dt><dd><?php s20_t('proekty_s04_04'); ?></dd></div>
            <div><dt><?php s20_t('proekty_s04_05'); ?></dt><dd><?php s20_t('proekty_s04_06'); ?></dd></div>
            <div><dt><?php s20_t('proekty_s04_07'); ?></dt><dd><?php s20_t('proekty_s04_08'); ?></dd></div>
          </dl>
        </div>
      </div>
      <div class="grid gap-10 lg:grid-cols-12 mt-12 pt-10 hairline">
        <div class="lg:col-span-7">
          <div class="eyebrow mb-5"><?php s20_t('proekty_s04_09'); ?></div>
          <ul class="grid gap-4 text-[.98rem]"><li class="flex gap-3"><?php s20_t('proekty_s04_10'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s04_11'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s04_12'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s04_13'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s04_14'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s04_15'); ?></li></ul>
        </div>
        <div class="lg:col-span-5">
          <div class="eyebrow mb-5"><?php s20_t('proekty_s04_16'); ?></div>
          <p class="muted"><?php s20_t('proekty_s04_17'); ?></p>
        </div>
      </div>
      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 mt-10 swipe" data-reveal="stagger">
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s04_18', 'src'); ?>" alt="<?php s20_img('proekty_s04_18', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s04_19', 'src'); ?>" alt="<?php s20_img('proekty_s04_19', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s04_20', 'src'); ?>" alt="<?php s20_img('proekty_s04_20', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s04_21', 'src'); ?>" alt="<?php s20_img('proekty_s04_21', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s04_22', 'src'); ?>" alt="<?php s20_img('proekty_s04_22', 'alt'); ?>" loading="lazy" data-parallax="5"></div>
<div class="photo" style="aspect-ratio:4/3">
  <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-ploshchadka-gazon.webp" aria-label="Мощёная площадка, дорожка вдоль туй и газон за ней — Юхновка">
    <source src="<?php echo S20_A; ?>video/w-ploshchadka-gazon-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/w-ploshchadka-gazon.mp4" type="video/mp4">
  </video>
</div>
<div class="photo" style="aspect-ratio:4/3">
  <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-otsypka-tui.webp" aria-label="Полоса гравийной отсыпки с туями вдоль кирпичного бортика — Юхновка">
    <source src="<?php echo S20_A; ?>video/w-otsypka-tui-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/w-otsypka-tui.mp4" type="video/mp4">
  </video>
</div>
      </div>
    </article>
  </div>
</section>
<section class="section-tight" id="ratomka">
  <div class="wrap">
    <article class="case" style="padding:clamp(20px,3vw,40px)" data-tags="paving drainage" data-reveal>
      <div class="grid gap-10 lg:grid-cols-12">
        <div class="lg:col-span-7">
          <div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s05_01', 'src'); ?>" alt="<?php s20_img('proekty_s05_01', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Ратомка</span><span>2026</span></div></div>
        </div>
        <div class="lg:col-span-5">
          <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Ратомка</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>400 м² мощения</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2026</span></div>
          <h2 class="h2 mt-4" style="font-size:clamp(1.7rem,2.8vw,2.6rem)"><?php s20_t('proekty_s05_02'); ?></h2>
          <dl class="dl mt-8">
            <div><dt><?php s20_t('proekty_s05_03'); ?></dt><dd><?php s20_t('proekty_s05_04'); ?></dd></div>
            <div><dt><?php s20_t('proekty_s05_05'); ?></dt><dd><?php s20_t('proekty_s05_06'); ?></dd></div>
            <div><dt><?php s20_t('proekty_s05_07'); ?></dt><dd><?php s20_t('proekty_s05_08'); ?></dd></div>
          </dl>
        </div>
      </div>
      <div class="grid gap-10 lg:grid-cols-12 mt-12 pt-10 hairline">
        <div class="lg:col-span-7">
          <div class="eyebrow mb-5"><?php s20_t('proekty_s05_09'); ?></div>
          <ul class="grid gap-4 text-[.98rem]"><li class="flex gap-3"><?php s20_t('proekty_s05_10'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s05_11'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s05_12'); ?></li></ul>
        </div>
        <div class="lg:col-span-5">
          <div class="eyebrow mb-5"><?php s20_t('proekty_s05_13'); ?></div>
          <p class="muted"><?php s20_t('proekty_s05_14'); ?></p>
        </div>
      </div>
      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 mt-10 swipe" data-reveal="stagger">
<div class="photo" style="aspect-ratio:3/4"><img src="<?php s20_img('proekty_s05_15', 'src'); ?>" alt="<?php s20_img('proekty_s05_15', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>До работ</span></div></div>
<div class="photo" style="aspect-ratio:3/4">
  <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-ratomka-moshchenie.webp" aria-label="Укладка плитки «Старый город» на площадке: бригада, поддоны и готовая часть мощения">
    <source src="<?php echo S20_A; ?>video/w-ratomka-moshchenie-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/w-ratomka-moshchenie.mp4" type="video/mp4">
  </video>
  <div class="photo-cap"><span>Мощение площадки</span></div>
</div>
<div class="photo" style="aspect-ratio:3/4">
  <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-ratomka-luk.webp" aria-label="Люк, подрезанный плиткой по кругу без зазоров">
    <source src="<?php echo S20_A; ?>video/w-ratomka-luk-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/w-ratomka-luk.mp4" type="video/mp4">
  </video>
  <div class="photo-cap"><span>Люк подрезан по кругу</span></div>
</div>
      </div>
    </article>
  </div>
</section>

<section class="section-tight" id="skorinichi">
  <div class="wrap">
    <article class="case" style="padding:clamp(20px,3vw,40px)" data-tags="paving lawn" data-reveal>
      <div class="grid gap-10 lg:grid-cols-12">
        <div class="lg:col-span-7">
          <div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s06_01', 'src'); ?>" alt="<?php s20_img('proekty_s06_01', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Скориничи</span><span>2026</span></div></div>
        </div>
        <div class="lg:col-span-5">
          <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Скориничи</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>120 м² мощения</span><span><svg class="ic " aria-hidden="true"><use href="#i-sprout"/></svg>210 м² газона</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2026</span></div>
          <h2 class="h2 mt-4" style="font-size:clamp(1.7rem,2.8vw,2.6rem)"><?php s20_t('proekty_s06_02'); ?></h2>
          <dl class="dl mt-8">
            <div><dt><?php s20_t('proekty_s06_03'); ?></dt><dd><?php s20_t('proekty_s06_04'); ?></dd></div>
            <div><dt><?php s20_t('proekty_s06_05'); ?></dt><dd><?php s20_t('proekty_s06_06'); ?></dd></div>
            <div><dt><?php s20_t('proekty_s06_07'); ?></dt><dd><?php s20_t('proekty_s06_08'); ?></dd></div>
          </dl>
        </div>
      </div>
      <div class="grid gap-10 lg:grid-cols-12 mt-12 pt-10 hairline">
        <div class="lg:col-span-7">
          <div class="eyebrow mb-5"><?php s20_t('proekty_s06_09'); ?></div>
          <ul class="grid gap-4 text-[.98rem]"><li class="flex gap-3"><?php s20_t('proekty_s06_10'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s06_11'); ?></li><li class="flex gap-3"><?php s20_t('proekty_s06_12'); ?></li></ul>
        </div>
        <div class="lg:col-span-5">
          <div class="eyebrow mb-5"><?php s20_t('proekty_s06_13'); ?></div>
          <p class="muted"><?php s20_t('proekty_s06_14'); ?></p>
        </div>
      </div>
      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 mt-10 swipe" data-reveal="stagger">
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s06_15', 'src'); ?>" alt="<?php s20_img('proekty_s06_15', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Площадка под укладку</span></div></div>
<div class="photo" style="aspect-ratio:4/3"><img src="<?php s20_img('proekty_s06_16', 'src'); ?>" alt="<?php s20_img('proekty_s06_16', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Плитка «Старый город»</span></div></div>
      </div>
    </article>
  </div>
</section>

<section class="section-tight" style="padding-bottom:clamp(80px,9vw,150px)">
  <div class="wrap">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 swipe" data-reveal="stagger">
<a class="case" href="<?php echo s20_url('proekty'); ?>#shitomirichi" data-tags="paving lawn irrigation drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('proekty_s07_01', 'src'); ?>" alt="<?php s20_img('proekty_s07_01', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Щитомиричи</span><span>2026</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Щитомиричи</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>600 м² газона</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2026</span></div>
    <h3 class="h3 mt-3"><?php s20_t('proekty_s07_02'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Дренаж</span><span class="tag">Газон</span><span class="tag">Полив</span></div>
  </div>
</a>
<a class="case" href="<?php echo s20_url('proekty'); ?>#mramor" data-tags="paving" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('proekty_s07_03', 'src'); ?>" alt="<?php s20_img('proekty_s07_03', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Пошаговая дорожка</span><span>2025</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-ruler"/></svg>30 м. п.</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>54 плиты</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2025</span></div>
    <h3 class="h3 mt-3"><?php s20_t('proekty_s07_04'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span></div>
  </div>
</a>
<a class="case" href="<?php echo s20_url('proekty'); ?>#skorinichi" data-tags="paving lawn" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('proekty_s07_05', 'src'); ?>" alt="<?php s20_img('proekty_s07_05', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Скориничи</span><span>2026</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Скориничи</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>120 м²</span><span><svg class="ic " aria-hidden="true"><use href="#i-sprout"/></svg>210 м² газона</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2026</span></div>
    <h3 class="h3 mt-3"><?php s20_t('proekty_s07_06'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Газон</span></div>
  </div>
</a>
<a class="case" href="<?php echo s20_url('proekty'); ?>#ratomka" data-tags="paving drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('proekty_s07_07', 'src'); ?>" alt="<?php s20_img('proekty_s07_07', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Ратомка</span><span>2026</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Ратомка</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>400 м²</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2026</span></div>
    <h3 class="h3 mt-3"><?php s20_t('proekty_s07_08'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Ливнёвка</span><span class="tag">Планировка</span></div>
  </div>
</a>
<a class="case" href="<?php echo s20_url('proekty'); ?>#yuhnovka" data-tags="paving lawn drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php s20_img('proekty_s07_09', 'src'); ?>" alt="<?php s20_img('proekty_s07_09', 'alt'); ?>" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Юхновка</span><span>2024</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Юхновка</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>430 м²</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2024</span></div>
    <h3 class="h3 mt-3"><?php s20_t('proekty_s07_10'); ?></h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Газон</span><span class="tag">Ливнёвка</span></div>
  </div>
</a>

    </div>
  </div>
</section>


<!-- Видео с объектов -->
<section class="section light" id="raboty">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <h2 class="h2"><?php s20_t('proekty_s08_01'); ?></h2>
      </div>
      <p class="lead muted"><?php s20_t('proekty_s08_02'); ?></p>
    </div>
    <div class="rail" data-reveal="stagger">
      <div class="photo" style="aspect-ratio:3/4">
        <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-gazon-ulozhen.webp" aria-label="Уложенный рулонный газон у дома">
          <source src="<?php echo S20_A; ?>video/w-gazon-ulozhen-sm.mp4" type="video/mp4" media="(max-width: 767px)">
          <source src="<?php echo S20_A; ?>video/w-gazon-ulozhen.mp4" type="video/mp4">
        </video>
        <div class="photo-cap"><span>01 · Рулонный газон уложен</span></div>
      </div>
      <div class="photo" style="aspect-ratio:3/4">
        <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-dvor-gazon.webp" aria-label="Двор частного дома с газоном и дорожкой после сдачи">
          <source src="<?php echo S20_A; ?>video/w-dvor-gazon-sm.mp4" type="video/mp4" media="(max-width: 767px)">
          <source src="<?php echo S20_A; ?>video/w-dvor-gazon.mp4" type="video/mp4">
        </video>
        <div class="photo-cap"><span>02 · Двор после сдачи</span></div>
      </div>
      <div class="photo" style="aspect-ratio:3/4">
        <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-dorozhka-gazon.webp" aria-label="Дорожка из плитки с гравийной отсыпкой вдоль газона">
          <source src="<?php echo S20_A; ?>video/w-dorozhka-gazon.mp4" type="video/mp4">
        </video>
        <div class="photo-cap"><span>03 · Дорожка в газоне</span></div>
      </div>
      <div class="photo" style="aspect-ratio:3/4">
        <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-moshchenie-dom.webp" aria-label="Мощение широкоформатной плиткой вдоль дома">
          <source src="<?php echo S20_A; ?>video/w-moshchenie-dom-sm.mp4" type="video/mp4" media="(max-width: 767px)">
          <source src="<?php echo S20_A; ?>video/w-moshchenie-dom.mp4" type="video/mp4">
        </video>
        <div class="photo-cap"><span>04 · Мощение у дома</span></div>
      </div>
      <div class="photo" style="aspect-ratio:3/4">
        <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-kladka-bortik.webp" aria-label="Укладка плитки вручную вдоль бетонного бортика">
          <source src="<?php echo S20_A; ?>video/w-kladka-bortik-sm.mp4" type="video/mp4" media="(max-width: 767px)">
          <source src="<?php echo S20_A; ?>video/w-kladka-bortik.mp4" type="video/mp4">
        </video>
        <div class="photo-cap"><span>05 · Укладка плитки</span></div>
      </div>
      <div class="photo" style="aspect-ratio:3/4">
        <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-rezka-plitki.webp" aria-label="Подрезка плитки болгаркой по месту">
          <source src="<?php echo S20_A; ?>video/w-rezka-plitki.mp4" type="video/mp4">
        </video>
        <div class="photo-cap"><span>06 · Подрезка плитки</span></div>
      </div>
      <div class="photo" style="aspect-ratio:3/4">
        <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-demontazh.webp" aria-label="Экскаватор снимает старое покрытие на объекте студии">
          <source src="<?php echo S20_A; ?>video/work-demontazh-sm.mp4" type="video/mp4" media="(max-width: 767px)">
          <source src="<?php echo S20_A; ?>video/work-demontazh.mp4" type="video/mp4">
        </video>
        <div class="photo-cap"><span>07 · Снятие старого покрытия</span></div>
      </div>
      <div class="photo" style="aspect-ratio:3/4">
        <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-gazon-dorozhka.webp" aria-label="Газон с криволинейной дорожкой на участке">
          <source src="<?php echo S20_A; ?>video/w-gazon-dorozhka-sm.mp4" type="video/mp4" media="(max-width: 767px)">
          <source src="<?php echo S20_A; ?>video/w-gazon-dorozhka.mp4" type="video/mp4">
        </video>
        <div class="photo-cap"><span>08 · Газон и дорожка</span></div>
      </div>
      <div class="photo" style="aspect-ratio:3/4">
        <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-poliv-gazon.webp" aria-label="Спринклеры поливают газон">
          <source src="<?php echo S20_A; ?>video/w-poliv-gazon-sm.mp4" type="video/mp4" media="(max-width: 767px)">
          <source src="<?php echo S20_A; ?>video/w-poliv-gazon.mp4" type="video/mp4">
        </video>
        <div class="photo-cap"><span>09 · Автополив в работе</span></div>
      </div>
      <div class="photo" style="aspect-ratio:3/4">
        <video data-clip muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-poliv-dorozhki.webp" aria-label="Полив газона рядом с мощёными дорожками">
          <source src="<?php echo S20_A; ?>video/w-poliv-dorozhki-sm.mp4" type="video/mp4" media="(max-width: 767px)">
          <source src="<?php echo S20_A; ?>video/w-poliv-dorozhki.mp4" type="video/mp4">
        </video>
        <div class="photo-cap"><span>10 · Полив вдоль дорожек</span></div>
      </div>
    </div>

  </div>
</section>

<!-- Портфолио / Instagram -->
<section class="section" id="portfolio">
  <div class="wrap">
    <div class="section-head wide" data-reveal>
      <div>
        <h2 class="h2"><?php s20_t('proekty_s09_01'); ?></h2>
      </div>
      <div class="grid gap-3 sm:grid-cols-2 lg:w-max lg:justify-self-end">
        <a class="btn btn-ghost" href="<?php echo esc_html(s20_c('instagram')); ?>" target="_blank" rel="noopener"><svg class="ic " aria-hidden="true"><use href="#i-si-instagram"/></svg> Открыть Instagram</a>
        <a class="btn btn-ghost" href="<?php echo s20_url('proekty'); ?>">Инженерные кейсы <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
      </div>
    </div>
    <div class="ig swipe swipe-sm" data-reveal="stagger">
<a href="<?php echo esc_html(s20_c('instagram')); ?>reel/C8qnCSRIHxs/" target="_blank" rel="noopener" aria-label="Открыть публикацию в Instagram" data-cursor-label="Instagram">
  <img src="<?php s20_img('proekty_s09_02', 'src'); ?>" alt="<?php s20_img('proekty_s09_02', 'alt'); ?>" width="760" height="760" loading="lazy">
  <span class="ig-ov"><svg class="ic ic-lg" aria-hidden="true"><use href="#i-si-instagram"/></svg></span>
</a>
<a href="<?php echo esc_html(s20_c('instagram')); ?>p/DDJgseyKeA7/" target="_blank" rel="noopener" aria-label="Открыть публикацию в Instagram" data-cursor-label="Instagram">
  <img src="<?php s20_img('proekty_s09_03', 'src'); ?>" alt="<?php s20_img('proekty_s09_03', 'alt'); ?>" width="760" height="760" loading="lazy">
  <span class="ig-ov"><svg class="ic ic-lg" aria-hidden="true"><use href="#i-si-instagram"/></svg></span>
</a>
<a href="<?php echo esc_html(s20_c('instagram')); ?>p/DDJgseyKeA7/" target="_blank" rel="noopener" aria-label="Открыть публикацию в Instagram" data-cursor-label="Instagram">
  <img src="<?php s20_img('proekty_s09_04', 'src'); ?>" alt="<?php s20_img('proekty_s09_04', 'alt'); ?>" width="760" height="760" loading="lazy">
  <span class="ig-ov"><svg class="ic ic-lg" aria-hidden="true"><use href="#i-si-instagram"/></svg></span>
</a>
<a href="<?php echo esc_html(s20_c('instagram')); ?>p/Dc8wVz3Cog3/" target="_blank" rel="noopener" aria-label="Открыть публикацию в Instagram" data-cursor-label="Instagram">
  <img src="<?php s20_img('proekty_s09_05', 'src'); ?>" alt="<?php s20_img('proekty_s09_05', 'alt'); ?>" width="760" height="760" loading="lazy">
  <span class="ig-ov"><svg class="ic ic-lg" aria-hidden="true"><use href="#i-si-instagram"/></svg></span>
</a>
<a href="<?php echo esc_html(s20_c('instagram')); ?>reel/DceKfY5qUES/" target="_blank" rel="noopener" aria-label="Открыть публикацию в Instagram" data-cursor-label="Instagram">
  <img src="<?php s20_img('proekty_s09_06', 'src'); ?>" alt="<?php s20_img('proekty_s09_06', 'alt'); ?>" width="760" height="760" loading="lazy">
  <span class="ig-ov"><svg class="ic ic-lg" aria-hidden="true"><use href="#i-si-instagram"/></svg></span>
</a>
<a href="<?php echo esc_html(s20_c('instagram')); ?>reel/Dc37iA3KOBH/" target="_blank" rel="noopener" aria-label="Открыть публикацию в Instagram" data-cursor-label="Instagram">
  <img src="<?php s20_img('proekty_s09_07', 'src'); ?>" alt="<?php s20_img('proekty_s09_07', 'alt'); ?>" width="760" height="760" loading="lazy">
  <span class="ig-ov"><svg class="ic ic-lg" aria-hidden="true"><use href="#i-si-instagram"/></svg></span>
</a>
    </div>
    <p class="muted mt-4 text-[.85rem]"><?php s20_t('proekty_s09_08'); ?></p>
  </div>
</section>


<?php s20_set_preselect(''); get_footer();
