import mix from 'laravel-mix';

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/css/app.scss', 'public/css')
   .sourceMaps();
