<?php

namespace App\Http\Controllers\Backend;

use App\Exports\CoachedOrganizationExport;
use App\Http\Controllers\Controller;
use App\Imports\CoachedOrganizationImport;
use App\Models\CoachedOrganization;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class CoachedOrganizationController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coached_organizations = CoachedOrganization::latest()->get();
        return view('backend.coached_organizations.all_organization', compact('coached_organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coached_organizations.add_organization');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:coached_organizations|max:200',
        ]);


        CoachedOrganization::insert([
            'name' => $request->name,
            'org_slug' => strtolower(str_replace(' ', '-', $request->name)),

        ]);
        $notification = array(
            'message' => 'Coached Organization Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(CoachedOrganization $coached_organizations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CoachedOrganization $coached_organization)
    {
        return view('backend.coached_organizations.edit_organization', compact('coached_organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CoachedOrganization $coached_organization)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);

        $coached_organization->update([
            'name' => $request->name,
            'org_slug' => strtolower(str_replace(' ', '-', $request->name)),
        ]);
        $notification = array(
            'message' => 'Coached Organization Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    
    /**
     * Import data from a CSV file into the database
     */
    public function ImportCoachedOrganization()
    {

        return view('backend.coached_organizations.import_organization');
    }
    // End Method 
    /**
     * Export data from a CSV file into the database
     */
    public function Export()
    {
        return Excel::download(new CoachedOrganizationExport, 'coached_organizations.xlsx');
    }
    // End Method 
    /**
     * Upload CSV file for import data into the database
     */
    public function Import(Request $request)
    {

        Excel::import(new CoachedOrganizationImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Coached Organization Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 
    // End Method 
}
