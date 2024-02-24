<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Social;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socials = Social::all();
        return view('backend.social.all_social', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.social.add_social');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:socials|max:200',            
        ]);
        

        Social::insert([
            'title' => $request->title,
            'url' => $request->url,
            'class' => $request->class,            
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Social Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Social $social)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Social $social)
    {
        return view('backend.social.edit_social', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Social $social)
    {
       // dd($request);
        $validated = $request->validate([
            'title' => 'required|max:200',
        ]);
        
        $social->update([
            'title' => $request->title,
            'url' => $request->url,
            'class' => $request->class,
            'status' => $request->status,
        ]);
        $notification = array(
            'message' => 'Social Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

   
}
