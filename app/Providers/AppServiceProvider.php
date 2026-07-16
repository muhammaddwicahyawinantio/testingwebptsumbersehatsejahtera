<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        // Memaksa HTTPS jika environment adalah production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Otomatis buat folder livewire-tmp jika hilang (volume Railway kosong saat pertama mount)
        $livewireTmpPath = storage_path('app/livewire-tmp');
        if (! file_exists($livewireTmpPath)) {
            @mkdir($livewireTmpPath, 0775, true);
        }

        // Buat symlink public/storage otomatis karena filesystem container ephemeral
        if (! file_exists(public_path('storage'))) {
            app('files')->link(storage_path('app/public'), public_path('storage'));
        }
    }
}
