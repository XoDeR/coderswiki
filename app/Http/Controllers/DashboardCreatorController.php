<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $selectedTagIds = $user->selectedTags->pluck('id');

        $filteredArticles = Article::whereHas('tags', function ($query) use ($selectedTagIds) {
            $query->whereIn('tags.id', $selectedTagIds);
        })->get();

        return Inertia::render('Dashboard/Creator/Index', [
            // 'filteredArticles' => new ArticleCollection(Article::all()->load(['tags', 'blocks'])),
            // 'allTags' => new ArticleTagCollection(ArticleTag::all()->load(['articles'])),
            // 'selectedTags' => new ArticleTagCollection(ArticleTag::selected()->load(['articles'])),
        ]);
    }
}
