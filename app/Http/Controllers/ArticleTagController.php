<?php

namespace App\Http\Controllers;

use App\Models\ArticleTag;
use App\Http\Requests\StoreArticleTagRequest;
use App\Http\Requests\UpdateArticleTagRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleTagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleTag $articleTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticleTag $articleTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleTagRequest $request, ArticleTag $articleTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleTag $articleTag)
    {
        //
    }

    public function guestUpdateSelected(Request $request)
    {
        $validated = $request->validate([
            'tags' => 'array',
            'tags.*' => 'uuid',
        ]);

        session(['selected_tags' => $validated['tags']]);

        return redirect()->back();
    }

    public function updateSelected(Request $request)
    {
        $validated = $request->validate([
            'tags' => 'array',
            'tags.*' => 'uuid',
        ]);

        $user = Auth::user();
        if ($user) {
            $user->selectedTags()->sync($validated['tags']);
        }
    }
}
