<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(NewsRepository $news): View
    {
        return view('home', [
            'stats' => config('site.stats'),
            'programs' => config('site.programs'),
            'projects' => config('site.projects'),
            'news' => $news->featured(4),
            'partners' => config('site.partners'),
            'heroSlides' => config('site.hero_slides'),
            'impactSteps' => config('site.impact_steps'),
        ]);
    }
}
