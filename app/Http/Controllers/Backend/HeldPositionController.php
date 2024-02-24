<?php

namespace App\Http\Controllers\Backend;

use App\Exports\HeldPositionExport;
use App\Http\Controllers\Controller;
use App\Imports\HeldPositionImport;
use App\Models\HeldPosition;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HeldPositionController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $held_positions = HeldPosition::latest()->get();
        return view('backend.held_positions.all_position', compact('held_positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.held_positions.add_position');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:held_positions|max:200',
        ]);


        HeldPosition::insert([
            'name' => $request->name,
            'held_slug' => strtolower(str_replace(' ', '-', $request->name)),

        ]);
        $notification = array(
            'message' => 'Held Position ThemeAdded Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(HeldPosition $held_positions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeldPosition $held_position)
    {
        return view('backend.held_positions.edit_position', compact('held_position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeldPosition $held_position)
    {
        //
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);

        $held_position->update([
            'name' => $request->name,
            'held_slug' => strtolower(str_replace(' ', '-', $request->name)),
        ]);
        $notification = array(
            'message' => 'Held Position Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    
    /**
     * Import data from a CSV file into the database
     */
    public function ImportHeldPosition()
    {

        return view('backend.held_positions.import_position');
    }
    // End Method 
    /**
     * Export data from a CSV file into the database
     */
    public function Export()
    {
        return Excel::download(new HeldPositionExport, 'held_positions.xlsx');
    }
    // End Method 
    /**
     * Upload CSV file for import data into the database
     */
    public function Import(Request $request)
    {

        Excel::import(new HeldPositionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Held Position Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 
    // End Method 
}
