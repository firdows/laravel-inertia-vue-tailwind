# Vue
https://laravel.com/docs/11.x/vite#vue

```
npm install --save-dev @vitejs/plugin-vue
```

vite.config.js
```
...
import vue from '@vitejs/plugin-vue';
 
...
plugins: [
    vue({
        template: {
            transformAssetUrls: {
                base: null,
                includeAbsolute: false,
            },
        },
    }),
]
```

# InertiaJs
## Server-side setup
```
composer require inertiajs/inertia-laravel
```

Config & user
```
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body>
    @inertia
</body>
</html>
```

Middleware
```
php artisan inertia:middleware
```
config
```
use App\Http\Middleware\HandleInertiaRequests;
...
->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        HandleInertiaRequests::class,
    ]);
})
```

## Client-side setup
```
npm install @inertiajs/vue3
```