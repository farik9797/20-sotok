/* Конфиг 1:1 с инлайновым tailwind.config макета (Play CDN 3.4.17). */
module.exports = {
  content: [
    './wp-theme/sotok20/**/*.php',
    './wp-theme/sotok20/assets/js/main.js',
    './wp-theme/sotok20/assets/js/quiz.js',
  ],
  theme: {
    extend: {
      colors: {
        ink: { DEFAULT: '#2A2F35', 2: '#23272C', 3: '#343A41' },
        stone: { DEFAULT: '#EAE6DF', 2: '#F4F4F2' },
        fir: { DEFAULT: '#2B4236', 2: '#365243' },
        brass: { DEFAULT: '#B8860B', 2: '#B8860B' },
      },
      fontFamily: {
        display: ['Manrope', 'system-ui', 'sans-serif'],
        body: ['"Golos Text"', 'system-ui', 'sans-serif'],
      },
    },
  },
};
