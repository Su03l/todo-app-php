<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (request()->hasHeader('Host')) {
            $host = request()->getHost();
            $port = request()->getPort();
            $scheme = request()->getScheme();

            $url = $scheme . '://' . $host . ($port && !in_array($port, [80, 443]) ? ':' . $port : '');

            URL::forceRootUrl($url);

        }
    }
}
