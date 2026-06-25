<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use Illuminate\View\View;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index(NewsRepository $news): View
    {   
   
   
    $contact = [
        'location' => 'site.contact.location',
        'email' => 'info@life-org.org',
        'phone' => '+970 599 000 000',
    ];

    $donation_categories = [
        'general',
        'emergency',
        'orphan',
        'education',
        'health',
    ];

    

    

    $hero_slides = [
        [
            'image' => 'images/hero-1.jpg',
            'title_key' => 'site.hero.title',
            'title_highlight_key' => 'site.hero.title_highlight',
            'subtitle_key' => 'site.hero.subtitle',
        ],
        [
            'image' => 'images/hero-2.jpg',
            'title_key' => 'site.hero.slide2_title',
            'title_highlight_key' => 'site.hero.slide2_highlight',
            'subtitle_key' => 'site.hero.slide2_subtitle',
        ],
        [
            'image' => 'images/hero-3.jpg',
            'title_key' => 'site.hero.slide3_title',
            'title_highlight_key' => 'site.hero.slide3_highlight',
            'subtitle_key' => 'site.hero.slide3_subtitle',
        ],
    ];

    $stats = [
        ['icon' => 'heart-hand', 'value' => '500+', 'count' => 500, 'suffix' => '+', 'label_key' => 'site.stats.volunteers'],
        ['icon' => 'globe', 'value' => '15', 'count' => 15, 'label_key' => 'site.stats.countries'],
        ['icon' => 'clipboard-check', 'value' => '120+', 'count' => 120, 'suffix' => '+', 'label_key' => 'site.stats.projects'],
        ['icon' => 'users', 'value' => '50,000+', 'count' => 50000, 'suffix' => '+', 'label_key' => 'site.stats.beneficiaries'],
    ];

    $programs = [
        ['icon' => 'siren', 'title_key' => 'site.programs.emergency'],
        ['icon' => 'baby', 'title_key' => 'site.programs.orphan'],
        ['icon' => 'shield', 'title_key' => 'site.programs.protection'],
        ['icon' => 'heart-pulse', 'title_key' => 'site.programs.health'],
        ['icon' => 'book-open', 'title_key' => 'site.programs.education'],
        ['icon' => 'utensils', 'title_key' => 'site.programs.food'],
    ];

    $projects = [
        [
            'image' => 'images/project-1.jpg',
            'title_key' => 'site.projects.project1_title',
            'location_key' => 'site.projects.location_yemen',
            'progress' => 75,
        ],
        [
            'image' => 'images/project-2.jpg',
            'title_key' => 'site.projects.project2_title',
            'location_key' => 'site.projects.location_jordan',
            'progress' => 60,
        ],
        [
            'image' => 'images/project-3.jpg',
            'title_key' => 'site.projects.project3_title',
            'location_key' => 'site.projects.location_gaza',
            'progress' => 45,
        ],
    ];

    $impact_steps = [
        ['icon' => 'heart', 'title_key' => 'site.impact.step1_title', 'desc_key' => 'site.impact.step1_desc'],
        ['icon' => 'users', 'title_key' => 'site.impact.step2_title', 'desc_key' => 'site.impact.step2_desc'],
        ['icon' => 'sparkles', 'title_key' => 'site.impact.step3_title', 'desc_key' => 'site.impact.step3_desc'],
    ];

    $partners= [
        ['name' => 'UNICEF', 'logo' => 'images/partners/unicef.svg'],
        ['name' => 'UNDP', 'logo' => 'images/partners/undp.svg'],
        ['name' => 'WFP', 'logo' => 'images/partners/wfp.svg'],
        ['name' => 'Qatar Charity', 'logo' => 'images/partners/qc.svg'],
        ['name' => 'IsDB', 'logo' => 'images/partners/isdb.svg'],
        ['name' => 'ICRC', 'logo' => 'images/partners/icrc.svg'],
    ];


        // $stats = $arr['stats'];
        // $programs = $arr['programs'];
        // $projects = $arr['projects'];
        // $partners = $arr['partners'];
        // $hero_slides = $arr['hero_slides'];
        // $impact_steps = $arr['impact_steps'];

        return view('home', [
            'stats' => $stats,
            'programs' => $programs,
            'projects' => $projects,
            'news' => $news->featured(4),
            'partners' => $partners,
            'heroSlides' => $hero_slides,
            'impactSteps' => $impact_steps,
        ]);
    }
}
