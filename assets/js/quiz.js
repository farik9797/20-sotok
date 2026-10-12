/* 20 соток — интерактивный квиз (калькулятор бюджета).
   Монтируется в каждый элемент .quiz-mount. Шаги переключаются без перезагрузки. */
(function () {
  const ROOT = location.pathname.includes('/uslugi/') ? '../' : '';
  const STEPS = 5;

  const DIRECTIONS = [
    { v: 'Логойское / Витебское направление', s: 'Раубичи, Валерьяново, Боровляны' },
    { v: 'Гродненское / Раковское направление', s: 'Тарасово, Ратомка, Хатежино' },
    { v: 'Московское направление', s: 'Колодищи, Городище, Смолевичи' },
    { v: 'Брестское / Слуцкое направление', s: 'Сеница, Прилуки, Щомыслица' },
    { v: 'Другое направление', s: 'в пределах Минского района', val: 'Другое направление в пределах Минского района' }
  ];
  const AREAS = [
    { v: 'до 80 м²', s: 'отмостка и дорожки' },
    { v: '80–150 м²', s: 'отмостка и парковка на 1–2 авто' },
    { v: '150–300 м²', s: 'просторный двор и зоны отдыха' },
    { v: 'более 300 м²', s: 'масштабное мощение' }
  ];
  const STYLES = [
    { v: 'Крупноформатные плиты', s: 'минимализм, хай-тек' },
    { v: 'Серый кирпичик', s: '' },
    { v: '«Колормикс» или «Старый город»', s: 'современные градиенты' },
    { v: 'Клинкерный кирпич или гранитная брусчатка', s: 'элитный формат' },
    { v: 'Пока не определились', s: 'подскажем на выезде' }
  ];
  const SYSTEMS = [
    { k: 'drainage', v: 'Скрытый дренаж и ливневая канализация' },
    { k: 'irrigation', v: 'Автоматический полив' },
    { k: 'lawn', v: 'Рулонный или посевной газон', s: 'с укладкой сетки от кротов' },
    { k: 'light', v: 'Скрытая LED-подсветка в швах плитки' }
  ];

  const ic = (n, cls) => `<svg class="ic ${cls || ''}"><use href="#i-${n}"/></svg>`;
  const opt = (name, o, type) => `
    <label class="opt ${type === 'radio' ? 'radio' : ''}"><input type="${type}" name="${name}" value="${o.val || o.v}"${o.k ? ` data-key="${o.k}"` : ''}>
      <span class="box">${ic('check')}</span><span class="opt-t">${o.v}</span>${o.s ? `<span class="opt-s">${o.s}</span>` : ''}</label>`;

  function template(id, pre) {
    return `
    <div class="quiz-head">
      <div>
        <div class="eyebrow no-rule">Калькулятор бюджета</div>
        <div class="quiz-stepnum tnum" style="font-size:.9rem;color:var(--muted-dark);margin-top:4px">Шаг <b data-cur>1</b> из ${STEPS} · около минуты</div>
      </div>
      <button type="button" class="quiz-close" data-quiz-close aria-label="Закрыть">${ic('x')}</button>
    </div>
    <div class="quiz-progress"><i data-bar></i></div>
    <form class="quiz-body" novalidate>
      <!-- шаг 1 · локация -->
      <section class="quiz-step is-active" data-step="1">
        <h3 class="quiz-q">Где расположен ваш участок?</h3>
        <div class="grid gap-3 md:grid-cols-2">${DIRECTIONS.map((d) => opt(id + '-dir', d, 'radio')).join('')}</div>
        <div class="quiz-foot"><span></span><button type="button" class="btn btn-fir" data-next>Далее ${ic('arrow-right')}</button></div>
      </section>
      <!-- шаг 2 · площадь мощения -->
      <section class="quiz-step" data-step="2">
        <h3 class="quiz-q">Укажите примерную площадь планируемого мощения</h3>
        <p class="quiz-hint">Дорожки, парковка, отмостка.</p>
        <div class="grid gap-3 md:grid-cols-2">${AREAS.map((a) => opt(id + '-area', a, 'radio')).join('')}</div>
        <div class="quiz-exact">
          <label for="${id}-exact">или введите точную площадь из вашего проекта</label>
          <div class="quiz-exact-row">
            <input id="${id}-exact" name="${id}-exact" type="text" inputmode="numeric" autocomplete="off" placeholder="например, 240" aria-describedby="${id}-exact-err">
            <span class="quiz-exact-unit">м²</span>
          </div>
          <span class="field-err" id="${id}-exact-err">Выберите вариант выше или введите площадь числом</span>
        </div>
        <div class="quiz-foot"><button type="button" class="quiz-back" data-back>${ic('arrow-left')} Назад</button><button type="button" class="btn btn-fir" data-next>Далее ${ic('arrow-right')}</button></div>
      </section>
      <!-- шаг 3 · формат плитки -->
      <section class="quiz-step" data-step="3">
        <h3 class="quiz-q">Какой формат тротуарной плитки ближе к стилю вашего дома?</h3>
        <div class="grid gap-3 md:grid-cols-2">${STYLES.map((s) => opt(id + '-style', s, 'radio')).join('')}</div>
        <div class="quiz-foot"><button type="button" class="quiz-back" data-back>${ic('arrow-left')} Назад</button><button type="button" class="btn btn-fir" data-next>Далее ${ic('arrow-right')}</button></div>
      </section>
      <!-- шаг 4 · сопутствующие системы -->
      <section class="quiz-step" data-step="4">
        <h3 class="quiz-q">Какие сопутствующие системы нужно интегрировать на участке?</h3>
        <p class="quiz-hint">Можно выбрать несколько или пропустить — считаем комплекс одним договором.</p>
        <div class="grid gap-3 md:grid-cols-2">
          ${SYSTEMS.map((s) => `
          <label class="opt"><input type="checkbox" name="${id}-sys" value="${s.v}" data-key="${s.k}" ${pre === s.k ? 'checked' : ''}>
            <span class="box">${ic('check')}</span><span class="opt-t">${s.v}</span>${s.s ? `<span class="opt-s">${s.s}</span>` : ''}</label>`).join('')}
        </div>
        <div class="quiz-foot"><button type="button" class="quiz-back" data-back>${ic('arrow-left')} Назад</button><button type="button" class="btn btn-fir" data-next>Далее ${ic('arrow-right')}</button></div>
      </section>
      <!-- шаг 5 · лид-форма -->
      <section class="quiz-step" data-step="5">
        <h3 class="quiz-q">Параметры приняты</h3>
        <p class="quiz-hint">Евгений уже анализирует конфигурацию вашего участка для расчёта предварительного бюджета. Укажите номер — пришлём смету в удобный мессенджер.</p>
        <div class="field">
          <label for="${id}-phone">Телефон</label>
          <input id="${id}-phone" name="${id}-phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="+375 (__) ___-__-__" required>
          <span class="field-err">Введите номер полностью: +375 (__) ___-__-__</span>
        </div>
        <label class="opt consent-opt mt-4" for="${id}-consent">
          <input id="${id}-consent" name="${id}-consent" type="checkbox">
          <span class="box">${ic('check')}</span>
          <span class="consent">Согласен на <a class="link" href="${ROOT}politika.html" target="_blank" rel="noopener">обработку персональных данных</a>. Без спама: один расчёт и примеры объектов.</span>
        </label>
        <span class="field-err consent-err">Отметьте согласие, чтобы отправить заявку</span>
        <div class="quiz-send">
          <button type="submit" class="btn btn-brass btn-lg" data-msg="Telegram">${ic('si-telegram')} Получить смету в Telegram</button>
          <button type="submit" class="btn btn-ghost-dark btn-lg" data-msg="Viber">${ic('si-viber')} Получить в Viber</button>
        </div>
        <div class="quiz-foot"><button type="button" class="quiz-back" data-back>${ic('arrow-left')} Назад</button><span></span></div>
      </section>
      <!-- финал -->
      <section class="quiz-step" data-step="6">
        <div class="quiz-done">
          ${ic('badge-check')}
          <h3 class="quiz-q mt-4">Заявка принята</h3>
          <p class="prose" style="color:var(--muted-dark)">Предварительную смету и примеры похожих объектов отправим в <b data-msg-name>Telegram</b> в течение рабочего дня. Если понадобится выезд инженера на участок, он бесплатный при заказе комплекса работ.</p>
          <dl class="dl mt-6" style="font-size:.9rem" data-summary></dl>
        </div>
      </section>
    </form>`;
  }

  function mount(root, idx) {
    const id = 'q' + idx;
    root.innerHTML = template(id, root.dataset.preselect);
    // крестик закрытия нужен только в модальном окне, во встроенном блоке его убираем
    if (!root.closest('.quiz-modal')) root.querySelector('.quiz-close').remove();
    const form = root.querySelector('form');
    const steps = Array.from(root.querySelectorAll('.quiz-step'));
    const bar = root.querySelector('[data-bar]');
    const cur = root.querySelector('[data-cur]');
    const stepnum = root.querySelector('.quiz-stepnum');
    let step = 1;
    let msg = 'Telegram';

    const show = (n) => {
      step = n;
      steps.forEach((s) => s.classList.toggle('is-active', +s.dataset.step === n));
      bar.style.width = Math.min(n, STEPS) / STEPS * 100 + '%';
      cur.textContent = Math.min(n, STEPS);
      stepnum.style.visibility = n > STEPS ? 'hidden' : '';
      const modal = root.closest('.quiz-modal-panel');
      if (modal) modal.scrollTop = 0;
    };

    // подсветка выбранных опций
    root.querySelectorAll('.opt input').forEach((inp) => {
      const sync = () => {
        if (inp.type === 'radio') root.querySelectorAll(`input[name="${inp.name}"]`).forEach((r) => r.closest('.opt').classList.toggle('is-checked', r.checked));
        else inp.closest('.opt').classList.toggle('is-checked', inp.checked);
      };
      inp.addEventListener('change', () => {
        sync();
        if (inp.type === 'checkbox' && inp.closest('.consent-opt')) {
          inp.closest('.opt').classList.remove('is-error');
          inp.closest('.quiz-step').classList.remove('is-consent-error');
        }
      });
      sync();
    });

    // шаг 2: быстрый выбор и точная площадь — взаимоисключающие
    const exact = root.querySelector(`#${id}-exact`);
    const areaInputs = root.querySelectorAll(`input[name="${id}-area"]`);
    const clearExactError = () => exact.closest('.quiz-exact').classList.remove('is-error');
    areaInputs.forEach((r) => r.addEventListener('change', () => { exact.value = ''; clearExactError(); }));
    exact.addEventListener('input', () => {
      exact.value = exact.value.replace(/\D+/g, '').slice(0, 5);
      if (exact.value) areaInputs.forEach((r) => { r.checked = false; r.closest('.opt').classList.remove('is-checked'); });
      clearExactError();
    });

    // маска телефона
    const phone = root.querySelector(`#${id}-phone`);
    window.applyByMask && window.applyByMask(phone);

    const areaValue = () => {
      const picked = root.querySelector(`input[name="${id}-area"]:checked`);
      if (picked) return picked.value;
      return exact.value ? exact.value + ' м²' : '';
    };

    const validate = (n) => {
      if (n === 1) return !!root.querySelector(`input[name="${id}-dir"]:checked`);
      if (n === 2) {
        const ok = !!areaValue() && (!exact.value || +exact.value > 0);
        exact.closest('.quiz-exact').classList.toggle('is-error', !ok);
        return ok;
      }
      if (n === 3) return !!root.querySelector(`input[name="${id}-style"]:checked`);
      return true; // шаг 4 можно пропустить
    };

    root.querySelectorAll('[data-next]').forEach((b) => b.addEventListener('click', () => {
      if (!validate(step)) { const s = steps[step - 1]; s.classList.remove('is-active'); void s.offsetWidth; s.classList.add('is-active'); return; }
      show(step + 1);
    }));
    root.querySelectorAll('[data-back]').forEach((b) => b.addEventListener('click', () => show(step - 1)));
    root.querySelectorAll('[data-msg]').forEach((b) => b.addEventListener('click', () => { msg = b.dataset.msg; }));

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const ok = phone.isComplete ? phone.isComplete() : phone.value.length > 0;
      phone.closest('.field').classList.toggle('is-error', !ok);
      const consent = root.querySelector(`#${id}-consent`);
      const agreed = consent.checked;
      consent.closest('.quiz-step').classList.toggle('is-consent-error', !agreed);
      consent.closest('.opt').classList.toggle('is-error', !agreed);
      if (!ok) { phone.focus(); return; }
      if (!agreed) { consent.focus(); return; }
      root.querySelector('[data-msg-name]').textContent = msg;
      const dir = root.querySelector(`input[name="${id}-dir"]:checked`).value;
      const style = root.querySelector(`input[name="${id}-style"]:checked`).value;
      const sys = Array.from(root.querySelectorAll(`input[name="${id}-sys"]:checked`)).map((i) => i.value).join(', ');
      root.querySelector('[data-summary]').innerHTML = `
        <div><dt>Направление</dt><dd>${dir}</dd></div>
        <div><dt>Площадь мощения</dt><dd>${areaValue()}</dd></div>
        <div><dt>Формат плитки</dt><dd>${style}</dd></div>
        <div><dt>Системы</dt><dd>${sys || 'только мощение'}</dd></div>
        <div><dt>Контакт</dt><dd>${msg} · ${phone.value}</dd></div>`;
      // В макете отправка не выполняется. Здесь будет POST в CRM / Telegram-бот.
      show(6);
    });
  }

  document.querySelectorAll('.quiz-mount').forEach(mount);
})();
