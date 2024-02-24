<?php

namespace App\Http\Controllers\Backend;

use App\Exports\CoachingMethodExport;
use App\Http\Controllers\Controller;
use App\Imports\CoachingMethodImport;
use App\Models\CoachingMethod;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CoachingMethodController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coachingmethod = CoachingMethod::latest()->get();
        return view('backend.coaching_method.all_method', compact('coachingmethod'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coaching_method.add_method');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:coaching_methods|max:200',
        ]);


        CoachingMethod::insert([
            'name' => $request->name,
            'method_slug' => strtolower(str_replace(' ', '-', $request->name)),
            
        ]);
        $notification = array(
            'message' => 'Coaching Method Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(CoachingMethod $coachingmethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CoachingMethod $coaching_method)
    {
        return view('backend.coaching_method.edit_method', compact('coaching_method'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CoachingMethod $coaching_method)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);

        $coaching_method->update([
            'name' => $request->name,
            'method_slug' => strtolower(str_replace(' ', '-', $request->name)),
        ]);
        $notification = array(
            'message' => 'Coaching Method Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    
    /**
     * Import data from a CSV file into the database
     */
    public function ImportCoachingMethod()
    {

        return view('backend.coaching_method.import_method');
    }
    // End Method 
    /**
     * Export data from a CSV file into the database
     */
    public function Export()
    {
        return Excel::download(new CoachingMethodExport, 'coahing_method.xlsx');
    }
    // End Method 
    /**
     * Upload CSV file for import data into the database
     */
    public function Import(Request $request)
    {

        Excel::import(new CoachingMethodImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Coaching Method Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 
    // End Method 
}
