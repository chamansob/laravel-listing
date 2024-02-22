<?php

namespace App\Http\Controllers\Backend;

use App\Exports\CoachExport;
use App\Http\Controllers\Controller;
use App\Imports\CoachImport;
use App\Models\Coach;
use Illuminate\Http\Request;
use App\Models\ImagePresets;
use App\Traits\ImageGenTrait;
use Maatwebsite\Excel\Facades\Excel;

class CoachController extends Controller
{
    public $path = "upload/coach/thumbnail/";
    public $image_preset;
    public $image_preset_main;
    use ImageGenTrait;
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
        $coach = Coach::latest()->get();
        return view('backend.coach.all_module', compact('coach'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
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
    public function delete(Request $request)
    {
        $coach = Coach::find($request->id);
        if (file_exists($coach->image)) {
            $img = explode('.', $coach->image);
            $small_img = $img[0] . "_" . $this->image_preset[0]->name . "." . $img[1];
            unlink($small_img);
            unlink($coach->image);
        }
        $coach->delete();
        $cat = ($coach->type == 1) ? 'Category' : 'Service';
        $notification = array(
            'message' => '' . $cat . ' Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    /**
     * Update the status resource in storage..
     */
    public function StatusUpdate(Request $request)
    {
        $coach = Coach::find($request->id);
        $coach->update([
            'status' => ($coach->status == 1) ? 0 : 1,
        ]);

        return ($coach->status == 0) ? 'active' : 'deactive';
    }
    /**
     * Import data from a CSV file into the database
     */
    public function ImportCategories()
    {

        return view('backend.coach.import_coach');
    }
    // End Method 
    /**
     * Export data from a CSV file into the database
     */
    public function Export()
    {
        return Excel::download(new CoachExport, 'coachs.xlsx');
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
