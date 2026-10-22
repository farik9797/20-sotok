<?php
/*
Template Name: Полезно знать
page-blog.php — собрано из макета blog.html скриптом tools/wp-port/build_theme.py.
*/
get_header();
?>

<section class="section sheet" style="padding-top:160px;padding-bottom:0">
  <div class="wrap">
    <div class="section-head wide" data-reveal>
      <div>
        <div class="eyebrow mb-5"><?php s20_t('blog_s01_01'); ?></div>
        <h1 class="h1" style="font-size:clamp(2.4rem,4.8vw,4.6rem)"><?php s20_t('blog_s01_02'); ?></h1>
      </div>
      <p class="lead muted lg:pb-2"><?php s20_t('blog_s01_03'); ?></p>
    </div>
    <div class="flex flex-wrap gap-2 pb-12" data-reveal><span class="chip" style="cursor:default">Все статьи</span><span class="chip" style="cursor:default">Инженерия</span><span class="chip" style="cursor:default">Мощение</span><span class="chip" style="cursor:default">Газон</span><span class="chip" style="cursor:default">Полив</span><span class="chip" style="cursor:default">Дренаж</span><span class="chip" style="cursor:default">Уход</span></div>
  </div>
</section>
<section class="section-tight" style="padding-top:0;padding-bottom:clamp(80px,9vw,150px)">
  <div class="wrap">
    <div class="hairline-b" data-reveal="stagger">
<a class="post" href="#">
  <div class="photo"><img src="<?php s20_img('blog_s02_01', 'src'); ?>" alt="<?php s20_img('blog_s02_01', 'alt'); ?>" loading="lazy"></div>
  <div><div class="post-meta"><span>Инженерия</span><span><svg class="ic " aria-hidden="true"><use href="#i-clock"/></svg> 8 мин</span></div><h2 class="h3"><?php s20_t('blog_s02_02'); ?></h2><p><?php s20_t('blog_s02_03'); ?></p></div>
  <span class="svc-arrow hidden md:grid"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
</a>
<a class="post" href="#">
  <div class="photo"><img src="<?php s20_img('blog_s02_04', 'src'); ?>" alt="<?php s20_img('blog_s02_04', 'alt'); ?>" loading="lazy"></div>
  <div><div class="post-meta"><span>Уход</span><span><svg class="ic " aria-hidden="true"><use href="#i-clock"/></svg> 6 мин</span></div><h2 class="h3"><?php s20_t('blog_s02_05'); ?></h2><p><?php s20_t('blog_s02_06'); ?></p></div>
  <span class="svc-arrow hidden md:grid"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
</a>
<a class="post" href="#">
  <div class="photo"><img src="<?php s20_img('blog_s02_07', 'src'); ?>" alt="<?php s20_img('blog_s02_07', 'alt'); ?>" loading="lazy"></div>
  <div><div class="post-meta"><span>Газон</span><span><svg class="ic " aria-hidden="true"><use href="#i-clock"/></svg> 7 мин</span></div><h2 class="h3"><?php s20_t('blog_s02_08'); ?></h2><p><?php s20_t('blog_s02_09'); ?></p></div>
  <span class="svc-arrow hidden md:grid"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
</a>
<a class="post" href="#">
  <div class="photo"><img src="<?php s20_img('blog_s02_10', 'src'); ?>" alt="<?php s20_img('blog_s02_10', 'alt'); ?>" loading="lazy"></div>
  <div><div class="post-meta"><span>Полив</span><span><svg class="ic " aria-hidden="true"><use href="#i-clock"/></svg> 5 мин</span></div><h2 class="h3"><?php s20_t('blog_s02_11'); ?></h2><p><?php s20_t('blog_s02_12'); ?></p></div>
  <span class="svc-arrow hidden md:grid"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
</a>
<a class="post" href="#">
  <div class="photo"><img src="<?php s20_img('blog_s02_13', 'src'); ?>" alt="<?php s20_img('blog_s02_13', 'alt'); ?>" loading="lazy"></div>
  <div><div class="post-meta"><span>Дренаж</span><span><svg class="ic " aria-hidden="true"><use href="#i-clock"/></svg> 9 мин</span></div><h2 class="h3"><?php s20_t('blog_s02_14'); ?></h2><p><?php s20_t('blog_s02_15'); ?></p></div>
  <span class="svc-arrow hidden md:grid"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
</a>
<a class="post" href="#">
  <div class="photo"><img src="<?php s20_img('blog_s02_16', 'src'); ?>" alt="<?php s20_img('blog_s02_16', 'alt'); ?>" loading="lazy"></div>
  <div><div class="post-meta"><span>Мощение</span><span><svg class="ic " aria-hidden="true"><use href="#i-clock"/></svg> 6 мин</span></div><h2 class="h3"><?php s20_t('blog_s02_17'); ?></h2><p><?php s20_t('blog_s02_18'); ?></p></div>
  <span class="svc-arrow hidden md:grid"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
</a></div>
  </div>
</section>

<section class="section-tight cta-fir">
  <div class="wrap">
    <div class="cta-band" data-reveal>
      <div>
        <div class="eyebrow mb-4"><?php s20_t('blog_s03_01'); ?></div>
        <h2 class="h2" style="font-size:clamp(1.7rem,3vw,2.8rem)"><?php s20_t('blog_s03_02'); ?></h2>
        <p class="muted mt-4 lead" style="font-size:1.05rem"><?php s20_t('blog_s03_03'); ?></p>
      </div>
      <div class="lg:justify-self-end grid gap-3">
        <button type="button" class="btn btn-brass btn-lg" data-quiz-open>Рассчитать бюджет проекта за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        <a href="<?php echo esc_html(s20_c('tel')); ?>" class="btn btn-ghost btn-lg"><svg class="ic " aria-hidden="true"><use href="#i-phone"/></svg> <?php echo esc_html(s20_c('phone')); ?></a>
      </div>
    </div>
  </div>
</section>


<?php s20_set_preselect(''); get_footer();
