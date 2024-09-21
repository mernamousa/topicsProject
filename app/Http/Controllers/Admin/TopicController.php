<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;
use App\Traits\Common;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::with('category')->get();
        return view('admin.topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'category_name')->get();
        return view('admin.topics.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $topic = $request->validate([
            'topicTitle' => 'required|string|max:100',
            'content' => 'required|string',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'published' => 'boolean',
            'NoOfViews' => 'required|numeric',
            'trending' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ]);
        //$topic['NoOfViews']= 1;
        if (isset($data['published'])) {
            $data['published'] = 1;
        } else {
            $data['published'] = 0;
        }
        if (isset($data['trending'])) {
            $data['trending'] = 1;
        } else {
            $data['trending'] = 0;
        }
        $topic['image'] = $this->uploadFile($request->image, 'admin/assets/images/topics');
        Topic::create($topic);
        return redirect()->route('topics.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic = Topic::findOrFail($id);
        //$categories= Category::select('id','category_name')->get();
        //  dd($topic );
        return view('admin.topics.topic_details', compact('topic' /* ,'categories' */));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::findOrFail($id);
        $categories = Category::select('id', 'category_name')->get();

        //  dd($topic );
        return view('admin.topics.edit', compact('topic', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic = $request->validate([
            'topicTitle' => 'required|string|max:100',
            'content' => 'required|string',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'published' => 'boolean',
            'NoOfViews' => 'required|numeric',
            'trending' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($request->hasFile('image')) {
            $topic['image'] = $this->uploadFile($request->image, 'admin/assets/images/topics');
        }

        Topic::where('id', $id)->update($topic);

        //return "data updated successfully";
        return redirect()->route('topics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Topic::where('id', $id)->delete();

        return redirect()->route('topics.index');
    }
}
