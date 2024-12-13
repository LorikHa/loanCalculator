<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Retrieve the locale from the session or default to 'en'
        $locale = session('locale', config('app.locale'));

        // Set the application's locale
        App::setLocale($locale);

        return $next($request);
    }
}
