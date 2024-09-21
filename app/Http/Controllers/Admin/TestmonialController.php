<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testmonial;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestmonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testmonials = Testmonial::get();
        $trashedtestmonials = Testmonial::onlyTrashed()->get();

        return view('admin.testimonials.index', compact('testmonials', 'trashedtestmonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $testmonial = $request->validate([
            'name' => 'required|string|max:100',
            'jobTitle' => 'required|string|max:100',
            'comment' => 'required|string|max:200',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'published' => 'required|boolean',

        ]);
        $testmonial['image'] = $this->uploadFile($request->image, 'admin/assets/images/testimonials');
        Testmonial::create($testmonial);

        // return "data entered successfully";

        return redirect()->route('testmonials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonial = DB::table('testmonials')
            ->where('id', '=', $id)
            ->first();
        // requires modification

        return view('admin.testimonials.testimonialdetails', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testmonial = Testmonial::findOrFail($id);
        // dd($testmonial);
        return view('admin.testimonials.edit', compact('testmonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testmonial = $request->validate([
            'name' => 'required|string|max:100',
            'jobTitle' => 'required|string|max:100',
            'comment' => 'required|string|max:200',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'published' => 'required|boolean',
        ]);
        if ($request->hasFile('image')) {
            $testmonial['image'] = $this->uploadFile($request->image, 'admin/assets/images/testimonials');
        }

        Testmonial::where('id', $id)->update($testmonial);

        //return "data updated successfully";
        return redirect()->route('testmonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testmonial::where('id', $id)->delete();

        return redirect()->route('testmonials.index');
    }

    public function restore(string $id)
    {
        Testmonial::where('id', $id)->restore();

        return redirect()->route('testmonials.index');
    }

    public function forcedelete(string $id)
    {

        Testmonial::where('id', $id)->forcedelete();

        return redirect()->route('testmonials.index');
    }

}
