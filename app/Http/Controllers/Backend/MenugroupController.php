<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Menugroup;
use Illuminate\Http\Request;

class MenugroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menugroup = Menugroup::all();
        return view('backend.menugroup.all_menugroup', compact('menugroup'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $menugroup = Menugroup::all();
        return view('backend.menugroup.add_menugroup', compact('menugroup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' =>'required|unique:menugroups|max:255',
        ]);
        

        Menugroup::insert([
            'title' => $request->title,
            
        ]);
        $notification = array(
            'message' => 'Menu Group Title Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menugroup $menugroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menugroup $menugroup)
    {
        return view('backend.menugroup.edit_menugroup', compact('menugroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menugroup $menugroup)
    {
        $validated = $request->validate([
            'title' => 'required|unique:menugroups|max:255',
        ]);

        $menugroup->update([
            'title' => $request->title,           
        ]);
        $notification = array(
            'message' => 'Menu Group Title Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menugroup $menugroup)
    {
        //
    }
}
