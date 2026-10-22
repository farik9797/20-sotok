<?php
/* page-uslugi.php — собрано из макета uslugi.html скриптом tools/wp-port/build_theme.py. */
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
    <div class="eyebrow mb-6" data-hero-seq>Услуги студии</div>
    <h1 class="h1 lg:max-w-[30ch]" data-hero-seq>Инженерное благоустройство участка под ключ</h1>
    <div class="grid gap-8 lg:grid-cols-12 mt-10 items-end">
      <p class="lead muted lg:col-span-7" data-hero-seq>Мощение, газон, автополив и дренаж. Четыре системы проектируются вместе и выполняются одной командой по одному договору — без согласований между подрядчиками с вашей стороны</p>
      <div class="lg:col-span-5 grid gap-3 lg:w-max lg:justify-self-end" data-hero-seq>
        <button type="button" class="btn btn-brass btn-lg w-full" data-quiz-open>Рассчитать бюджет за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        <a href="<?php echo s20_url('proekty'); ?>" class="btn btn-ghost btn-lg w-full">Смотреть проекты</a>
      </div>
    </div>
    <div class="spec-strip hero-specs mt-12" data-hero-seq><div class="spec"><div class="spec-val">4</div><div class="spec-lbl">инженерные системы в одном договоре</div></div><div class="spec"><div class="spec-val">300<b>+</b></div><div class="spec-lbl">благоустроенных дворов в Минске и районе</div></div><div class="spec"><div class="spec-val">11<b>+</b></div><div class="spec-lbl">лет ландшафтного строительства под Минском</div></div><div class="spec"><div class="spec-val">2<b>+</b> года</div><div class="spec-lbl">официальной гарантии по договору</div></div></div>
  </div>
</section>

<!-- Ключевые показатели -->
<section class="specs" aria-label="Ключевые показатели">
  <div class="wrap">
    <div class="spec-strip" data-reveal="stagger"><div class="spec"><div class="spec-val">4</div><div class="spec-lbl">инженерные системы в одном договоре</div></div><div class="spec"><div class="spec-val">300<b>+</b></div><div class="spec-lbl">благоустроенных дворов в Минске и районе</div></div><div class="spec"><div class="spec-val">11<b>+</b></div><div class="spec-lbl">лет ландшафтного строительства под Минском</div></div><div class="spec"><div class="spec-val">2<b>+</b> года</div><div class="spec-lbl">официальной гарантии по договору</div></div></div>
  </div>
</section>

<!-- 01 · Направления -->
<section class="section light light-2" id="napravleniya">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">01</span><span class="eyebrow">Направления работ</span></div>
        <h2 class="h2">Четыре инженерные системы — одна команда</h2>
      </div>
      <p class="lead muted">Каждое направление работает как отдельная услуга и как часть комплекса. Выберите систему, чтобы посмотреть состав работ, схемы и сроки.</p>
    </div>
    <div class="grid md:grid-cols-2 gap-5 lg:gap-7" data-reveal="stagger">
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

<!-- 02 · Комплекс под ключ -->
<section class="section sheet has-bg" id="kompleks">
  <img class="sec-bg" src="<?php echo S20_A; ?>img/real/mramor-1.webp" alt="" aria-hidden="true" loading="lazy">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">02</span><span class="eyebrow">Комплекс под ключ</span></div><h2 class="h2">Что входит в благоустройство под ключ</h2></div>
      <p class="lead muted">Порядок работ важнее их количества: то, что прячется под плитку и газон, делается один раз и переделывается только со вскрытием.</p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-10 hairline-b swipe" data-reveal="stagger"><div class="incl"><div class="num">01</div><div><h3 class="h4">Выемка грунта и планировка</h3><p>Спецтехника, вывоз грунта, разбивка по проекту. Все отметки задаём цифровым лазерным нивелиром.</p></div></div><div class="incl"><div class="num">02</div><div><h3 class="h4">Дренаж и ливнёвка</h3><p>Воду уводим с участка до того, как уложена плитка и раскатан газон. Иначе переделка вскрывает и то, и другое.</p></div></div><div class="incl"><div class="num">03</div><div><h3 class="h4">Основание и мощение</h3><p>Щебень послойно с уплотнением, геотекстиль, бордюры на жёстком бетонном замке, плитка по раскладке из проекта.</p></div></div><div class="incl"><div class="num">04</div><div><h3 class="h4">Автополив и освещение</h3><p>Гильзы под дорожками и трассы закладываем заранее, полив и свет идут в одной траншее до укладки газона.</p></div></div><div class="incl"><div class="num">05</div><div><h3 class="h4">Газон и озеленение</h3><p>Рулонный газон на подготовленном основании с сеткой от кротов, посадки, живые изгороди, мульчирование.</p></div></div><div class="incl"><div class="num">06</div><div><h3 class="h4">Сдача и сервис</h3><p>Принимаем объект вместе с вами по нивелиру и проекту. Гарантия от 2 лет, подготовка полива к зиме.</p></div></div></div>
  </div>
</section>

<!-- 03 · Один подрядчик -->
<section class="section light has-bg" id="odin-podryadchik">
  <img class="sec-bg" src="<?php echo S20_A; ?>img/real/yuhnovka-4.webp" alt="" aria-hidden="true" loading="lazy">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div><div class="section-index"><span class="num">03</span><span class="eyebrow">Один подрядчик</span></div><h2 class="h2">Комплексом — дешевле, чем четырьмя подрядчиками</h2></div>
      <p class="lead muted">Разница не в цене отдельной работы, а в переделках и простоях на стыках между подрядчиками.</p>
    </div>
    <div data-reveal><div class="overflow-x-auto"><table class="cmp"><thead><tr><th></th><th>Комплекс одной командой</th><th>Четыре подрядчика</th></tr></thead><tbody>
<tr><td>Ответственность</td><td class="win" data-th="Комплекс одной командой">Один договор и один ответственный за весь результат</td><td data-th="Четыре подрядчика">Каждый подрядчик отвечает только за свой этап</td></tr>
<tr><td>Очерёдность работ</td><td class="win" data-th="Комплекс одной командой">Дренаж и трассы полива закладываются до мощения и газона</td><td data-th="Четыре подрядчика">Вскрытая плитка и разрытый газон под новые трассы</td></tr>
<tr><td>Смета</td><td class="win" data-th="Комплекс одной командой">Фиксируется в договоре целиком, вместе со смежными работами</td><td data-th="Четыре подрядчика">Растёт с каждым новым подрядчиком и переделкой</td></tr>
<tr><td>Сроки</td><td class="win" data-th="Комплекс одной командой">Один график, бригады сменяют друг друга без простоев</td><td data-th="Четыре подрядчика">Ожидание, пока освободится следующая бригада</td></tr>
<tr><td>Гарантия</td><td class="win" data-th="Комплекс одной командой">От 2 лет на весь комплекс работ</td><td data-th="Четыре подрядчика">Споры, чей именно этап стал причиной проблемы</td></tr>
</tbody></table></div></div>
  </div>
</section>

<!-- 04 · Как проходит работа -->
<section class="section sheet has-bg" id="process">
  <img class="sec-bg" src="<?php echo S20_A; ?>img/real/shitomirichi-1.webp" alt="" aria-hidden="true" loading="lazy">
  <div class="wrap">
    <div class="grid gap-12 lg:grid-cols-12">
      <div class="lg:col-span-4" data-reveal>
        <div class="lg:sticky lg:top-28">
          <div class="section-index"><span class="num">04</span><span class="eyebrow">Как проходит работа</span></div>
          <h2 class="h2">От расчёта до гарантии — без вашего участия в стройке</h2>
          <p class="muted mt-6">Пять шагов, на каждом из которых у вас есть цифры, документ или видеоотчёт.</p>
          <button type="button" class="btn btn-brass mt-8" data-quiz-open>Начать с расчёта <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        </div>
      </div>
      <div class="lg:col-span-8 steps"><span class="step-line" aria-hidden="true"></span><div class="hairline-b" data-reveal="stagger">
<div class="step">
  <div class="num">01</div>
  <div><h3 class="h3">Квиз за 1 минуту</h3><p>Три вопроса — и мы готовим предварительный расчёт под ваши параметры, а также подбираем примеры похожих объектов. Отправляем в Telegram или Viber.</p></div>
</div>
<div class="step">
  <div class="num">02</div>
  <div><h3 class="h3">Выезд инженера и съёмка участка</h3><p>Выезд инженера и съёмка участка бесплатно при заказе комплекса работ. Выезжаем на объект с лазерным нивелиром, оцениваем высоты, подъездные пути и намечаем фронт работ.</p></div>
</div>
<div class="step">
  <div class="num">03</div>
  <div><h3 class="h3">Проект и фиксированная смета</h3><p>Схемы пирогов основания, план полива без слепых зон, схема дренажа. Смета фиксируется в договоре вместе с гарантией от 2 лет.</p></div>
</div>
<div class="step">
  <div class="num">04</div>
  <div><h3 class="h3">Работы одной командой</h3><p>Постоянные бригады, своя техника. Все смежные процессы ведёт одна команда, вы получаете еженедельные видеоотчёты в Telegram.</p></div>
</div>
<div class="step">
  <div class="num">05</div>
  <div><h3 class="h3">Сдача и гарантия</h3><p>Принимаем объект вместе с вами по нивелиру и проекту. Официальная гарантия от 2 лет, сервис полива перед зимой.</p></div>
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
        <div class="eyebrow mb-4">Предварительный расчёт</div>
        <h2 class="h2" style="font-size:clamp(1.7rem,3vw,2.8rem)">Хотите такой же результат на своём участке?</h2>
        <p class="muted mt-4 lead" style="font-size:1.05rem">Начните с расчёта: три вопроса — и мы подберём похожие объекты из портфолио и подготовим предварительную смету.</p>
      </div>
      <div class="lg:justify-self-end grid gap-3">
        <button type="button" class="btn btn-brass btn-lg" data-quiz-open>Рассчитать бюджет проекта за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        <a href="tel:+375445173050" class="btn btn-ghost btn-lg"><svg class="ic " aria-hidden="true"><use href="#i-phone"/></svg> +375 (44) 517-30-50</a>
      </div>
    </div>
  </div>
</section>


<?php s20_set_preselect(''); get_footer();
