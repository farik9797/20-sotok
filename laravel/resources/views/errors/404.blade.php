@include('site.header')
<section class="section">
  <div class="wrap">
    <div class="section-index"><span class="num">404</span><span class="eyebrow">Страница не найдена</span></div>
    <h1 class="h2">Такой страницы на сайте нет</h1>
    <p class="lead muted mt-6">Возможно, адрес изменился после обновления сайта. Начните с главной или посмотрите услуги.</p>
    <div class="mt-10 flex flex-wrap gap-3">
      <a class="btn btn-brass" href="{{ s20_url('') }}">На главную</a>
      <a class="btn btn-ghost" href="{{ s20_url('uslugi') }}">Услуги</a>
    </div>
  </div>
</section>
@include('site.footer', ['preselect' => ''])
