<?php
/* Подвал: собирается из макета скриптом tools/wp-port/build_theme.py — правки вносить в макет. */
?><footer class="footer" id="kontakty">
  <div class="wrap section-tight">
    <div class="grid gap-12 lg:grid-cols-12">
      <div class="lg:col-span-4">
        <a href="<?php echo s20_url(''); ?>" class="logo"><img class="logo-full logo-light" src="<?php echo S20_A; ?>logo/logo.svg" alt="20 соток — инженерное благоустройство" width="140" height="34"><img class="logo-full logo-dark" src="<?php echo S20_A; ?>logo/logo-dark.svg" alt="" aria-hidden="true" width="140" height="34"></a>
        <p class="muted mt-6 text-[.95rem]" style="max-width:38ch">Студия инженерного благоустройства. Комплексное благоустройство придомовых территорий, ландшафтная инженерия и дорожное строительство премиум-класса.</p>
        <p class="muted mt-4 text-[.9rem] flex items-start gap-2"><svg class="ic " aria-hidden="true"><use href="#i-map-pin"/></svg><span>Минск и Минский район</span></p>
      </div>
      <div class="lg:col-span-2">
        <h5>Услуги</h5>
        <ul>
          <li><a href="<?php echo s20_url('uslugi/plitka'); ?>">Тротуарная плитка и мощение</a></li>
          <li><a href="<?php echo s20_url('uslugi/gazon'); ?>">Премиальные газоны</a></li>
          <li><a href="<?php echo s20_url('uslugi/poliv'); ?>">Автополив и освещение</a></li>
          <li><a href="<?php echo s20_url('uslugi/drenazh'); ?>">Дренаж и ливнёвка</a></li>
        </ul>
      </div>
      <div class="lg:col-span-2">
        <h5>Компания</h5>
        <ul>
          <li><a href="<?php echo s20_url('proekty'); ?>">Наши проекты</a></li>
          <li><a href="<?php echo s20_url('blog'); ?>">Полезно знать</a></li>
          <li><a href="<?php echo s20_url('o-kompanii'); ?>">О компании</a></li>
          <li><a href="<?php echo s20_url('kontakty'); ?>">Контакты</a></li>
          <li><a href="<?php echo esc_html(s20_c('instagram')); ?>" target="_blank" rel="noopener">Instagram</a></li>
        </ul>
      </div>
      <div class="lg:col-span-4">
        <h5>Связаться</h5>
        <a href="<?php echo esc_html(s20_c('tel')); ?>" class="font-display text-2xl font-light tracking-tight"><?php echo esc_html(s20_c('phone')); ?></a>
        <p class="muted mt-2 text-[.9rem]"><?php echo esc_html(s20_c('hours')); ?> · <a href="mailto:<?php echo esc_html(s20_c('email')); ?>" class="underline decoration-brass/60 underline-offset-4"><?php echo esc_html(s20_c('email')); ?></a></p>
        <div class="grid gap-3 mt-6 sm:grid-cols-2 lg:grid-cols-1 lg:w-max">
          <a class="msg-btn" href="<?php echo esc_html(s20_c('telegram')); ?>" target="_blank" rel="noopener"><svg class="ic " aria-hidden="true"><use href="#i-si-telegram"/></svg> Написать в Telegram</a>
          <a class="msg-btn" href="<?php echo esc_html(s20_c('viber')); ?>"><svg class="ic " aria-hidden="true"><use href="#i-si-viber"/></svg> Написать в Viber</a>
        </div>
        <p class="muted mt-6 text-[.9rem]">Выезд инженера на объект — бесплатно при заказе комплекса работ.</p>
      </div>
    </div>
    <div class="hairline mt-14 pt-8 flex flex-wrap gap-x-10 gap-y-3 justify-between legal">
      <div><?php echo esc_html(s20_c('company')); ?> · УНП <?php echo esc_html(s20_c('unp')); ?><br>Офис: <?php echo esc_html(s20_c('office')); ?></div>
      <div>© 2026 Студия инженерного благоустройства «20 соток» · <a href="<?php echo s20_url('politika'); ?>" class="underline underline-offset-4">Политика конфиденциальности</a></div>
    </div>
  </div>
</footer>

<div class="quiz-modal" role="dialog" aria-modal="true" aria-label="Калькулятор бюджета проекта">
  <div class="quiz-modal-bg" data-quiz-close></div>
  <div class="quiz-modal-panel"><div class="quiz quiz-mount" data-preselect="<?php echo esc_attr(s20_preselect()); ?>"></div></div>
</div>

<?php wp_footer(); ?>
</body>
</html>
