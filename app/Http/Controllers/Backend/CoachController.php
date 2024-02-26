<?php

namespace App\Http\Controllers\Backend;

use App\Exports\CoachExport;
use App\Http\Controllers\Controller;
use App\Imports\CoachImport;
use App\Models\CanProvide;
use App\Models\Categories;
use App\Models\Coach;
use App\Models\CoachedOrganization;
use App\Models\CoachingMethod;
use App\Models\CoachTheme;
use App\Models\HeldPosition;
use Illuminate\Http\Request;
use App\Models\ImagePresets;
use App\Models\Languages;
use App\Models\Location;
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
        $categories = Categories::pluck('name','id');
        $canprovide = CanProvide::pluck('name', 'id');
        $coachorg = CoachedOrganization::pluck('name', 'id');
        $coachmethod = CoachingMethod::pluck('name', 'id');
        $coachtheme = CoachTheme::pluck('name', 'id');
        $heldposition = HeldPosition::pluck('name', 'id');      
        
        $locations = Location::all();

        // Group the locations by 'location_id'
        $groupedLocations = $locations->groupBy('location_id');

        // Pluck 'name' values for each 'location_id'
        $locationOptions = $groupedLocations->map(function ($locationGroup, $locationId) {
            return [
                'location_id' => LOCATION[$locationId],
                'name' => $locationGroup->pluck('name', 'id')->toArray(),
            ];
        });
        $location= $locationOptions->pluck('name', 'location_id')->toArray();
        //dd($locationOptions->toArray());
        $language = Languages::pluck('name', 'id'); 
        return view('backend.coach.add_coach',compact('categories', 'canprovide', 'coachorg', 'coachmethod', 'coachtheme', 'heldposition','language','location'));
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

       $coach= Coach::insert([            
            'name' => $request->name,            
            'coach_slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' =>  $save_url,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'address' => $request->address,
            'age' => $request->age,
            'degree' => $request->degree,
            'price' => $request->price,
            'text' => $request->text,
            'status' => 0,
        ]);
        $cats = Categories::whereIn('id', $request->category)->get();
        foreach( $cats as $cat){
            $cat->filterables()->attach($coach);
        }
        $cats = CoachTheme::whereIn('id', $request->coachorg)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
        $cats = CoachedOrganization::whereIn('id', $request->category)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
        $cats = CanProvide::whereIn('id', $request->canprovide)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
        $cats = CoachingMethod::whereIn('id', $request->coachmethod)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
        $cats = HeldPosition::whereIn('id', $request->heldposition)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
        $cats = Location::whereIn('id', $request->location)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
        $cats = Languages::whereIn('id', $request->language)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
      
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
        $categories = Categories::pluck('name', 'id');
        $canprovide = CanProvide::pluck('name', 'id');
        $coachorg = CoachedOrganization::pluck('name', 'id');
        $coachmethod = CoachingMethod::pluck('name', 'id');
        $coachtheme = CoachTheme::pluck('name', 'id');
        $heldposition = HeldPosition::pluck('name', 'id');

        $locations = Location::all();

        // Group the locations by 'location_id'
        $groupedLocations = $locations->groupBy('location_id');

        // Pluck 'name' values for each 'location_id'
        $locationOptions = $groupedLocations->map(function ($locationGroup, $locationId) {
            return [
                'location_id' => LOCATION[$locationId],
                'name' => $locationGroup->pluck('name', 'id')->toArray(),
            ];
        });
        $location = $locationOptions->pluck('name', 'location_id')->toArray();
        //dd($locationOptions->toArray());
        $language = Languages::pluck('name', 'id'); 
        return view('backend.coach.edit_coach',        compact('coach','categories', 'canprovide', 'coachorg', 'coachmethod', 'coachtheme', 'heldposition', 'language', 'location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coach $coach)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            if ($coach->image != '') {
                $save_url = $coach->image;
            } else {
                $save_url = '';
            }
        }
        $coach->update([
            'name' => $request->name,
            'coach_slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' =>  $save_url,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'address' => $request->address,
            'age' => $request->age,
            'degree' => $request->degree,
            'price' => $request->price,
            'text' => $request->text,
            'status' => 0,
        ]);
        // dd($request->category);
       
        $cats = Categories::whereIn('id', $request->category)->get();
        $coach->categories()->sync($cats);
       
        $cats = CoachTheme::whereIn('id', $request->coachorg)->get();
        $coach->coachthemes()->sync($cats);

        $cats = CoachedOrganization::whereIn('id', $request->category)->get();
        $coach->coachorgs()->sync($cats);

        $cats = CanProvide::whereIn('id', $request->canprovide)->get();
        $coach->canprovides()->sync($cats);

        $cats = CoachingMethod::whereIn('id', $request->coachmethod)->get();
        $coach->coachmethods()->sync($cats);

        $cats = HeldPosition::whereIn('id', $request->heldposition)->get();
        $coach->heldpositions()->sync($cats);
        
        $cats = Location::whereIn('id', $request->location)->get();
        $coach->locations()->sync($cats);
        
        $cats = Languages::whereIn('id', $request->language)->get();
        $coach->languages()->sync($cats);
        
        
        $notification = array(
            'message' => 'Coach Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
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
