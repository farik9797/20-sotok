/* 20 соток — интерактивный квиз (калькулятор бюджета).
   Монтируется в каждый элемент .quiz-mount. Шаги переключаются без перезагрузки. */
(function () {
  const AREAS = [
    { v: 'до 10 соток', s: 'компактный участок' },
    { v: '10–15 соток', s: 'типовой коттеджный' },
    { v: 'более 15 соток', s: 'большая территория' }
  ];
  const SYSTEMS = [
    { k: 'paving', v: 'Мощение парковки и дорожек' },
    { k: 'lawn', v: 'Рулонный газон премиум' },
    { k: 'irrigation', v: 'Автоматический полив' },
    { k: 'drainage', v: 'Скрытый дренаж и ливнёвка' }
  ];
  const PLACES = ['Тарасово', 'Колодищи', 'Раубичи', 'Валерьяново', 'Марьяливо'];

  const ic = (n, cls) => `<svg class="ic ${cls || ''}"><use href="#i-${n}"/></svg>`;

  function template(id, pre) {
    return `
    <div class="quiz-head">
      <div>
        <div class="eyebrow no-rule">Калькулятор бюджета</div>
        <div class="quiz-stepnum tnum" style="font-size:.9rem;color:var(--muted-dark);margin-top:4px">Шаг <b data-cur>1</b> из 4 · около 1 минуты</div>
      </div>
      <button type="button" class="quiz-close" data-quiz-close aria-label="Закрыть">${ic('x')}</button>
    </div>
    <div class="quiz-progress"><i data-bar></i></div>
    <form class="quiz-body" novalidate>
      <!-- шаг 1 -->
      <section class="quiz-step is-active" data-step="1">
        <h3 class="quiz-q">Какая примерная площадь вашего участка?</h3>
        <div class="grid gap-3">
          ${AREAS.map((a, i) => `
          <label class="opt radio"><input type="radio" name="${id}-area" value="${a.v}" ${i === 1 ? '' : ''}>
            <span class="box">${ic('check')}</span><span class="opt-t">${a.v}</span><span class="opt-s">${a.s}</span></label>`).join('')}
        </div>
        <div class="quiz-foot"><span></span><button type="button" class="btn btn-fir" data-next>Далее ${ic('arrow-right')}</button></div>
      </section>
      <!-- шаг 2 -->
      <section class="quiz-step" data-step="2">
        <h3 class="quiz-q">Какие системы необходимо интегрировать?</h3>
        <p class="quiz-hint">Можно выбрать несколько — мы считаем комплекс одним договором.</p>
        <div class="grid gap-3 md:grid-cols-2">
          ${SYSTEMS.map((s) => `
          <label class="opt"><input type="checkbox" name="${id}-sys" value="${s.v}" data-key="${s.k}" ${pre === s.k ? 'checked' : ''}>
            <span class="box">${ic('check')}</span><span class="opt-t">${s.v}</span></label>`).join('')}
        </div>
        <div class="quiz-foot"><button type="button" class="quiz-back" data-back>${ic('arrow-left')} Назад</button><button type="button" class="btn btn-fir" data-next>Далее ${ic('arrow-right')}</button></div>
      </section>
      <!-- шаг 3 -->
      <section class="quiz-step" data-step="3">
        <h3 class="quiz-q">В каком населённом пункте или направлении находится объект?</h3>
        <div class="field">
          <label for="${id}-place">Населённый пункт</label>
          <input id="${id}-place" name="${id}-place" type="text" placeholder="Например, Тарасово или Колодищи" list="${id}-places" autocomplete="off">
          <datalist id="${id}-places">${PLACES.map((p) => `<option value="${p}">`).join('')}</datalist>
          <span class="field-err">Укажите населённый пункт или направление</span>
        </div>
        <div class="flex flex-wrap gap-2 mt-4">${PLACES.map((p) => `<button type="button" class="chip" data-place="${p}">${p}</button>`).join('')}</div>
        <div class="quiz-foot"><button type="button" class="quiz-back" data-back>${ic('arrow-left')} Назад</button><button type="button" class="btn btn-fir" data-next>Далее ${ic('arrow-right')}</button></div>
      </section>
      <!-- шаг 4: захват -->
      <section class="quiz-step" data-step="4">
        <h3 class="quiz-q">Спасибо! Предварительный расчёт сметы под ваши параметры подготавливается.</h3>
        <p class="quiz-hint">Куда вам удобнее отправить цифры и примеры похожих объектов?</p>
        <div class="msg-toggle mb-5">
          <label class="opt radio"><input type="radio" name="${id}-msg" value="Telegram" checked><span class="box">${ic('check')}</span>${ic('si-telegram')}<span class="opt-t">Telegram</span></label>
          <label class="opt radio"><input type="radio" name="${id}-msg" value="Viber"><span class="box">${ic('check')}</span>${ic('si-viber')}<span class="opt-t">Viber</span></label>
        </div>
        <div class="field">
          <label for="${id}-phone">Телефон</label>
          <input id="${id}-phone" name="${id}-phone" type="tel" inputmode="tel" placeholder="+375 (__) ___-__-__" required>
          <span class="field-err">Введите номер полностью: +375 (__) ___-__-__</span>
        </div>
        <p class="consent mt-4">Нажимая кнопку, вы соглашаетесь с обработкой персональных данных. Без спама: один расчёт и примеры объектов.</p>
        <div class="quiz-foot"><button type="button" class="quiz-back" data-back>${ic('arrow-left')} Назад</button><button type="submit" class="btn btn-brass btn-lg">Получить расчёт ${ic('send')}</button></div>
      </section>
      <!-- финал -->
      <section class="quiz-step" data-step="5">
        <div class="quiz-done">
          ${ic('badge-check')}
          <h3 class="quiz-q mt-4">Заявка принята</h3>
          <p class="prose" style="color:var(--muted-dark)">Расчёт и примеры похожих объектов отправим в <b data-msg-name>Telegram</b> в течение рабочего дня. Если понадобится выезд инженера на участок, консультация платная, но её стоимость засчитывается в итоговую смету при заключении договора.</p>
          <dl class="dl mt-6" style="font-size:.9rem" data-summary></dl>
        </div>
      </section>
    </form>`;
  }

  function mount(root, idx) {
    const id = 'q' + idx;
    root.innerHTML = template(id, root.dataset.preselect);
    const form = root.querySelector('form');
    const steps = Array.from(root.querySelectorAll('.quiz-step'));
    const bar = root.querySelector('[data-bar]');
    const cur = root.querySelector('[data-cur]');
    const stepnum = root.querySelector('.quiz-stepnum');
    let step = 1;

    const show = (n) => {
      step = n;
      steps.forEach((s) => s.classList.toggle('is-active', +s.dataset.step === n));
      bar.style.width = Math.min(n, 4) / 4 * 100 + '%';
      cur.textContent = Math.min(n, 4);
      stepnum.style.visibility = n > 4 ? 'hidden' : '';
      const modal = root.closest('.quiz-modal-panel');
      if (modal) modal.scrollTop = 0;
    };

    // подсветка выбранных опций
    root.querySelectorAll('.opt input').forEach((inp) => {
      const sync = () => {
        if (inp.type === 'radio') root.querySelectorAll(`input[name="${inp.name}"]`).forEach((r) => r.closest('.opt').classList.toggle('is-checked', r.checked));
        else inp.closest('.opt').classList.toggle('is-checked', inp.checked);
      };
      inp.addEventListener('change', sync);
      sync();
    });

    // чипы населённых пунктов
    const place = root.querySelector(`#${id}-place`);
    root.querySelectorAll('[data-place]').forEach((c) => c.addEventListener('click', () => { place.value = c.dataset.place; place.closest('.field').classList.remove('is-error'); }));

    // маска телефона
    const phone = root.querySelector(`#${id}-phone`);
    window.applyByMask && window.applyByMask(phone);

    const validate = (n) => {
      if (n === 1) return !!root.querySelector(`input[name="${id}-area"]:checked`);
      if (n === 2) return !!root.querySelector(`input[name="${id}-sys"]:checked`);
      if (n === 3) { const ok = place.value.trim().length > 1; place.closest('.field').classList.toggle('is-error', !ok); return ok; }
      return true;
    };

    root.querySelectorAll('[data-next]').forEach((b) => b.addEventListener('click', () => {
      if (!validate(step)) { const s = steps[step - 1]; s.classList.remove('is-active'); void s.offsetWidth; s.classList.add('is-active'); return; }
      show(step + 1);
    }));
    root.querySelectorAll('[data-back]').forEach((b) => b.addEventListener('click', () => show(step - 1)));

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const ok = phone.isComplete ? phone.isComplete() : phone.value.length > 0;
      phone.closest('.field').classList.toggle('is-error', !ok);
      if (!ok) { phone.focus(); return; }
      const msg = root.querySelector(`input[name="${id}-msg"]:checked`).value;
      root.querySelector('[data-msg-name]').textContent = msg;
      const area = root.querySelector(`input[name="${id}-area"]:checked`).value;
      const sys = Array.from(root.querySelectorAll(`input[name="${id}-sys"]:checked`)).map((i) => i.value).join(', ');
      root.querySelector('[data-summary]').innerHTML = `
        <div><dt>Участок</dt><dd>${area}</dd></div>
        <div><dt>Системы</dt><dd>${sys}</dd></div>
        <div><dt>Объект</dt><dd>${place.value.trim()}</dd></div>
        <div><dt>Контакт</dt><dd>${msg} · ${phone.value}</dd></div>`;
      // В макете отправка не выполняется. Здесь будет POST в CRM / Telegram-бот.
      show(5);
    });
  }

  document.querySelectorAll('.quiz-mount').forEach(mount);
})();
