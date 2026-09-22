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
  modal && modal.querySelectorAll('[data-quiz-close]').forEach((b) => b.addEventListener('click', closeQuiz));
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
  }
})();
