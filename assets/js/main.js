/* 20 соток — общие скрипты: навигация, появление блоков, слайдер «до/после», фильтр кейсов */
(function () {
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---- переключатель темы: тёмная по умолчанию, выбор запоминается ---- */
  const themeMeta = document.querySelector('meta[name="theme-color"]');
  const applyTheme = (t) => {
    const light = t === 'light';
    document.documentElement.toggleAttribute('data-theme', false);
    if (light) document.documentElement.setAttribute('data-theme', 'light');
    else document.documentElement.removeAttribute('data-theme');
    if (themeMeta) themeMeta.setAttribute('content', light ? '#F4F4F2' : '#2A2F35');
    document.querySelectorAll('[data-theme-toggle]').forEach((b) => {
      b.setAttribute('aria-pressed', String(light));
      b.setAttribute('aria-label', light ? 'Включить тёмную тему' : 'Включить светлую тему');
    });
  };
  let savedTheme = null;
  try { savedTheme = localStorage.getItem('theme'); } catch (e) {}
  applyTheme(savedTheme === 'light' ? 'light' : 'dark');
  document.addEventListener('click', (e) => {
    if (!e.target.closest('[data-theme-toggle]')) return;
    const next = document.documentElement.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
    applyTheme(next);
    try { localStorage.setItem('theme', next); } catch (err) {}
  });

  /* ---- уведомление о данных, которые хранит браузер ---- */
  (function cookieNotice() {
    let hidden = null;
    try { hidden = localStorage.getItem('cookie-notice'); } catch (e) { hidden = 'skip'; }
    if (hidden) return;
    const root = location.pathname.includes('/uslugi/') ? '../' : '';
    const bar = document.createElement('div');
    bar.className = 'cookie-bar';
    bar.setAttribute('role', 'region');
    bar.setAttribute('aria-label', 'Уведомление об использовании данных браузера');
    bar.innerHTML = '<p>Сайт сохраняет в браузере только технические настройки — выбранную тему и то, что вы закрыли это уведомление. ' +
      'Рекламных и аналитических куки здесь нет. Подробнее — в <a class="link" href="' + root + 'politika.html">политике конфиденциальности</a>.</p>' +
      '<button type="button" class="btn btn-brass" data-cookie-ok>Понятно</button>';
    document.body.appendChild(bar);
    requestAnimationFrame(() => bar.classList.add('is-open'));
    bar.addEventListener('click', (e) => {
      if (!e.target.closest('[data-cookie-ok]')) return;
      bar.classList.remove('is-open');
      try { localStorage.setItem('cookie-notice', 'hidden'); } catch (err) {}
      setTimeout(() => bar.remove(), 300);
    });
  })();

  /* ---- слайдеры: курсор-хват и перетаскивание мышью ---- */
  document.querySelectorAll('.rail, .swipe').forEach((rail) => {
    if (!rail.dataset.cursorLabel) rail.dataset.cursorLabel = 'Листайте';
    let down = false, moved = 0, startX = 0, startScroll = 0;
    rail.addEventListener('pointerdown', (e) => {
      if (e.pointerType !== 'mouse' || rail.scrollWidth <= rail.clientWidth + 4) return;
      down = true; moved = 0; startX = e.clientX; startScroll = rail.scrollLeft;
      rail.classList.add('is-drag');
    });
    rail.addEventListener('pointermove', (e) => {
      if (!down) return;
      const dx = e.clientX - startX;
      if (Math.abs(dx) > 3) { moved = Math.abs(dx); rail.setPointerCapture(e.pointerId); }
      rail.scrollLeft = startScroll - dx;
    });
    const stop = () => { down = false; rail.classList.remove('is-drag'); setTimeout(() => { moved = 0; }, 0); };
    rail.addEventListener('pointerup', stop);
    rail.addEventListener('pointercancel', stop);
    rail.addEventListener('click', (e) => { if (moved > 6) { e.preventDefault(); e.stopPropagation(); } }, true);
  });

  /* ---- навигация: фон при скролле ---- */
  const nav = document.querySelector('.nav');
  const onScroll = () => nav && nav.classList.toggle('is-scrolled', window.scrollY > 40);
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  /* ---- мобильное меню ---- */
  const burger = document.querySelector('[data-menu-open]');
  const menu = document.querySelector('.mobile-menu');
  const closeBtn = document.querySelector('[data-menu-close]');
  const setMenu = (open) => {
    if (!menu) return;
    menu.classList.toggle('is-open', open);
    menu.setAttribute('aria-hidden', String(!open)); // иначе открытое меню остаётся скрытым для скринридера
    document.body.classList.toggle('modal-open', open);
    burger && burger.setAttribute('aria-expanded', String(open));
  };
  burger && burger.addEventListener('click', () => setMenu(true));
  closeBtn && closeBtn.addEventListener('click', () => setMenu(false));
  menu && menu.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => setMenu(false)));

  /* ---- модальный квиз ---- */
  const modal = document.querySelector('.quiz-modal');
  const openQuiz = (e) => {
    if (!modal) return;
    e && e.preventDefault();
    modal.classList.add('is-open');
    document.body.classList.add('modal-open');
    const first = modal.querySelector('.quiz-step.is-active input, .quiz-step.is-active button');
    first && first.focus({ preventScroll: true });
  };
  const closeQuiz = () => {
    if (!modal) return;
    modal.classList.remove('is-open');
    document.body.classList.remove('modal-open');
  };
  document.querySelectorAll('[data-quiz-open]').forEach((b) => b.addEventListener('click', openQuiz));
  // кнопка закрытия появляется после монтирования квиза, поэтому слушаем клики на всей модалке
  modal && modal.addEventListener('click', (e) => { if (e.target.closest('[data-quiz-close]')) closeQuiz(); });
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape') { closeQuiz(); setMenu(false); } });

  /* ---- короткие ролики с объектов: играют, только когда видны ---- */
  const clips = document.querySelectorAll('video[data-clip]');
  // на телефоне берём облегчённый файл: атрибут media у <source> учитывают не все браузеры.
  // Касается и первых экранов — у них полная версия весит в три-четыре раза больше
  if (window.matchMedia('(max-width: 767px)').matches) {
    document.querySelectorAll('video').forEach((v) => {
      const small = v.querySelector('source[media]');
      if (!small) return;
      if (v.currentSrc && v.currentSrc.indexOf(small.getAttribute('src')) !== -1) return;
      v.querySelectorAll('source:not([media])').forEach((s) => s.remove());
      v.load();
    });
  }
  if (clips.length) {
    if (reduce) {
      // видео-мост фоновый: плеер на нём не показываем, остаётся постер
      clips.forEach((v) => { if (!v.hasAttribute('data-most')) v.setAttribute('controls', ''); });
    } else {
      // play() сам догружает ролик: при preload="metadata" ждать canplay бессмысленно
      const play = (v) => {
        const p = v.play();
        // если браузер запретил автозапуск — отдаём управление пользователю
        p && p.catch(() => { if (!v.hasAttribute('data-most')) v.setAttribute('controls', ''); });
      };
      const clipWatcher = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) play(entry.target);
          else if (!entry.target.paused) entry.target.pause();
        });
      }, { rootMargin: '150px 0px', threshold: 0.2 });
      clips.forEach((v) => clipWatcher.observe(v));
      // пока вкладка скрыта, наблюдатель молчит — после возврата запускаем видимые ролики сами
      document.addEventListener('visibilitychange', () => {
        if (document.hidden) return;
        clips.forEach((v) => {
          const r = v.getBoundingClientRect();
          if (r.bottom > 0 && r.top < window.innerHeight) play(v);
        });
      });
    }
  }

  /* ---- просмотр ролика во весь экран ---- */
  if (clips.length) {
    const box = document.createElement('div');
    box.className = 'lightbox';
    box.setAttribute('role', 'dialog');
    box.setAttribute('aria-modal', 'true');
    box.setAttribute('aria-label', 'Просмотр видео');
    box.innerHTML = '<button type="button" class="lightbox-close" aria-label="Закрыть"><svg class="ic" aria-hidden="true"><use href="#i-x"/></svg></button><div class="lightbox-cap"></div>';
    document.body.appendChild(box);
    const cap = box.querySelector('.lightbox-cap');
    let shown = null;

    const close = () => {
      if (!shown) return;
      shown.pause();
      shown.remove();
      shown = null;
      box.classList.remove('is-open');
      document.body.classList.remove('modal-open');
    };
    const open = (source, caption, ratio) => {
      close();
      const v = document.createElement('video');
      // до загрузки метаданных video занимает 300×150 — резервируем место под кадр,
      // иначе при открытии вёрстка подскакивает
      if (ratio) {
        v.style.aspectRatio = ratio;
        v.style.width = '100%';
        v.addEventListener('loadedmetadata', () => { v.style.aspectRatio = ''; v.style.width = ''; }, { once: true });
      }
      v.src = source;
      v.controls = true;
      v.loop = true;
      v.playsInline = true;
      v.muted = true;            // в роликах нет звуковой дорожки
      v.autoplay = true;
      box.insertBefore(v, cap);
      shown = v;
      cap.textContent = caption || '';
      box.classList.add('is-open');
      document.body.classList.add('modal-open');
      v.play().catch(() => {});
      box.querySelector('.lightbox-close').focus();
    };

    clips.forEach((v) => {
      const card = v.closest('.photo');
      if (!card) return;
      card.classList.add('is-zoomable');
      if (!card.dataset.cursorLabel) card.dataset.cursorLabel = 'Смотреть';
    });

    // слушаем на документе: лента перехватывает указатель при перетаскивании,
    // и клик приходит на неё, а не на карточку
    document.addEventListener('click', (e) => {
      if (box.contains(e.target)) return;
      let card = e.target.closest && e.target.closest('.photo.is-zoomable');
      if (!card) {
        const under = document.elementFromPoint(e.clientX, e.clientY);
        card = under && under.closest ? under.closest('.photo.is-zoomable') : null;
      }
      if (!card) return;
      const v = card.querySelector('video');
      if (!v) return;
      // в полном размере показываем версию для больших экранов, а не облегчённую мобильную
      const full = card.querySelector('source:not([media])');
      const ratio = v.videoWidth && v.videoHeight ? v.videoWidth + ' / ' + v.videoHeight : '';
      open((full && full.getAttribute('src')) || v.currentSrc, card.querySelector('.photo-cap')?.textContent.trim(), ratio);
    });

    box.addEventListener('click', (e) => { if (e.target === box || e.target.closest('.lightbox-close')) close(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') close(); });
  }

  /* ---- слайдер «до/после» ---- */
  document.querySelectorAll('.ba').forEach((ba) => {
    const range = ba.querySelector('input[type=range]');
    if (!range) return;
    const set = () => ba.style.setProperty('--pos', range.value + '%');
    range.addEventListener('input', set);
    set();
  });

  /* ---- фильтр кейсов ---- */
  const filter = document.querySelector('.filter');
  if (filter) {
    const cards = document.querySelectorAll('[data-tags]');
    filter.addEventListener('click', (e) => {
      const btn = e.target.closest('button');
      if (!btn) return;
      filter.querySelectorAll('button').forEach((b) => b.classList.toggle('is-active', b === btn));
      const key = btn.dataset.filter;
      cards.forEach((c) => {
        const show = key === 'all' || c.dataset.tags.split(' ').includes(key);
        c.style.display = show ? '' : 'none';
      });
    });
  }

  /* ---- маска телефона РБ: +375 (__) ___-__-__ ---- */
  window.applyByMask = function (input) {
    const fmt = (v) => {
      let d = v.replace(/\D/g, '');
      if (d.startsWith('375')) d = d.slice(3);
      else if (d.startsWith('80')) d = d.slice(2);
      d = d.slice(0, 9);
      let out = '+375';
      if (d.length > 0) out += ' (' + d.slice(0, 2);
      if (d.length >= 2) out += ')';
      if (d.length > 2) out += ' ' + d.slice(2, 5);
      if (d.length > 5) out += '-' + d.slice(5, 7);
      if (d.length > 7) out += '-' + d.slice(7, 9);
      return out;
    };
    input.addEventListener('focus', () => { if (!input.value) input.value = '+375 ('; });
    input.addEventListener('input', () => { input.value = fmt(input.value); });
    input.addEventListener('blur', () => { if (input.value === '+375 (' || input.value === '+375') input.value = ''; });
    input.isComplete = () => input.value.replace(/\D/g, '').length === 12;
  };

  /* ---- первый экран: содержимое гаснет и уходит вверх по мере прокрутки ---- */
  const heroBlock = document.querySelector('.hero, .hero-sub');
  const heroInner = heroBlock && heroBlock.querySelector('.hero-inner');
  if (heroInner && !reduce) {
    let ticking = false;
    const fade = () => {
      ticking = false;
      const range = heroBlock.offsetHeight * 0.7 || 1;
      const p = Math.min(1, Math.max(0, window.scrollY / range));
      heroInner.style.opacity = String(1 - p);
      heroInner.style.transform = p ? 'translateY(' + (-48 * p).toFixed(1) + 'px)' : '';
    };
    window.addEventListener('scroll', () => { if (!ticking) { ticking = true; requestAnimationFrame(fade); } }, { passive: true });
    fade();
  }


  /* ---- кнопка «наверх» ---- */
  const toTop = document.createElement('button');
  toTop.type = 'button'; toTop.className = 'to-top'; toTop.setAttribute('aria-label', 'Наверх');
  toTop.innerHTML = '<svg class="ic" aria-hidden="true"><use href="#i-chevron-down"/></svg>';
  document.body.appendChild(toTop);
  const onTop = () => toTop.classList.toggle('is-visible', window.scrollY > 600);
  onTop();
  window.addEventListener('scroll', onTop, { passive: true });
  toTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' }));

  /* ---- фирменный курсор: латунная точка и кольцо, только для мыши ---- */
  if (window.matchMedia('(pointer: fine)').matches && !reduce && window.gsap) {
    const html = document.documentElement;
    html.classList.add('has-cursor');
    const dot = document.createElement('div'); dot.className = 'cursor-dot';
    const ring = document.createElement('div'); ring.className = 'cursor-ring';
    const label = document.createElement('span'); label.className = 'cursor-label'; ring.appendChild(label);
    document.body.append(dot, ring);
    const xD = gsap.quickTo(dot, 'x', { duration: 0.08, ease: 'power3' }), yD = gsap.quickTo(dot, 'y', { duration: 0.08, ease: 'power3' });
    const xR = gsap.quickTo(ring, 'x', { duration: 0.32, ease: 'power3' }), yR = gsap.quickTo(ring, 'y', { duration: 0.32, ease: 'power3' });
    window.addEventListener('pointermove', (e) => { xD(e.clientX); yD(e.clientY); xR(e.clientX); yR(e.clientY); html.classList.add('cursor-visible'); }, { passive: true });
    const hideCursor = () => html.classList.remove('cursor-visible');
    document.addEventListener('mouseleave', hideCursor);
    window.addEventListener('blur', hideCursor);
    document.addEventListener('visibilitychange', () => { if (document.hidden) hideCursor(); });
    document.addEventListener('mouseover', (e) => {
      const t = e.target.closest('[data-cursor-label]');
      const i = e.target.closest('a,button,label,[role=button],input[type=range],.opt');
      const txt = e.target.closest('input:not([type=range]),textarea,select');
      ring.classList.toggle('is-label', !!t); label.textContent = t ? t.dataset.cursorLabel : '';
      ring.classList.toggle('is-active', !!i && !t);
      html.classList.toggle('cursor-text', !!txt);
    });
    document.addEventListener('pointerdown', () => ring.classList.add('is-down'));
    document.addEventListener('pointerup', () => ring.classList.remove('is-down'));
  }

  /* ---- появление блоков (GSAP + ScrollTrigger) ---- */
  if (!reduce && window.gsap && window.ScrollTrigger) {
    gsap.registerPlugin(ScrollTrigger);
    // первый экран: оркестрованный вход
    const heroEls = document.querySelectorAll('[data-hero-seq]');
    if (heroEls.length) {
      gsap.from(heroEls, { y: 28, opacity: 0, duration: 1.1, ease: 'power3.out', stagger: 0.12, delay: 0.15 });
    }
    // остальные блоки: мягкий подъём при скролле
    document.querySelectorAll('[data-reveal]').forEach((el) => {
      const children = el.dataset.reveal === 'stagger' ? Array.from(el.children) : [el];
      gsap.from(children, {
        y: 34, opacity: 0, duration: 1, ease: 'power3.out', stagger: 0.1,
        scrollTrigger: { trigger: el, start: 'top 86%', once: true }
      });
    });
    // прогресс прокрутки — тонкая латунная линия сверху
    const bar = document.createElement('div'); bar.className = 'scroll-progress'; document.body.appendChild(bar);
    gsap.to(bar, { scaleX: 1, ease: 'none', scrollTrigger: { start: 0, end: 'max', scrub: 0.3 } });
    // параллакс фотографий
    document.querySelectorAll('[data-parallax]').forEach((el) => {
      const s = parseFloat(el.dataset.parallax) || 7;
      gsap.fromTo(el, { yPercent: -s }, { yPercent: s, ease: 'none', scrollTrigger: { trigger: el.parentElement, start: 'top bottom', end: 'bottom top', scrub: true } });
    });
    // крупные номера секций слегка «въезжают» слева; на узких экранах сдвиг меньше — иначе цифра срезается полем
    const numShift = window.matchMedia('(max-width: 767px)').matches ? -12 : -28;
    document.querySelectorAll('.section-index .num').forEach((el) => {
      gsap.fromTo(el, { x: numShift, opacity: 0.25 }, { x: 0, opacity: 1, ease: 'none', scrollTrigger: { trigger: el, start: 'top 95%', end: 'top 55%', scrub: 0.5 } });
    });
    // счётчики цифр (только целые числа без диапазонов)
    document.querySelectorAll('.spec-val, .stat .num').forEach((el) => {
      const node = Array.from(el.childNodes).find((n) => n.nodeType === 3 && /\d/.test(n.nodeValue));
      const m = node && node.nodeValue.match(/^(\s*)(\d+)(?![\d,.\u2013-])(.*)$/);
      if (!m) return;
      const obj = { v: 0 };
      gsap.to(obj, { v: +m[2], duration: 1.4, ease: 'power2.out', scrollTrigger: { trigger: el, start: 'top 92%', once: true }, onUpdate() { node.nodeValue = m[1] + Math.round(obj.v) + m[3]; } });
    });
    // линия шагов «прорисовывается» по мере прокрутки
    document.querySelectorAll('.steps').forEach((wrap) => {
      const line = wrap.querySelector('.step-line');
      if (line) gsap.fromTo(line, { scaleY: 0 }, { scaleY: 1, ease: 'none', scrollTrigger: { trigger: wrap, start: 'top 75%', end: 'bottom 60%', scrub: 0.4 } });
    });
  }
})();
