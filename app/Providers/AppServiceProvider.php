<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if ($this->app->environment('local') && class_exists(\Laravel\Telescope\TelescopeServiceProvider::class)) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    public function boot(): void
    {
        // 1. Memaksa HTTPS jika environment adalah production
        if ($this->app->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // 2. Otomatis buat folder livewire-tmp jika hilang
        $livewireTmpPath = storage_path('app/livewire-tmp');
        if (!file_exists($livewireTmpPath)) {
            @mkdir($livewireTmpPath, 0775, true);
        }

        // 3. FIX PERMANEN VOLUME: Buat jembatan storage otomatis tanpa terminal
        if (!file_exists(public_path('storage'))) {
            app('files')->link(storage_path('app/public'), public_path('storage'));
        }

        // 4. Aturan Gate Akses Filament
        \Illuminate\Support\Facades\Gate::define('accessFilament', function ($user) {
            $allowed = array_filter(array_map('trim', explode(',', env('ADMIN_EMAILS', ''))));
            return in_array($user->email, $allowed, true);
        });
    }
}
