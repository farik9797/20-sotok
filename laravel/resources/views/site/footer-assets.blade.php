{{-- То, что тема выводит через wp_footer(): предзагрузка ссылок, GSAP, данные для квиза, скрипты макета --}}
<script type="speculationrules">
{"prefetch":[{"source":"document","where":{"and":[{"href_matches":"/*"},{"not":{"href_matches":["/admin/*","/uploads/*","/assets/*","/*\\?(.+)"]}},{"not":{"selector_matches":"a[rel~=\"nofollow\"]"}},{"not":{"selector_matches":".no-prefetch, .no-prefetch a"}}]},"eagerness":"conservative"}]}
</script>
<script id="gsap-js" src="{{ s20_a() }}js/vendor/gsap.min.js?ver=3.12.5"></script>
<script id="gsap-scrolltrigger-js" src="{{ s20_a() }}js/vendor/ScrollTrigger.min.js?ver=3.12.5"></script>
<script id="s20-main-js-before">
window.S20={!! json_encode(['privacy' => s20_url('politika'), 'lead' => url('/lead'), 'phone' => s20_c('phone'), 'tel' => s20_c('tel')], JSON_HEX_TAG | JSON_HEX_AMP) !!};
</script>
<script id="s20-main-js" src="{{ s20_a() }}js/main.js?ver={{ \App\Support\Site::version() }}"></script>
<script id="s20-quiz-js" src="{{ s20_a() }}js/quiz.js?ver={{ \App\Support\Site::version() }}"></script>
