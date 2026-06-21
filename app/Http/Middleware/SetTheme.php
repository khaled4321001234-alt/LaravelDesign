<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetTheme
{
    /** @return list<string> */
    public static function supported(): array
    {
        return array_keys(config('themes.themes', []));
    }

    public function handle(Request $request, Closure $next): Response
    {
        $theme = session('theme', config('themes.default'));
        $supported = self::supported();

        if (! in_array($theme, $supported, true)) {
            $theme = config('themes.default');
        }

        View::share('currentTheme', $theme);

        return $next($request);
    }
}
