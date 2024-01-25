<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Blogtag;
use Illuminate\Http\Request;

class BlogtagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Blogtag::latest()->get(['id', 'tag_name', 'tag_slug']);
        return view(
            'backend.blog_tag.all_tag',
            compact('tags')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blog_tag.add_tag');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tag_name' => 'required|unique:Blogtags|max:200',
        ]);

        Blogtag::insert([
            'tag_name' => $request->tag_name,
            'tag_slug' => strtolower(str_replace(' ', '-', $request->tag_name)),
        ]);

        $notification = array(
            'message' => 'Tag Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogtag $blogtag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogtag $blogtag)
    {
        return view('backend.blog_tag.edit_tag', compact('blogtag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blogtag $blogtag)
    {
        $validated = $request->validate([
            'tag_name' => 'required|max:200',
        ]);

        $blogtag->update([
            'tag_name' => $request->tag_name,
            'tag_slug' => strtolower(str_replace(' ', '-', $request->tag_name)),

        ]);
        $notification = array(
            'message' => 'tag Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogtag $blogtag)
    {

        $blogtag->delete();
        $notification = array(
            'message' => 'Tag Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function delete(Request $request)
    {
        $blogtag = Blogtag::find($request->id);

        $blogtag->delete();
        $notification = array(
            'message' => 'Tag Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
