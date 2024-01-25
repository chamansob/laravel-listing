<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Blogcategory;
use Illuminate\Http\Request;

class BlogcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Blogcategory::latest()->get(['id', 'category_name', 'category_slug']);
        return view('backend.blogcategory.all_blogcategory', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blogcategory.add_blogcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:blogcategories|max:200',
        ]);

        Blogcategory::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'Blog Category Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogcategory $blogcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogcategory $blogcategory)
    {
        return view('backend.blogcategory.edit_blogcategory', compact('Blogcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blogcategory $blogcategory)
    {
        $validated = $request->validate([
            'category_name' => 'required|max:200',
        ]);

        $blogcategory->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),

        ]);
        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogcategory $blogcategory)
    {
        $blogcategory->delete();
        $notification = array(
            'message' => 'Blog Category Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function delete(Request $request)
    {
        $blogcat = Blogcategory::find($request->id);

        $blogcat->delete();
        $notification = array(
            'message' => 'Tag Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
