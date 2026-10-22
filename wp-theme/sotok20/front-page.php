<?php
/* front-page.php — собрано из макета index.html скриптом tools/wp-port/build_theme.py. */
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
      <div class="eyebrow mb-6" data-hero-seq>Студия инженерного благоустройства</div>
      <h1 class="h1 lg:max-w-[30ch]" data-hero-seq>Благоустройство придомовых территорий в&nbsp;Минске и районе</h1>
      <div class="grid gap-8 lg:grid-cols-12 mt-8 lg:mt-10 items-end">
        <p class="lead muted lg:col-span-7" data-hero-seq>Создаём безупречные загородные пространства под ключ</p>
        <div class="lg:col-span-5 grid gap-3 lg:w-max lg:justify-self-end" data-hero-seq>
          <button type="button" class="btn btn-brass btn-lg w-full" data-quiz-open>Рассчитать бюджет проекта за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
          <a href="<?php echo s20_url('proekty'); ?>" class="btn btn-ghost btn-lg w-full">Смотреть проекты</a>
        </div>
      </div>
    </div>
    
      <div class="spec-strip hero-specs mt-10 lg:mt-12" data-hero-seq>
      <div class="spec"><div class="spec-val">300<b>+</b></div><div class="spec-lbl">дворов преобразили в Минске и районе — присоединяйтесь к довольным клиентам</div></div><div class="spec"><div class="spec-val">10<b>%</b></div><div class="spec-lbl">скидка на озеленение при заказе укладки тротуарной плитки</div></div><div class="spec"><div class="spec-val">10</div><div class="spec-lbl">дней — среднее время полного цикла благоустройства</div></div><div class="spec"><div class="spec-val">11<b>+</b></div><div class="spec-lbl">лет профессионального ландшафтного строительства под Минском</div></div>
  </div>
  </div>
</section>

<!-- Ключевые показатели -->
<section class="specs" aria-label="Ключевые показатели">
  <div class="wrap">
    <div class="spec-strip" data-reveal="stagger">
      <div class="spec"><div class="spec-val">300<b>+</b></div><div class="spec-lbl">дворов преобразили в Минске и районе — присоединяйтесь к довольным клиентам</div></div><div class="spec"><div class="spec-val">10<b>%</b></div><div class="spec-lbl">скидка на озеленение при заказе укладки тротуарной плитки</div></div><div class="spec"><div class="spec-val">10</div><div class="spec-lbl">дней — среднее время полного цикла благоустройства</div></div><div class="spec"><div class="spec-val">11<b>+</b></div><div class="spec-lbl">лет профессионального ландшафтного строительства под Минском</div></div>
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
  <div class="most-cap"><div class="wrap"><span class="eyebrow">Работа в кадре</span><p>Автополив, газон и мощёные дорожки — готовые объекты студии в Минске и районе</p></div></div>
</section>

<!-- 02 · Преимущества -->
<section class="section sheet" id="preimushchestva">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">02</span><span class="eyebrow">Почему нам доверяют</span></div>
        <h2 class="h2">Почему нам доверяют требовательные заказчики</h2>
      </div>
      <div class="fir-plate"><p class="lead">Наши клиенты — руководители, тимлиды и владельцы бизнеса. Им не нужно думать, где что заказать, и контролировать процесс: это делаем мы — по проекту, по договору, с отчётностью.</p></div>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 hairline-b" data-reveal="stagger">
<article class="feature feature-video">
  <video class="feature-bg" data-clip data-most muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-card-niveliry.webp" aria-hidden="true">
    <source src="<?php echo S20_A; ?>video/card-niveliry-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/card-niveliry.mp4" type="video/mp4">
  </video>
  <div class="num">01</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-scan-line"/></svg>
  <h3 class="h3">Инженерный контроль нивелирами</h3>
  <p>Рельеф, уклоны и высотные отметки проверяем цифровыми лазерными нивелирами, а не «на глаз». Вода уходит туда, куда рассчитано, а плитка не проседает через сезон.</p>
</article>
<article class="feature feature-video">
  <video class="feature-bg" data-clip data-most muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-card-kompleks.webp" aria-hidden="true">
    <source src="<?php echo S20_A; ?>video/card-kompleks-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/card-kompleks.mp4" type="video/mp4">
  </video>
  <div class="num">02</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-file-check-2"/></svg>
  <h3 class="h3">Один договор на весь комплекс</h3>
  <p>Выемка грунта, мощение, газон, полив, дренаж, освещение — одна команда и один ответственный. Ноль согласований между подрядчиками с вашей стороны.</p>
</article>
<article class="feature feature-video">
  <video class="feature-bg" data-clip data-most muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-card-ukladka.webp" aria-hidden="true">
    <source src="<?php echo S20_A; ?>video/card-ukladka-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/card-ukladka.mp4" type="video/mp4">
  </video>
  <div class="num">03</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-video"/></svg>
  <h3 class="h3">Прозрачность 24/7</h3>
  <p>Еженедельные видеоотчёты в Telegram. Вы видите скрытые работы — основание, дренаж, гильзы под полив — до того, как их закроет плитка или газон.</p>
</article>
<article class="feature feature-video">
  <video class="feature-bg" data-clip data-most muted loop playsinline preload="metadata" poster="<?php echo S20_A; ?>img/real/poster-card-dom.webp" aria-hidden="true">
    <source src="<?php echo S20_A; ?>video/card-dom-sm.mp4" type="video/mp4" media="(max-width: 767px)">
    <source src="<?php echo S20_A; ?>video/card-dom.mp4" type="video/mp4">
  </video>
  <div class="num">04</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-lock"/></svg>
  <h3 class="h3">Фиксированная цена</h3>
  <p>Смета зафиксирована в договоре и не растёт в процессе. Гарантия от 2 лет — тоже в договоре, а не на словах.</p>
</article>
    </div>
  </div>
</section>

<!-- 03 · Каталог услуг -->
<section class="section light light-2" id="uslugi">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">03</span><span class="eyebrow">Четыре инженерные системы</span></div>
        <h2 class="h2">Четыре инженерные системы — одна команда</h2>
      </div>
      <p class="lead muted">Выемка грунта спецтехникой, мощение, газон, автополив, дренаж и ливнёвка. Каждая система проектируется с учётом остальных — поэтому мы делаем всё сами.</p>
    </div>
    <div class="grid md:grid-cols-2 gap-5 lg:gap-7 swipe" data-reveal="stagger">
<a class="svc" href="<?php echo s20_url('uslugi/plitka'); ?>" data-cursor-label="Подробнее">
  <div class="svc-media"><img src="<?php echo S20_A; ?>img/svc-paving.jpg" alt="Укладка тротуарной плитки и мощение" loading="lazy" data-parallax="6"></div>
  <span class="svc-tag">01 / Мощение</span>
  <div class="svc-body">
    <div class="num">01</div>
    <div><h3 class="h3">Укладка тротуарной плитки и мощение</h3><p>Широкоформатная плитка и мелкоштучка, радиусная подрезка с точностью до миллиметра, бордюры на жёсткий бетонный замок, пирог основания под парковку.</p></div>
    <span class="svc-arrow"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
  </div>
</a>
<a class="svc svc-fir" href="<?php echo s20_url('uslugi/gazon'); ?>" data-cursor-label="Подробнее">
  <div class="svc-media"><img src="<?php echo S20_A; ?>img/svc-lawn.jpg" alt="Устройство премиальных газонов и озеленение" loading="lazy" data-parallax="6"></div>
  <span class="svc-tag">02 / Газон</span>
  <div class="svc-body">
    <div class="num">02</div>
    <div><h3 class="h3">Устройство премиальных газонов и озеленение</h3><p>Рулонный газон на подготовленном основании с защитной сеткой от кротов. Посадки, живые изгороди, мульчирование.</p></div>
    <span class="svc-arrow"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
  </div>
</a>
<a class="svc" href="<?php echo s20_url('uslugi/poliv'); ?>" data-cursor-label="Подробнее">
  <div class="svc-media"><img src="<?php echo S20_A; ?>img/svc-irrigation.jpg" alt="Автоматический полив и ландшафтное освещение" loading="lazy" data-parallax="6"></div>
  <span class="svc-tag">03 / Полив · Свет</span>
  <div class="svc-body">
    <div class="num">03</div>
    <div><h3 class="h3">Автоматический полив и ландшафтное освещение</h3><p>Проект без слепых зон, оборудование Hunter / Rain Bird, датчики погоды и управление со смартфона. Освещение в одной траншее с поливом.</p></div>
    <span class="svc-arrow"><svg class="ic " aria-hidden="true"><use href="#i-arrow-up-right"/></svg></span>
  </div>
</a>
<a class="svc" href="<?php echo s20_url('uslugi/drenazh'); ?>" data-cursor-label="Подробнее">
  <div class="svc-media"><img src="<?php echo S20_A; ?>img/svc-drainage.jpg" alt="Дренаж участка и ливневая канализация" loading="lazy" data-parallax="6"></div>
  <span class="svc-tag">04 / Дренаж</span>
  <div class="svc-body">
    <div class="num">04</div>
    <div><h3 class="h3">Дренаж участка и ливневая канализация</h3><p>Скрытый дренаж, колодцы с переливом, отвод воды за границы участка. Решения под реальные грунты Минского района.</p></div>
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
        <div class="section-index"><span class="num">04</span><span class="eyebrow">Наши проекты</span></div>
        <h2 class="h2">Что уже построено</h2>
      </div>
      <p class="lead muted">Инженерные кейсы с составом работ, сроками и объёмами. Короткие видео с объектов — в разделе «Проекты».</p>
    </div>
    <div class="grid gap-5 lg:gap-7 md:grid-cols-3 swipe items-stretch" data-reveal>
<a class="case" href="<?php echo s20_url('proekty'); ?>#shitomirichi" data-tags="paving lawn irrigation drainage" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php echo S20_A; ?>img/real/shitomirichi-1.webp" alt="Мощение, дренаж, рулонный газон и автополив — Щитомиричи" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Щитомиричи</span><span>2026</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg>Щитомиричи</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>600 м² газона</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2026</span></div>
    <h3 class="h3 mt-3">Комплекс: мощение, дренаж, газон и автополив</h3>
    <div class="tags"><span class="tag">Мощение</span><span class="tag">Дренаж</span><span class="tag">Газон</span><span class="tag">Полив</span></div>
  </div>
</a>
<a class="case" href="<?php echo s20_url('proekty'); ?>#mramor" data-tags="paving" data-cursor-label="Кейс">
  <div class="photo"><img src="<?php echo S20_A; ?>img/real/mramor-1.webp" alt="Пошаговая дорожка из плит 1000×400 мм и плитка «Мрамор»" loading="lazy" data-parallax="6"><div class="photo-cap"><span>Пошаговая дорожка</span><span>2025</span></div></div>
  <div class="case-body">
    <div class="case-meta"><span><svg class="ic " aria-hidden="true"><use href="#i-ruler"/></svg>30 м. п.</span><span><svg class="ic " aria-hidden="true"><use href="#i-layout-grid"/></svg>54 плиты</span><span><svg class="ic " aria-hidden="true"><use href="#i-calendar"/></svg>2025</span></div>
    <h3 class="h3 mt-3">Пошаговая дорожка из плит 1000×400 мм</h3>
    <div class="tags"><span class="tag">Мощение</span></div>
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
    <div class="grid gap-3 sm:grid-cols-2 lg:w-max mt-8" data-reveal>
      <a class="btn btn-ghost" href="<?php echo s20_url('proekty'); ?>">Все проекты <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
      <a class="btn btn-ghost" href="https://www.instagram.com/20sotok.by/" target="_blank" rel="noopener"><svg class="ic " aria-hidden="true"><use href="#i-si-instagram"/></svg> Instagram</a>
    </div>
  </div>
</section>

<section class="section-tight cta-fir">
  <div class="wrap">
    <div class="cta-band" data-reveal>
      <div>
        <div class="eyebrow mb-4">Предварительный расчёт</div>
        <h2 class="h2" style="font-size:clamp(1.7rem,3vw,2.8rem)">Рассчитайте бюджет вашего участка за 1 минуту</h2>
        <p class="muted mt-4 lead" style="font-size:1.05rem">Три вопроса — и вы получите предварительный расчёт сметы и примеры похожих объектов в Telegram или Viber.</p>
      </div>
      <div class="lg:justify-self-end grid gap-3">
        <button type="button" class="btn btn-brass btn-lg" data-quiz-open>Рассчитать бюджет проекта за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        <a href="tel:+375445173050" class="btn btn-ghost btn-lg"><svg class="ic " aria-hidden="true"><use href="#i-phone"/></svg> +375 (44) 517-30-50</a>
      </div>
    </div>
  </div>
</section>


<?php s20_set_preselect(''); get_footer();
