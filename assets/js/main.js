/* 20 соток — общие скрипты: навигация, появление блоков, слайдер «до/после», фильтр кейсов */
(function () {
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

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
    // крупные номера секций слегка «въезжают» слева
    document.querySelectorAll('.section-index .num').forEach((el) => {
      gsap.fromTo(el, { x: -28, opacity: 0.25 }, { x: 0, opacity: 1, ease: 'none', scrollTrigger: { trigger: el, start: 'top 95%', end: 'top 55%', scrub: 0.5 } });
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
