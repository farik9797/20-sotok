<?php
/*
Template Name: Контакты
page-kontakty.php — собрано из макета kontakty.html скриптом tools/wp-port/build_theme.py.
*/
get_header();
?>

<section class="section sheet" style="padding-top:160px;padding-bottom:clamp(40px,5vw,72px)">
  <div class="wrap">
    <div class="section-head wide" data-reveal>
      <div>
        <div class="eyebrow mb-5"><?php s20_t('kontakty_s01_01'); ?></div>
        <h1 class="h1" style="font-size:clamp(2.4rem,4.8vw,4.6rem)"><?php s20_t('kontakty_s01_02'); ?></h1>
      </div>
      <p class="lead muted lg:pb-2"><?php s20_t('kontakty_s01_03'); ?></p>
    </div>
  </div>
</section>

<section class="section-tight" id="kontakty-info">
  <div class="wrap">
    <div class="grid gap-6 lg:grid-cols-12">
      <div class="grid gap-4 sm:grid-cols-2 lg:col-span-5 lg:grid-cols-1" data-reveal="stagger">
        <a class="eq block" href="<?php echo esc_html(s20_c('tel')); ?>"><div class="eyebrow no-rule"><?php s20_t('kontakty_s02_01'); ?></div><div class="font-display text-2xl font-light tracking-tight mt-4"><?php echo esc_html(s20_c('phone')); ?></div><p><?php s20_t('kontakty_s02_02'); ?></p></a>
        <a class="eq block" href="https://yandex.by/maps/?text=Минск, Козыревская 15" target="_blank" rel="noopener"><div class="eyebrow no-rule"><?php s20_t('kontakty_s02_03'); ?></div><div class="h3 mt-4"><?php echo esc_html(s20_c('office')); ?></div><p><?php s20_t('kontakty_s02_04'); ?></p></a>
        <a class="eq block" href="mailto:<?php echo esc_html(s20_c('email')); ?>"><div class="eyebrow no-rule"><?php s20_t('kontakty_s02_05'); ?></div><div class="h3 mt-4"><?php echo esc_html(s20_c('email')); ?></div><p><?php s20_t('kontakty_s02_06'); ?></p></a>
        <div class="eq"><div class="eyebrow no-rule"><?php s20_t('kontakty_s02_07'); ?></div><div class="grid grid-cols-2 gap-3 mt-4"><a class="msg-btn" href="<?php echo esc_html(s20_c('telegram')); ?>" target="_blank" rel="noopener"><svg class="ic " aria-hidden="true"><use href="#i-si-telegram"/></svg> Telegram</a><a class="msg-btn" href="<?php echo esc_html(s20_c('viber')); ?>"><svg class="ic " aria-hidden="true"><use href="#i-si-viber"/></svg> Viber</a></div><p><?php s20_t('kontakty_s02_08'); ?></p></div>
      </div>
      <div class="lg:col-span-7 overflow-hidden border border-stone-2/15 bg-ink-3" data-reveal>
        <iframe title="Карта: офис студии «20 соток» на ул. Козыревская, 15" src="https://www.openstreetmap.org/export/embed.html?bbox=27.5554%2C53.8633%2C27.5794%2C53.8753&amp;layer=mapnik&amp;marker=53.86929%2C27.56738" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="width:100%;height:100%;min-height:420px;border:0;filter:grayscale(1) invert(.92) contrast(.9)"></iframe>
      </div>
    </div>
  </div>
</section>

<section class="section light" id="vyezd">
  <div class="wrap">
    <div class="grid gap-12 lg:grid-cols-12 items-start">
      <div class="lg:col-span-6" data-reveal>
        <div class="section-index"><span class="num">01</span><span class="eyebrow"><?php s20_t('kontakty_s03_01'); ?></span></div>
        <h2 class="h2"><?php s20_t('kontakty_s03_02'); ?></h2>
        <p class="mt-6 max-w-[60ch]" style="color:var(--muted-dark)"><?php s20_t('kontakty_s03_03'); ?></p>
        <div class="mt-8 flex flex-wrap gap-3"><button type="button" class="btn btn-fir" data-quiz-open>Рассчитать бюджет за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button><a href="<?php echo esc_html(s20_c('tel')); ?>" class="btn btn-ghost-dark"><svg class="ic " aria-hidden="true"><use href="#i-phone"/></svg> Позвонить</a></div>
      </div>
      <div class="lg:col-span-6 lg:pl-8" data-reveal>
        <div class="section-index"><span class="num">02</span><span class="eyebrow"><?php s20_t('kontakty_s03_04'); ?></span></div>
        <dl class="dl" style="--tw-border-opacity:1">
          <div style="border-color:var(--line-dark)"><dt style="color:var(--muted-dark)"><?php s20_t('kontakty_s03_05'); ?></dt><dd><?php s20_t('kontakty_s03_06'); ?></dd></div>
          <div style="border-color:var(--line-dark)"><dt style="color:var(--muted-dark)"><?php s20_t('kontakty_s03_07'); ?></dt><dd><?php s20_t('kontakty_s03_08'); ?></dd></div>
          <div style="border-color:var(--line-dark)"><dt style="color:var(--muted-dark)"><?php s20_t('kontakty_s03_09'); ?></dt><dd><?php s20_t('kontakty_s03_10'); ?></dd></div>
          <div style="border-color:var(--line-dark)"><dt style="color:var(--muted-dark)"><?php s20_t('kontakty_s03_11'); ?></dt><dd><?php s20_t('kontakty_s03_12'); ?></dd></div>
        </dl>
      </div>
    </div>
  </div>
</section>

<section class="section-tight cta-fir">
  <div class="wrap">
    <div class="cta-band" data-reveal>
      <div>
        <div class="eyebrow mb-4"><?php s20_t('kontakty_s04_01'); ?></div>
        <h2 class="h2" style="font-size:clamp(1.7rem,3vw,2.8rem)"><?php s20_t('kontakty_s04_02'); ?></h2>
        <p class="muted mt-4 lead" style="font-size:1.05rem"><?php s20_t('kontakty_s04_03'); ?></p>
      </div>
      <div class="lg:justify-self-end grid gap-3">
        <button type="button" class="btn btn-brass btn-lg" data-quiz-open>Рассчитать бюджет проекта за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        <a href="<?php echo esc_html(s20_c('tel')); ?>" class="btn btn-ghost btn-lg"><svg class="ic " aria-hidden="true"><use href="#i-phone"/></svg> <?php echo esc_html(s20_c('phone')); ?></a>
      </div>
    </div>
  </div>
</section>


<?php s20_set_preselect(''); get_footer();
