/* s20-policy-start — «политикой конфиденциальности» у формы открывает /politika.html во всплывающем окне */
jQuery(function ($) {
  var url = '/politika.html';
  var $spans = $('span').filter(function () {
    return $.trim($(this).text()) === 'политикой конфиденциальности' && !$(this).closest('a').length;
  });
  if (!$spans.length) return;
  $spans.wrapInner('<a href="' + url + '" class="s20-policy-link"></a>');

  var dialog = null, loading = false;
  function show() {
    document.documentElement.classList.add('s20-policy-open');
    dialog.querySelector('.s20-policy-box').scrollTop = 0;
    dialog.showModal();
  }
  // без <dialog> или fetch ссылка просто откроет страницу политики
  if (!window.HTMLDialogElement || !window.fetch || !window.DOMParser) return;
  $(document).on('click', '.s20-policy-link', function (e) {
    e.preventDefault();
    if (dialog) return show();
    if (loading) return;
    loading = true;
    fetch(url).then(function (r) {
      if (!r.ok) throw new Error(r.status);
      return r.text();
    }).then(function (html) {
      var article = new DOMParser().parseFromString(html, 'text/html').getElementById('s20-policy');
      if (!article) throw new Error('no policy');
      dialog = $('<dialog class="s20-policy-dialog" aria-labelledby="s20-policy-title">' +
        '<button type="button" class="s20-policy-close" aria-label="Закрыть"><span class="fa fa-times" aria-hidden="true"></span></button>' +
        '<div class="s20-policy-box"></div></dialog>').appendTo('body')[0];
      dialog.querySelector('.s20-policy-box').appendChild(document.importNode(article, true));
      dialog.querySelector('.s20-policy-close').addEventListener('click', function () { dialog.close(); });
      // клик по затемнению вокруг окна закрывает его
      dialog.addEventListener('click', function (ev) { if (ev.target === dialog) dialog.close(); });
      dialog.addEventListener('close', function () { document.documentElement.classList.remove('s20-policy-open'); });
      show();
    }).catch(function () {
      location.href = url;
    }).then(function () {
      loading = false;
    });
  });
});
/* s20-policy-end */
