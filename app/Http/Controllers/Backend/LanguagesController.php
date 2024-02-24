<?php

namespace App\Http\Controllers\Backend;

use App\Exports\LanguagesExport;
use App\Http\Controllers\Controller;
use App\Imports\LanguagesImport;
use App\Models\Languages;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LanguagesController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Languages::latest()->get();
        return view('backend.languages.all_language', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.languages.add_language');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:languages|max:200',
        ]);


        Languages::insert([
            'name' => $request->name,
            'lan_slug' => strtolower(str_replace(' ', '-', $request->name)),

        ]);
        $notification = array(
            'message' => 'Language Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Languages $languages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Languages $language)
    {
        return view('backend.languages.edit_language', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Languages $language)
    {
        //
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);

        $language->update([
            'name' => $request->name,
            'lan_slug' => strtolower(str_replace(' ', '-', $request->name)),
        ]);
        $notification = array(
            'message' => 'Language Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    
    /**
     * Import data from a CSV file into the database
     */
    public function ImportLanguages()
    {

        return view('backend.languages.import_language');
    }
    // End Method 
    /**
     * Export data from a CSV file into the database
     */
    public function Export()
    {
        return Excel::download(new LanguagesExport, 'languages.xlsx');
    }
    // End Method 
    /**
     * Upload CSV file for import data into the database
     */
    public function Import(Request $request)
    {

        Excel::import(new LanguagesImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Languages Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method 
}
