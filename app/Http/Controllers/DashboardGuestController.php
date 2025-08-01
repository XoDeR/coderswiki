<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardGuestController extends Controller
{
    /**
     * Display the guest dashboard
     *
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        return Inertia::render('Dashboard/Guest/Index', [
            // 'filteredArticles' => new ArticleCollection(Article::all()->load(['tags', 'blocks'])),
            // 'allTags' => new ArticleTagCollection(ArticleTag::all()->load(['articles'])),
            // 'selectedTags' => new ArticleTagCollection(ArticleTag::selected()->load(['articles'])),
        ]);
    }
}
