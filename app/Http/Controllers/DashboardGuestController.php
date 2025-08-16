<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
        // Get all articles that have at least one of the selected tags

        $selectedTags = session('selected_tags', []);

        $filteredArticles = Article::whereHas('tags', function ($query) use ($selectedTags) {
            $query->whereIn('tags.uuid', $selectedTags);
        })->get();

        return Inertia::render('Dashboard/Guest/Index', [
            // 'filteredArticles' => new ArticleCollection(Article::all()->load(['tags', 'blocks'])),
            // 'allTags' => new ArticleTagCollection(ArticleTag::all()->load(['articles'])),
            // 'selectedTags' => new ArticleTagCollection(ArticleTag::selected()->load(['articles'])),
        ]);
    }
}
