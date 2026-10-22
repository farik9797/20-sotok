<?php
/* page-kontakty.php — собрано из макета kontakty.html скриптом tools/wp-port/build_theme.py. */
get_header();
?>

<section class="section sheet" style="padding-top:160px;padding-bottom:clamp(40px,5vw,72px)">
  <div class="wrap">
    <div class="section-head wide" data-reveal>
      <div>
        <div class="eyebrow mb-5">Контакты · Минск и Минский район</div>
        <h1 class="h1" style="font-size:clamp(2.4rem,4.8vw,4.6rem)">Свяжитесь со студией</h1>
      </div>
      <p class="lead muted lg:pb-2">Отвечаем в Telegram и Viber в рабочее время, выезжаем на объекты по Минску и Минскому району.</p>
    </div>
  </div>
</section>

<section class="section-tight" id="kontakty-info">
  <div class="wrap">
    <div class="grid gap-6 lg:grid-cols-12">
      <div class="grid gap-4 sm:grid-cols-2 lg:col-span-5 lg:grid-cols-1" data-reveal="stagger">
        <a class="eq block" href="tel:+375445173050"><div class="eyebrow no-rule"><svg class="ic " aria-hidden="true"><use href="#i-phone"/></svg> Телефон</div><div class="font-display text-2xl font-light tracking-tight mt-4">+375 (44) 517-30-50</div><p>Ежедневно 9:00–20:00</p></a>
        <a class="eq block" href="https://yandex.by/maps/?text=Минск, Козыревская 15" target="_blank" rel="noopener"><div class="eyebrow no-rule"><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg> Адрес офиса</div><div class="h3 mt-4">г. Минск, ул. Козыревская, 15, офис 604</div><p>Открыть в Яндекс Картах</p></a>
        <a class="eq block" href="mailto:by20sotok@gmail.com"><div class="eyebrow no-rule"><svg class="ic " aria-hidden="true"><use href="#i-send"/></svg> E-mail</div><div class="h3 mt-4">by20sotok@gmail.com</div><p>Для коммерческих предложений и документов</p></a>
        <div class="eq"><div class="eyebrow no-rule">Мессенджеры</div><div class="grid grid-cols-2 gap-3 mt-4"><a class="msg-btn" href="https://t.me/+375445173050" target="_blank" rel="noopener"><svg class="ic " aria-hidden="true"><use href="#i-si-telegram"/></svg> Telegram</a><a class="msg-btn" href="viber://chat?number=%2B375445173050"><svg class="ic " aria-hidden="true"><use href="#i-si-viber"/></svg> Viber</a></div><p>Фото участка и вопросы — сразу в чат</p></div>
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
        <div class="section-index"><span class="num">01</span><span class="eyebrow">Выезд инженера</span></div>
        <h2 class="h2">Бесплатно при заказе комплекса работ</h2>
        <p class="mt-6 max-w-[60ch]" style="color:var(--muted-dark)">Мы не ездим на участок «просто посмотреть». Инженер выезжает с лазерным нивелиром: снимаем рельеф, высоты, точки сброса воды и подъезды техники. При заказе комплекса работ выезд и съёмка бесплатные.</p>
        <div class="mt-8 flex flex-wrap gap-3"><button type="button" class="btn btn-fir" data-quiz-open>Рассчитать бюджет за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button><a href="tel:+375445173050" class="btn btn-ghost-dark"><svg class="ic " aria-hidden="true"><use href="#i-phone"/></svg> Позвонить</a></div>
      </div>
      <div class="lg:col-span-6 lg:pl-8" data-reveal>
        <div class="section-index"><span class="num">02</span><span class="eyebrow">Реквизиты</span></div>
        <dl class="dl" style="--tw-border-opacity:1">
          <div style="border-color:var(--line-dark)"><dt style="color:var(--muted-dark)">Исполнитель</dt><dd>ИП Денисов Евгений Игоревич</dd></div>
          <div style="border-color:var(--line-dark)"><dt style="color:var(--muted-dark)">УНП</dt><dd>193435021</dd></div>
          <div style="border-color:var(--line-dark)"><dt style="color:var(--muted-dark)">Офис</dt><dd>г. Минск, ул. Козыревская, 15, офис 604</dd></div>
          <div style="border-color:var(--line-dark)"><dt style="color:var(--muted-dark)">Договор</dt><dd>Официальный договор, фиксированная смета, гарантия от 2 лет</dd></div>
        </dl>
      </div>
    </div>
  </div>
</section>

<section class="section-tight cta-fir">
  <div class="wrap">
    <div class="cta-band" data-reveal>
      <div>
        <div class="eyebrow mb-4">Предварительный расчёт</div>
        <h2 class="h2" style="font-size:clamp(1.7rem,3vw,2.8rem)">Вопрос по своему участку?</h2>
        <p class="muted mt-4 lead" style="font-size:1.05rem">Расчёт занимает минуту, а ответ приходит в Telegram или Viber вместе с примерами похожих объектов.</p>
      </div>
      <div class="lg:justify-self-end grid gap-3">
        <button type="button" class="btn btn-brass btn-lg" data-quiz-open>Рассчитать бюджет проекта за 1 минуту <svg class="ic " aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
        <a href="tel:+375445173050" class="btn btn-ghost btn-lg"><svg class="ic " aria-hidden="true"><use href="#i-phone"/></svg> +375 (44) 517-30-50</a>
      </div>
    </div>
  </div>
</section>


<?php s20_set_preselect(''); get_footer();
