<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(NewsRepository $news): View
    {
        return view('news.index', [
            'newsItems' => $news->paginate(),
        ]);
    }

    public function show(string $slug, NewsRepository $news): View
    {
        $article = $news->findBySlug($slug);

        if (! $article) {
            abort(404);
        }

        return view('news.show', [
            'article' => $article,
            'relatedNews' => $news->related($article),
        ]);
    }
}
