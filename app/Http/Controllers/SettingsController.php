<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SetTheme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function index(): View
    {
        return view('settings.index', [
            'themes' => config('themes.themes'),
            'currentTheme' => session('theme', config('themes.default')),
        ]);
    }

    public function updateTheme(Request $request): RedirectResponse
    {
        $supported = SetTheme::supported();

        $validated = $request->validate([
            'theme' => ['required', 'in:'.implode(',', $supported)],
        ]);

        session(['theme' => $validated['theme']]);

        return redirect()
            ->route('settings.index')
            ->with('success', __('site.settings.theme_updated'));
    }
}
