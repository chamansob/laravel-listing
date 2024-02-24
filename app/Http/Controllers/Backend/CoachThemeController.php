<?php

namespace App\Http\Controllers\Backend;

use App\Exports\CoachThemeExport;
use App\Http\Controllers\Controller;
use App\Imports\CoachThemeImport;
use App\Models\CoachTheme;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CoachThemeController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coach_themes = CoachTheme::latest()->get();
        return view('backend.coach_themes.all_theme', compact('coach_themes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coach_themes.add_theme');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:coach_themes|max:200',
        ]);


        CoachTheme::insert([
            'name' => $request->name,
            'theme_slug' => strtolower(str_replace(' ', '-', $request->name)),

        ]);
        $notification = array(
            'message' => 'Coach Theme Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(CoachTheme $coach_themes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CoachTheme $coach_theme)
    {
        return view('backend.coach_themes.edit_theme', compact('coach_theme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CoachTheme $coach_theme)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);

        $coach_theme->update([
            'name' => $request->name,
            'theme_slug' => strtolower(str_replace(' ', '-', $request->name)),
        ]);
        $notification = array(
            'message' => 'Coach Theme Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

   
    /**
     * Import data from a CSV file into the database
     */
    public function ImportCoachingMethod()
    {

        return view('backend.coach_themes.import_theme');
    }
    // End Method 
    /**
     * Export data from a CSV file into the database
     */
    public function Export()
    {
        return Excel::download(new CoachThemeExport, 'coach_themes.xlsx');
    }
    // End Method 
    /**
     * Upload CSV file for import data into the database
     */
    public function Import(Request $request)
    {

        Excel::import(new CoachThemeImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Coaching Theme Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 
    // End Method 
}
