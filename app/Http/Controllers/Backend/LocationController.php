<?php

namespace App\Http\Controllers\Backend;

use App\Exports\LocationExport;
use App\Http\Controllers\Controller;
use App\Imports\LocationImport;
use App\Models\Location;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::latest()->get();
        return view('backend.locations.all_location', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.locations.add_location');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:locations|max:200',
        ]);


        Location::insert([
            'location_id' => $request->location_id,
            'name' => $request->name,
            'loc_slug' => strtolower(str_replace(' ', '-', $request->name)),

        ]);
        $notification = array(
            'message' => 'Locations Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('backend.locations.edit_location', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);

        $location->update([
            'location_id' => $request->location_id,
            'name' => $request->name,
            'loc_slug' => strtolower(str_replace(' ', '-', $request->name)),
        ]);
        $notification = array(
            'message' => 'Locations Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function delete(Request $request)
    {
        $locations = Location::find($request->id);

        $locations->delete();
        $notification = array(
            'message' => 'Locations Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    /**
     * Update the status resource in storage..
     */
    public function StatusUpdate(Request $request)
    {
        $locations = Location::find($request->id);
        $locations->update([
            'status' => ($locations->status == 1) ? 0 : 1,
        ]);

        return ($locations->status == 0) ? 'active' : 'deactive';
    }
    /**
     * Import data from a CSV file into the database
     */
    public function ImportLocations()
    {

        return view('backend.locations.import_location');
    }
    // End Method 
    /**
     * Export data from a CSV file into the database
     */
    public function Export()
    {
        return Excel::download(new LocationExport, 'locations.xlsx');
    }
    // End Method 
    /**
     * Upload CSV file for import data into the database
     */
    public function Import(Request $request)
    {

        Excel::import(new LocationImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Locations Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 
    // End Method 
}
