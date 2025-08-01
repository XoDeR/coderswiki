<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardCreatorController extends Controller
{
    /**
     * Display the creator dashboard
     *
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        return Inertia::render('Dashboard/Creator/Index', [
            // 'filteredArticles' => new ArticleCollection(Article::all()->load(['tags', 'blocks'])),
            // 'allTags' => new ArticleTagCollection(ArticleTag::all()->load(['articles'])),
            // 'selectedTags' => new ArticleTagCollection(ArticleTag::selected()->load(['articles'])),
        ]);
    }
}
