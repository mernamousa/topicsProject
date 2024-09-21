<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Testmonial;
use App\Models\Topic;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::with([
            'topics' => function ($query) {
                $query->where('published', 1)->take(3)->latest();
            }])
            ->limit(4)
            ->latest()
            ->get();
        // dd($categories);
        $testmonials = Testmonial::orderBy('id', 'desc')->limit(3)->where('published', 1)->get();
        $featuredSectionTopic1 = Topic::orderBy('id', 'desc')->limit(1)->where('published', 1)->get();
        $featuredSectionTopic2 = Topic::where('published', 1)->latest()->skip(1)->take(1)->get();

        return view('public.pages.index', compact('categories', 'featuredSectionTopic1', 'featuredSectionTopic2', 'testmonials'));
    }

    public function topic_show(string $id)
    {
        $topic = Topic::findOrFail($id);
        return view('public.pages.topic_detail', compact('topic'));
    }

    /*   public function incrementViews($id)
    {
    $article = Topic::findOrFail($id);
    $article->increment('views'); // Increment the 'views' column by 1
    return response()->json(['views' => $article->views]);
    } */
    public function topics_listing()
    {
        $listeningTopics = Topic::where('published', 1)
            ->paginate(3);

        $lisTrendingTopics = Topic::orderBy('id', 'desc')
            ->limit(1)
            ->where('published', 1)
            ->where('trending', 1)
            ->get();

        $lisTrendingTopic2 = Topic::orderBy('id', 'desc')
            ->where('published', 1)
            ->where('trending', 1)
            ->skip(1)->take(1)->get();
        //dd($lisTrendingTopic2);
        return view('public.pages.listening', compact('listeningTopics', 'lisTrendingTopics', 'lisTrendingTopic2'));
    }

    public function testmonials_show()
    {
        $testmonials = Testmonial::orderBy('id', 'desc')->limit(3)->where('published', 1)->get();
        return view('public.pages.testmonials', compact('testmonials'));

    }

}
