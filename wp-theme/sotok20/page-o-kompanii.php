<?php
/*
Template Name: О компании
page-o-kompanii.php — собрано из макета o-kompanii.html скриптом tools/wp-port/build_theme.py.
*/
get_header();
?>

<section class="hero-sub">
  <div class="hero-media">
    <video autoplay muted loop playsinline poster="<?php echo S20_A; ?>img/real/hero-o-kompanii.webp" aria-hidden="true">
      <source src="<?php echo S20_A; ?>video/hero-o-kompanii-sm.mp4" type="video/mp4" media="(max-width: 767px)">
      <source src="<?php echo S20_A; ?>video/hero-o-kompanii.mp4" type="video/mp4">
    </video>
  </div>
  <div class="hero-shade"></div>
  <div class="wrap hero-inner">
    <div class="eyebrow mb-6" data-hero-seq><?php s20_t('o_kompanii_s01_01'); ?></div>
    <h1 class="h1 lg:max-w-[30ch]" data-hero-seq><?php s20_t('o_kompanii_s01_02'); ?></h1>
    <div class="grid gap-8 lg:grid-cols-12 mt-10 items-end">
      <p class="lead muted lg:col-span-7" data-hero-seq><?php s20_t('o_kompanii_s01_03'); ?></p>
      <div class="lg:col-span-5 grid gap-3 lg:w-max lg:justify-self-end" data-hero-seq>
        <button type="button" class="btn btn-brass btn-lg w-full" data-quiz-open>Рассчитать бюджет проекта <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        <a href="<?php echo s20_url('proekty'); ?>" class="btn btn-ghost btn-lg w-full">Смотреть проекты</a>
      </div>
    </div>
    <div class="spec-strip hero-specs mt-12" data-hero-seq>
      <div class="spec"><div class="spec-val"><?php s20_t('o_kompanii_s01_04'); ?></div><div class="spec-lbl"><?php s20_t('o_kompanii_s01_05'); ?></div></div>
      <div class="spec"><div class="spec-val"><?php s20_t('o_kompanii_s01_06'); ?></div><div class="spec-lbl"><?php s20_t('o_kompanii_s01_07'); ?></div></div>
      <div class="spec"><div class="spec-val"><?php s20_t('o_kompanii_s01_08'); ?></div><div class="spec-lbl"><?php s20_t('o_kompanii_s01_09'); ?></div></div>
      <div class="spec"><div class="spec-val"><?php s20_t('o_kompanii_s01_10'); ?></div><div class="spec-lbl"><?php s20_t('o_kompanii_s01_11'); ?></div></div>
    </div>
  </div>
</section>

<!-- Ключевые показатели -->
<section class="specs" aria-label="Ключевые показатели">
  <div class="wrap">
    <div class="spec-strip" data-reveal="stagger">
      <div class="spec"><div class="spec-val"><?php s20_t('o_kompanii_s02_01'); ?></div><div class="spec-lbl"><?php s20_t('o_kompanii_s02_02'); ?></div></div>
      <div class="spec"><div class="spec-val"><?php s20_t('o_kompanii_s02_03'); ?></div><div class="spec-lbl"><?php s20_t('o_kompanii_s02_04'); ?></div></div>
      <div class="spec"><div class="spec-val"><?php s20_t('o_kompanii_s02_05'); ?></div><div class="spec-lbl"><?php s20_t('o_kompanii_s02_06'); ?></div></div>
      <div class="spec"><div class="spec-val"><?php s20_t('o_kompanii_s02_07'); ?></div><div class="spec-lbl"><?php s20_t('o_kompanii_s02_08'); ?></div></div>
    </div>
  </div>
</section>

<section class="section" id="podhod">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">01</span><span class="eyebrow"><?php s20_t('o_kompanii_s03_01'); ?></span></div>
        <h2 class="h2"><?php s20_t('o_kompanii_s03_02'); ?></h2>
      </div>
      <p class="lead muted"><?php s20_t('o_kompanii_s03_03'); ?></p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 hairline-b" data-reveal="stagger">
<article class="feature">
  <div class="num">01</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-scan-line"/></svg>
  <h3 class="h3"><?php s20_t('o_kompanii_s03_04'); ?></h3>
  <p><?php s20_t('o_kompanii_s03_05'); ?></p>
</article>
<article class="feature">
  <div class="num">02</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-video"/></svg>
  <h3 class="h3"><?php s20_t('o_kompanii_s03_06'); ?></h3>
  <p><?php s20_t('o_kompanii_s03_07'); ?></p>
</article>
<article class="feature">
  <div class="num">03</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-file-check-2"/></svg>
  <h3 class="h3"><?php s20_t('o_kompanii_s03_08'); ?></h3>
  <p><?php s20_t('o_kompanii_s03_09'); ?></p>
</article>
<article class="feature">
  <div class="num">04</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-lock"/></svg>
  <h3 class="h3"><?php s20_t('o_kompanii_s03_10'); ?></h3>
  <p><?php s20_t('o_kompanii_s03_11'); ?></p>
</article>
    </div>
  </div>
</section>

<section class="section light" id="rukovoditel">
  <div class="wrap">
    <div data-reveal>
      <div class="section-index"><span class="num">02</span><span class="eyebrow"><?php s20_t('o_kompanii_s04_01'); ?></span></div>
      <h2 class="h2 max-w-none"><?php s20_t('o_kompanii_s04_02'); ?></h2>
      <p class="lead mt-6 max-w-none" style="color:var(--muted-dark)"><?php s20_t('o_kompanii_s04_03'); ?></p>
    </div>
    <div class="grid gap-10 lg:grid-cols-5 mt-10 lg:mt-14 items-start">
      <div class="lg:col-span-2" data-reveal>
        <div class="photo" style="aspect-ratio:1/1">
          <img src="<?php s20_img('o_kompanii_s04_04', 'src'); ?>" alt="<?php s20_img('o_kompanii_s04_04', 'alt'); ?>" loading="lazy" width="1342" height="2000" data-parallax="5" style="object-position:center top">
          <div class="photo-cap"><span>Евгений Игоревич Денисов</span><span>Руководитель компании</span></div>
        </div>
      </div>
      <div class="lg:col-span-3" data-reveal>
        <div class="prose max-w-none" style="font-size:1.06rem">
          <p><?php s20_t('o_kompanii_s04_05'); ?></p>
          <p><?php s20_t('o_kompanii_s04_06'); ?></p>
          <p><?php s20_t('o_kompanii_s04_07'); ?></p>
        </div>
        <div class="mt-8 flex items-center gap-5">
          <span class="num monogram">Е.Д.</span>
          <div class="text-[.95rem]" style="color:var(--muted-dark)">Аттестованный главный инженер ландшафтного строительства</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section sheet" id="obekty">
  <div class="wrap">
    <div class="section-head wide" data-reveal>
      <div>
        <div class="section-index"><span class="num">03</span><span class="eyebrow"><?php s20_t('o_kompanii_s05_01'); ?></span></div>
        <h2 class="h2"><?php s20_t('o_kompanii_s05_02'); ?></h2>
      </div>
      <div class="grid gap-3 sm:grid-cols-2 lg:w-max lg:justify-self-end">
        <a class="btn btn-ghost" href="<?php echo s20_url('proekty'); ?>">Инженерные кейсы <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <a class="btn btn-ghost" href="<?php echo esc_html(s20_c('instagram')); ?>" target="_blank" rel="noopener"><svg class="ic " aria-hidden="true"><use href="#i-si-instagram"/></svg> Instagram</a>
      </div>
    </div>
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 swipe" data-reveal="stagger">
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php s20_img('o_kompanii_s05_03', 'src'); ?>" alt="<?php s20_img('o_kompanii_s05_03', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php s20_img('o_kompanii_s05_04', 'src'); ?>" alt="<?php s20_img('o_kompanii_s05_04', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php s20_img('o_kompanii_s05_05', 'src'); ?>" alt="<?php s20_img('o_kompanii_s05_05', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php s20_img('o_kompanii_s05_06', 'src'); ?>" alt="<?php s20_img('o_kompanii_s05_06', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php s20_img('o_kompanii_s05_07', 'src'); ?>" alt="<?php s20_img('o_kompanii_s05_07', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php s20_img('o_kompanii_s05_08', 'src'); ?>" alt="<?php s20_img('o_kompanii_s05_08', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php s20_img('o_kompanii_s05_09', 'src'); ?>" alt="<?php s20_img('o_kompanii_s05_09', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php s20_img('o_kompanii_s05_10', 'src'); ?>" alt="<?php s20_img('o_kompanii_s05_10', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php s20_img('o_kompanii_s05_11', 'src'); ?>" alt="<?php s20_img('o_kompanii_s05_11', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php s20_img('o_kompanii_s05_12', 'src'); ?>" alt="<?php s20_img('o_kompanii_s05_12', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php s20_img('o_kompanii_s05_13', 'src'); ?>" alt="<?php s20_img('o_kompanii_s05_13', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php s20_img('o_kompanii_s05_14', 'src'); ?>" alt="<?php s20_img('o_kompanii_s05_14', 'alt'); ?>" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
    </div>
  </div>
</section>

<section class="section light light-2" id="struktura">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">04</span><span class="eyebrow"><?php s20_t('o_kompanii_s06_01'); ?></span></div>
        <h2 class="h2"><?php s20_t('o_kompanii_s06_02'); ?></h2>
      </div>
      <p class="lead muted"><?php s20_t('o_kompanii_s06_03'); ?></p>
    </div>
    <div class="grid gap-4 md:grid-cols-3" data-reveal="stagger">
      <div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-badge-check"/></svg><h3 class="h4 mt-5"><?php s20_t('o_kompanii_s06_04'); ?></h3><p><?php s20_t('o_kompanii_s06_05'); ?></p></div>
      <div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-wrench"/></svg><h3 class="h4 mt-5"><?php s20_t('o_kompanii_s06_06'); ?></h3><p><?php s20_t('o_kompanii_s06_07'); ?></p></div>
      <div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-scan-line"/></svg><h3 class="h4 mt-5"><?php s20_t('o_kompanii_s06_08'); ?></h3><p><?php s20_t('o_kompanii_s06_09'); ?></p></div>
    </div>
    <div class="mt-10 flex flex-col gap-4 note-box p-6 md:flex-row md:items-center md:justify-between md:p-8" data-reveal>
      <p class="muted max-w-[70ch]"><?php s20_t('o_kompanii_s06_10'); ?></p>
      <button type="button" class="btn btn-brass" data-quiz-open>Начать с расчёта <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
    </div>
  </div>
</section>

<section class="section sheet" id="geografiya">
  <div class="wrap">
    <div class="grid gap-12 lg:grid-cols-12">
      <div class="lg:col-span-5" data-reveal>
        <div class="lg:sticky lg:top-28">
          <div class="section-index"><span class="num">05</span><span class="eyebrow"><?php s20_t('o_kompanii_s07_01'); ?></span></div>
          <h2 class="h2"><?php s20_t('o_kompanii_s07_02'); ?></h2>
          <p class="muted mt-6"><?php s20_t('o_kompanii_s07_03'); ?></p>
          <a href="<?php echo s20_url('kontakty'); ?>" class="btn btn-ghost mt-8"><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg> Контакты и офис</a>
        </div>
      </div>
      <div class="lg:col-span-7 hairline-b" data-reveal="stagger">
<div class="place-row"><div class="num">01</div><h3 class="h3"><?php s20_t('o_kompanii_s07_04'); ?></h3></div>
<div class="place-row"><div class="num">02</div><h3 class="h3"><?php s20_t('o_kompanii_s07_05'); ?></h3></div>
      </div>
    </div>
  </div>
</section>

<section class="section light light-2" id="process">
  <div class="wrap">
    <div class="grid gap-12 lg:grid-cols-12">
      <div class="lg:col-span-4" data-reveal>
        <div class="lg:sticky lg:top-28">
          <div class="section-index"><span class="num">06</span><span class="eyebrow"><?php s20_t('o_kompanii_s08_01'); ?></span></div>
          <h2 class="h2"><?php s20_t('o_kompanii_s08_02'); ?></h2>
          <p class="muted mt-6"><?php s20_t('o_kompanii_s08_03'); ?></p>
          <button type="button" class="btn btn-brass mt-8" data-quiz-open>Начать с расчёта <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        </div>
      </div>
      <div class="lg:col-span-8 steps"><span class="step-line" aria-hidden="true"></span><div class="hairline-b" data-reveal="stagger">
<div class="step">
  <div class="num">01</div>
  <div><h3 class="h3"><?php s20_t('o_kompanii_s08_04'); ?></h3><p><?php s20_t('o_kompanii_s08_05'); ?></p></div>
</div>
<div class="step">
  <div class="num">02</div>
  <div><h3 class="h3"><?php s20_t('o_kompanii_s08_06'); ?></h3><p><?php s20_t('o_kompanii_s08_07'); ?></p></div>
</div>
<div class="step">
  <div class="num">03</div>
  <div><h3 class="h3"><?php s20_t('o_kompanii_s08_08'); ?></h3><p><?php s20_t('o_kompanii_s08_09'); ?></p></div>
</div>
<div class="step">
  <div class="num">04</div>
  <div><h3 class="h3"><?php s20_t('o_kompanii_s08_10'); ?></h3><p><?php s20_t('o_kompanii_s08_11'); ?></p></div>
</div>
<div class="step">
  <div class="num">05</div>
  <div><h3 class="h3"><?php s20_t('o_kompanii_s08_12'); ?></h3><p><?php s20_t('o_kompanii_s08_13'); ?></p></div>
</div>
      </div>
      </div>
    </div>
  </div>
</section>




<!-- 07 · Отзывы -->
<section class="section" id="otzyvy">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">07</span><span class="eyebrow"><?php s20_t('o_kompanii_s09_01'); ?></span></div>
        <h2 class="h2"><?php s20_t('o_kompanii_s09_02'); ?></h2>
      </div>
      <p class="lead muted"><?php s20_t('o_kompanii_s09_03'); ?></p>
    </div>
    <div class="rail" data-reveal="stagger">
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p><?php s20_t('o_kompanii_s09_04'); ?></p>
  <footer><span class="name">Максим</span><span class="work">Отмостка вокруг дома</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p><?php s20_t('o_kompanii_s09_05'); ?></p>
  <footer><span class="name">Алексей</span><span class="work">Укладка тротуарной плитки с устройством отмостки</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p><?php s20_t('o_kompanii_s09_06'); ?></p>
  <footer><span class="name">Игорь</span><span class="work">Укладка тротуарной плитки</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p><?php s20_t('o_kompanii_s09_07'); ?></p>
  <footer><span class="name">Руслан</span><span class="work">Мощение под парковку, 140 м²</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p><?php s20_t('o_kompanii_s09_08'); ?></p>
  <footer><span class="name">Дмитрий</span><span class="work">Благоустройство в товариществе собственников</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p><?php s20_t('o_kompanii_s09_09'); ?></p>
  <footer><span class="name">Ирина</span><span class="work">Укладка тротуарной плитки</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p><?php s20_t('o_kompanii_s09_10'); ?></p>
  <footer><span class="name">Наталья</span><span class="work">Устройство лестницы</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p><?php s20_t('o_kompanii_s09_11'); ?></p>
  <footer><span class="name">Павел</span><span class="work">Укладка тротуарной плитки, 200 м²</span></footer>
</article>
    </div>
  </div>
</section>


<section class="section-tight cta-fir">
  <div class="wrap">
    <div class="cta-band" data-reveal>
      <div>
        <div class="eyebrow mb-4"><?php s20_t('o_kompanii_s10_01'); ?></div>
        <h2 class="h2" style="font-size:clamp(1.7rem,3vw,2.8rem)"><?php s20_t('o_kompanii_s10_02'); ?></h2>
        <p class="muted mt-4 lead" style="font-size:1.05rem"><?php s20_t('o_kompanii_s10_03'); ?></p>
      </div>
      <div class="lg:justify-self-end grid gap-3">
        <button type="button" class="btn btn-brass btn-lg" data-quiz-open>Рассчитать бюджет проекта за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        <a href="<?php echo esc_html(s20_c('tel')); ?>" class="btn btn-ghost btn-lg"><svg class="ic " aria-hidden="true"><use href="#i-phone"/></svg> <?php echo esc_html(s20_c('phone')); ?></a>
      </div>
    </div>
  </div>
</section>


<?php s20_set_preselect(''); get_footer();
