<?php
/* page-o-kompanii.php — собрано из макета o-kompanii.html скриптом tools/wp-port/build_theme.py. */
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
    <div class="eyebrow mb-6" data-hero-seq>О компании</div>
    <h1 class="h1 lg:max-w-[30ch]" data-hero-seq>Студия инженерного благоустройства «20 соток»</h1>
    <div class="grid gap-8 lg:grid-cols-12 mt-10 items-end">
      <p class="lead muted lg:col-span-7" data-hero-seq>Более 11 лет строим придомовые территории под Минском: постоянные квалифицированные бригады под руководством аттестованного главного инженера, своя техника и профессиональный инструмент. Комплексное благоустройство, ландшафтная инженерия и дорожное строительство премиум-класса</p>
      <div class="lg:col-span-5 grid gap-3 lg:w-max lg:justify-self-end" data-hero-seq>
        <button type="button" class="btn btn-brass btn-lg w-full" data-quiz-open>Рассчитать бюджет проекта <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        <a href="<?php echo s20_url('proekty'); ?>" class="btn btn-ghost btn-lg w-full">Смотреть проекты</a>
      </div>
    </div>
    <div class="spec-strip hero-specs mt-12" data-hero-seq>
      <div class="spec"><div class="spec-val">11<b>+</b></div><div class="spec-lbl">лет профессионального ландшафтного строительства под Минском</div></div>
      <div class="spec"><div class="spec-val">300<b>+</b></div><div class="spec-lbl">благоустроенных дворов в Минске и Минском районе</div></div>
      <div class="spec"><div class="spec-val">1</div><div class="spec-lbl">договор и один ответственный на весь комплекс работ</div></div>
      <div class="spec"><div class="spec-val">2<b>+</b> года</div><div class="spec-lbl">официальной гарантии с зафиксированной сметой</div></div>
    </div>
  </div>
</section>

<!-- Ключевые показатели -->
<section class="specs" aria-label="Ключевые показатели">
  <div class="wrap">
    <div class="spec-strip" data-reveal="stagger">
      <div class="spec"><div class="spec-val">11<b>+</b></div><div class="spec-lbl">лет профессионального ландшафтного строительства под Минском</div></div>
      <div class="spec"><div class="spec-val">300<b>+</b></div><div class="spec-lbl">благоустроенных дворов в Минске и Минском районе</div></div>
      <div class="spec"><div class="spec-val">1</div><div class="spec-lbl">договор и один ответственный на весь комплекс работ</div></div>
      <div class="spec"><div class="spec-val">2<b>+</b> года</div><div class="spec-lbl">официальной гарантии с зафиксированной сметой</div></div>
    </div>
  </div>
</section>

<section class="section" id="podhod">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">01</span><span class="eyebrow">Инженерный подход</span></div>
        <h2 class="h2">Чем мы отличаемся от бригад «положить плитку»</h2>
      </div>
      <p class="lead muted">100% инженерный подход: рельеф проверяем цифровыми лазерными нивелирами, работаем строго по договору с официальной гарантией от 2 лет и сметой, которая не растёт в процессе.</p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 hairline-b" data-reveal="stagger">
<article class="feature">
  <div class="num">01</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-scan-line"/></svg>
  <h3 class="h3">Инженерный контроль нивелирами</h3>
  <p>Рельеф, уклоны и высотные отметки проверяем цифровыми лазерными нивелирами, а не «на глаз». Вода уходит туда, куда рассчитано, а плитка не проседает через сезон.</p>
</article>
<article class="feature">
  <div class="num">02</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-video"/></svg>
  <h3 class="h3">Прозрачность 24/7</h3>
  <p>Еженедельные видеоотчёты в Telegram. Вы видите скрытые работы — основание, дренаж, гильзы под полив — до того, как их закроет плитка или газон.</p>
</article>
<article class="feature">
  <div class="num">03</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-file-check-2"/></svg>
  <h3 class="h3">Один договор на весь комплекс</h3>
  <p>Выемка грунта, мощение, газон, полив, дренаж, освещение — одна команда и один ответственный. Ноль согласований между подрядчиками с вашей стороны.</p>
</article>
<article class="feature">
  <div class="num">04</div>
  <svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-lock"/></svg>
  <h3 class="h3">Фиксированная цена</h3>
  <p>Смета зафиксирована в договоре и не растёт в процессе. Гарантия от 2 лет — тоже в договоре, а не на словах.</p>
</article>
    </div>
  </div>
</section>

<section class="section light" id="rukovoditel">
  <div class="wrap">
    <div data-reveal>
      <div class="section-index"><span class="num">02</span><span class="eyebrow">Авторский контроль</span></div>
      <h2 class="h2 max-w-none">Каждый скрытый этап принимаю лично</h2>
      <p class="lead mt-6 max-w-none" style="color:var(--muted-dark)">Больше 11 лет строю участки под Минском и сам принимаю то, что потом скроется под плиткой и газоном: основание, уклоны дренажа, разводку полива.</p>
    </div>
    <div class="grid gap-10 lg:grid-cols-5 mt-10 lg:mt-14 items-start">
      <div class="lg:col-span-2" data-reveal>
        <div class="photo" style="aspect-ratio:1/1">
          <img src="<?php echo S20_A; ?>img/director.webp" alt="Евгений Игоревич Денисов, руководитель компании «20 соток»" loading="lazy" width="1342" height="2000" data-parallax="5" style="object-position:center top">
          <div class="photo-cap"><span>Евгений Игоревич Денисов</span><span>Руководитель компании</span></div>
        </div>
      </div>
      <div class="lg:col-span-3" data-reveal>
        <div class="prose max-w-none" style="font-size:1.06rem">
          <p>Бригады у нас постоянные, техника и инструмент свои.</p>
          <p>Все смежные процессы ведёт одна команда — контролировать стройку вам не нужно, это моя работа.</p>
          <p>Раз в неделю приходит видеоотчёт в Telegram: там видно то, что через месяц уже не разглядеть.</p>
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
        <div class="section-index"><span class="num">03</span><span class="eyebrow">Объекты</span></div>
        <h2 class="h2">Реальные объекты студии в Минском районе</h2>
      </div>
      <div class="grid gap-3 sm:grid-cols-2 lg:w-max lg:justify-self-end">
        <a class="btn btn-ghost" href="<?php echo s20_url('proekty'); ?>">Инженерные кейсы <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <a class="btn btn-ghost" href="https://www.instagram.com/20sotok.by/" target="_blank" rel="noopener"><svg class="ic " aria-hidden="true"><use href="#i-si-instagram"/></svg> Instagram</a>
      </div>
    </div>
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 swipe" data-reveal="stagger">
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php echo S20_A; ?>img/real/object-1.webp" alt="Объект студии «20 соток» в Минском районе" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php echo S20_A; ?>img/real/object-2.webp" alt="Объект студии «20 соток» в Минском районе" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php echo S20_A; ?>img/real/object-3.webp" alt="Объект студии «20 соток» в Минском районе" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php echo S20_A; ?>img/real/object-12.webp" alt="Двор, мощённый тёмной квадратной плиткой с просыпкой швов" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php echo S20_A; ?>img/real/object-13.webp" alt="Площадка из серой плитки с бордюром вдоль газона" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php echo S20_A; ?>img/real/object-14.webp" alt="Терраса из крупноформатных плит под каменный скол" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php echo S20_A; ?>img/real/object-15.webp" alt="Дорожка и площадка из крупноформатных плит вокруг газона" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php echo S20_A; ?>img/real/object-16.webp" alt="Садовая дорожка из природного камня" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php echo S20_A; ?>img/real/object-17.webp" alt="Подъезд к дому из плитки «Колормикс» вдоль забора" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php echo S20_A; ?>img/real/object-18.webp" alt="Крыльцо и ступени из плитки «Колормикс» у кирпичного дома" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php echo S20_A; ?>img/real/object-19.webp" alt="Парковочная площадка из плитки «Колормикс» перед воротами" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
<a class="photo block" style="aspect-ratio:4/3" href="<?php echo s20_url('proekty'); ?>" data-cursor-label="Проекты"><img src="<?php echo S20_A; ?>img/real/object-20.webp" alt="Мощёный двор из серой плитки зимой" loading="lazy" data-parallax="5"><div class="photo-cap"><span>Объект студии</span><span>Минский район</span></div></a>
    </div>
  </div>
</section>

<section class="section light light-2" id="struktura">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">04</span><span class="eyebrow">Как устроена студия</span></div>
        <h2 class="h2">Одна команда на все смежные процессы</h2>
      </div>
      <p class="lead muted">Заказчику не нужно думать, где что заказать, и контролировать процесс: выемку грунта, мощение, газон, полив, дренаж и освещение ведёт одна команда под единым руководством.</p>
    </div>
    <div class="grid gap-4 md:grid-cols-3" data-reveal="stagger">
      <div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-badge-check"/></svg><h3 class="h4 mt-5">Постоянные бригады</h3><p>Квалифицированные бригады работают с нами годами и знают наши технологические карты. Никаких случайных субподрядчиков на скрытых этапах.</p></div>
      <div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-wrench"/></svg><h3 class="h4 mt-5">Техника и инструмент</h3><p>Своя спецтехника для выемки грунта, виброплиты, станки для радиусной подрезки с водяным охлаждением, цифровые лазерные нивелиры.</p></div>
      <div class="eq"><svg class="ic ic-lg ic-brass" aria-hidden="true"><use href="#i-scan-line"/></svg><h3 class="h4 mt-5">Авторский контроль</h3><p>Каждый скрытый этап принимает лично Евгений Денисов, аттестованный главный инженер. Раз в неделю вы получаете видеоотчёт в Telegram.</p></div>
    </div>
    <div class="mt-10 flex flex-col gap-4 note-box p-6 md:flex-row md:items-center md:justify-between md:p-8" data-reveal>
      <p class="muted max-w-[70ch]"><svg class="ic " aria-hidden="true"><use href="#i-badge-check"/></svg> Выезд инженера на объект с геодезической съёмкой — бесплатно при заказе комплекса работ.</p>
      <button type="button" class="btn btn-brass" data-quiz-open>Начать с расчёта <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
    </div>
  </div>
</section>

<section class="section sheet" id="geografiya">
  <div class="wrap">
    <div class="grid gap-12 lg:grid-cols-12">
      <div class="lg:col-span-5" data-reveal>
        <div class="lg:sticky lg:top-28">
          <div class="section-index"><span class="num">05</span><span class="eyebrow">География</span></div>
          <h2 class="h2">Минск и<br class="sm-only"> Минский район</h2>
          <p class="muted mt-6">Преимущественно престижные пригородные коттеджные посёлки. Знаем местные грунты, уровень воды и подъезды техники — проект начинается со съёмки участка нивелиром.</p>
          <a href="<?php echo s20_url('kontakty'); ?>" class="btn btn-ghost mt-8"><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg> Контакты и офис</a>
        </div>
      </div>
      <div class="lg:col-span-7 hairline-b" data-reveal="stagger">
<div class="place-row"><div class="num">01</div><h3 class="h3">Минск</h3></div>
<div class="place-row"><div class="num">02</div><h3 class="h3">Минский район</h3></div>
      </div>
    </div>
  </div>
</section>

<section class="section light light-2" id="process">
  <div class="wrap">
    <div class="grid gap-12 lg:grid-cols-12">
      <div class="lg:col-span-4" data-reveal>
        <div class="lg:sticky lg:top-28">
          <div class="section-index"><span class="num">06</span><span class="eyebrow">Как проходит работа</span></div>
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




<!-- 07 · Отзывы -->
<section class="section" id="otzyvy">
  <div class="wrap">
    <div class="section-head" data-reveal>
      <div>
        <div class="section-index"><span class="num">07</span><span class="eyebrow">Отзывы</span></div>
        <h2 class="h2">Что говорят заказчики</h2>
      </div>
      <p class="lead muted">Отзывы оставлены на площадке brigadi.by после сдачи объектов — там же видно профиль студии и проверенное свидетельство.</p>
    </div>
    <div class="rail" data-reveal="stagger">
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p>Хочу выразить огромную благодарность за проделанную работу — отмостка вокруг дома. Бригада строителей нас очень выручила! Буквально после подачи объявления откликнулись и на следующий день приехали на объект. Очень приятные и вежливые ребята. Всё доходчиво объясняют, даже если в процессе возникают какие-то вопросы. Всё, что было оговорено с исполнителем, было сделано в обещанный им срок. Работают быстро, аккуратно. Рекомендую. Я полностью доволен работой.</p>
  <footer><span class="name">Максим</span><span class="work">Отмостка вокруг дома</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p>Если задача поставлена заказчиком чётко и конкретно, бригада старательно работает и выдаёт неплохой результат. Когда бригадир сам находится на площадке и руководит процессом, работа спорится ещё лучше. Если что-то пошло не так — переделывают без вопросов. При необходимости выполняют сопутствующие виды работ: бетонные, сварные. Обещан гарантийный срок: если через год что-то случится, то выезд и исправление по звонку.</p>
  <footer><span class="name">Алексей</span><span class="work">Укладка тротуарной плитки с устройством отмостки</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p>Я очень доволен! Ребята молодые, адекватные, хватает здоровья и умения положить тротуарку быстро и аккуратно. Закончили в сроки, в расценки уложились, сделали качественно. Результат их работы меня порадовал. От меня рекомендации на 100%!</p>
  <footer><span class="name">Игорь</span><span class="work">Укладка тротуарной плитки</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p>Работу выполнили в срок, всё было предельно корректно. Бригада непьющая, приезжали вовремя, что бывает крайне редко. Работой доволен. Планирую сотрудничать и дальше.</p>
  <footer><span class="name">Руслан</span><span class="work">Мощение под парковку, 140 м²</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p>Бригада занималась подготовкой площадки под детский комплекс. Всё сделали хорошо, в соответствии со сроками. Вопросов нет, молодцы!</p>
  <footer><span class="name">Дмитрий</span><span class="work">Благоустройство в товариществе собственников</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p>Бригада работает слаженно и быстро. Уложились в оговорённый срок, получилось аккуратно и красиво. Рекомендую!</p>
  <footer><span class="name">Ирина</span><span class="work">Укладка тротуарной плитки</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p>Замечательные мастера. Я всем осталась довольна, только положительные отзывы. Рекомендую на все 100 %.</p>
  <footer><span class="name">Наталья</span><span class="work">Устройство лестницы</span></footer>
</article>
<article class="review">
  <svg class="ic ic-brass" aria-hidden="true"><use href="#i-quote"/></svg>
  <p>Нормально работают, по срокам вопросов нет. Занимались укладкой плитки, работа понравилась.</p>
  <footer><span class="name">Павел</span><span class="work">Укладка тротуарной плитки, 200 м²</span></footer>
</article>
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
