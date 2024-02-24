<?php

namespace App\Http\Controllers\Backend;

use App\Exports\CoachExport;
use App\Http\Controllers\Controller;
use App\Imports\CoachImport;
use App\Models\Coach;
use Illuminate\Http\Request;
use App\Models\ImagePresets;
use App\Traits\CommonTrait;
use App\Traits\ImageGenTrait;
use Maatwebsite\Excel\Facades\Excel;

class CoachController extends Controller
{
    public $path = "upload/coach/thumbnail/";
    public $image_preset;
    public $image_preset_main;
    use ImageGenTrait;
    use CommonTrait;
    public function __construct()
    {
        $this->image_preset = ImagePresets::whereIn('id', [4])->get();
        $this->image_preset_main = ImagePresets::find(10);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coaches = Coach::latest()->get();
        return view('backend.coach.all_coach', compact('coaches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coach.add_coach');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:coaches|max:200',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            $save_url = '';
        }

        Coach::insert([
            'type' => $request->type,
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' =>  $save_url,
            'text' => $request->text,
            'status' => 0,
        ]);
      
        $notification = array(
            'message' => 'Coach Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coach $coach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coach $coach)
    {
        return view('backend.coach.edit_coach', compact('coach'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coach $coach)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coach $coach)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    
    /**
     * Import data from a CSV file into the database
     */
    public function ImportCoaches()
    {

        return view('backend.coach.import_coach');
    }
    // End Method 
    /**
     * Export data from a CSV file into the database
     */
    public function Export()
    {
        return Excel::download(new CoachExport, 'coaches.xlsx');
    }
    // End Method 
    /**
     * Upload CSV file for import data into the database
     */
    public function Import(Request $request)
    {

        Excel::import(new CoachImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Coach Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 
    // End Method 
}
