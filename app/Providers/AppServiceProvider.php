<?php

namespace App\Providers;

use App\Services\DwtServices;
use App\View\Composers\KpiKeyComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   
        if(config('app.env') === 'production') {

            \URL::forceScheme('https');
        }

        View::composer(
            ['template.components.KeyIndex.elementCardMini'],
            KpiKeyComposer::class
        );
    }
}
