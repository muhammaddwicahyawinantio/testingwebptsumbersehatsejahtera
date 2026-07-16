<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
////SETLOCALE LARAVEL 12
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // 👇 Tambahan WAJIB untuk menerima Proxy (Load Balancer) dari Railway 👇
        $middleware->trustProxies(at: '*');

        // 👇 Pengecualian Maintenance Mode untuk Admin Filament dan Livewire 👇
        $middleware->preventRequestsDuringMaintenance(except: [
            'admin*',
            'livewire*',
        ]);

        // Pastikan class SetLocale benar-benar ada di folder App/Http/Middleware
        // Jika masih error, coba beri komentar (//) dulu pada baris di bawah ini
        $middleware->web(append: [
            SetLocale::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
