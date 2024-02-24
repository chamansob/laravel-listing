<?php

namespace App\Http\Controllers\Backend;

use App\Exports\CanProvideExport;
use App\Http\Controllers\Controller;
use App\Imports\CanProvideImport;
use Illuminate\Http\Request;
use App\Models\CanProvide;
use App\Traits\CommonTrait;
use Maatwebsite\Excel\Facades\Excel;

class CanProvideController extends Controller
{
 use CommonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $can_provides = CanProvide::latest()->get();
        return view('backend.can_provides.all_provide', compact('can_provides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.can_provides.add_provide');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:can_provides|max:200',
        ]);


        canProvide::insert([
            'name' => $request->name,
            'provide_slug' => strtolower(str_replace(' ', '-', $request->name)),

        ]);
        $notification = array(
            'message' => 'Can Provide Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(CanProvide $can_provides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CanProvide $can_provide)
    {
        return view('backend.can_provides.edit_provide', compact('can_provide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CanProvide $can_provide)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);

        $can_provide->update([
            'name' => $request->name,
            'provide_slug' => strtolower(str_replace(' ', '-', $request->name)),
        ]);
        $notification = array(
            'message' => 'Can Provide Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    
    /**
     * Import data from a CSV file into the database
     */
    public function ImportCanProvide()
    {

        return view('backend.can_provides.import_provide');
    }
    // End Method 
    /**
     * Export data from a CSV file into the database
     */
    public function Export()
    {
        return Excel::download(new CanProvideExport, 'can_provides.xlsx');
    }
    // End Method 
    /**
     * Upload CSV file for import data into the database
     */
    public function Import(Request $request)
    {

        Excel::import(new CanProvideImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Can Provide Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method 
}
