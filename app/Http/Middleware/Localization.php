<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = config('app.locale');

        // Check header request and determine localizaton
        if ($request->hasHeader('Content-Language')) {
            // Check localization is configured in the application
            if (Language::where('code', $request->header('Content-Language'))->exists())
                $locale = $request->header('Content-Language');
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
