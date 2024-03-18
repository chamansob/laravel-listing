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
use App\Models\User;
use App\Traits\CommonTrait;
use App\Traits\ImageGenTrait;
use Maatwebsite\Excel\Facades\Excel;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use DataTables;

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
                'location_id' => "Country - (" . LOCATION[$locationId] . ")",
                'name' => $locationGroup->pluck('name', 'id')->toArray(),
            ];
        });
        $location = $locationOptions->pluck('name', 'location_id')->toArray();
        $users = User::where('role', 'user')->pluck('email', 'id');
        //dd($locationOptions->toArray());
        $language = Languages::pluck('name', 'id');
        return view('backend.coach.add_coach', compact('categories', 'canprovide', 'coachorg', 'coachmethod', 'coachtheme', 'heldposition', 'language', 'location', 'users'));
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
        $pcode = IdGenerator::generate(['table' => 'coaches', 'field' => 'coach_code', 'length' => 5, 'prefix' => 'CO']);

        $coach = Coach::insert([
            'coach_code' => $pcode,
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
            'user_id' => $request->user_id,
            'uploadby' => ($request->user_id == NULL) ? 0 : 1,
            'status' => 0,
        ]);
        $cats = Categories::whereIntegerInRaw('id', $request->category)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
        $cats = CoachTheme::whereIntegerInRaw('id', $request->coachtheme)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
        $cats = CoachedOrganization::whereIntegerInRaw('id', $request->coachorg)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
        $cats = CanProvide::whereIntegerInRaw('id', $request->canprovide)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
        $cats = CoachingMethod::whereIntegerInRaw('id', $request->coachmethod)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
        $cats = HeldPosition::whereIntegerInRaw('id', $request->heldposition)->get();
        foreach ($cats as $cat) {
            $cat->filterables()->attach($coach);
        }
        $cats = Location::where('id', $request->location)->get();
        $cat->filterables()->attach($coach);

        $cats = Languages::whereIntegerInRaw('id', $request->language)->get();
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
                'location_id' => "Country - (" . LOCATION[$locationId] . ")",
                'name' => $locationGroup->pluck('name', 'id')->toArray(),
            ];
        });
        $location = $locationOptions->pluck('name', 'location_id')->toArray();
        //dd($locationOptions->toArray());
        $language = Languages::pluck('name', 'id');
        $users = User::where('role', 'user')->pluck('email', 'id');
        return view('backend.coach.edit_coach',        compact('coach', 'categories', 'canprovide', 'coachorg', 'coachmethod', 'coachtheme', 'heldposition', 'language', 'location', 'users'));
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
            'user_id' => $request->user_id,
            'uploadby' => ($request->user_id == NULL) ? 0 : 1,
            'status' => 0,
        ]);
        // dd($request->category);
        if ($request->category != null) {
            $cats = Categories::whereIntegerInRaw('id', $request->category)->get();
            $coach->categories()->sync($cats);
        }
        if ($request->coachtheme != null) {
            $cats = CoachTheme::whereIntegerInRaw('id', $request->coachtheme)->get();
            $coach->coachthemes()->sync($cats);
        }
        if ($request->coachorg != null) {
            $cats = CoachedOrganization::whereIntegerInRaw('id', $request->coachorg)->get();
            $coach->coachorgs()->sync($cats);
        }
        if ($request->canprovide != null) {
            $cats = CanProvide::whereIntegerInRaw('id', $request->canprovide)->get();
            $coach->canprovides()->sync($cats);
        }
        if ($request->coachmethod != null) {
            $cats = CoachingMethod::whereIntegerInRaw('id', $request->coachmethod)->get();
            $coach->coachmethods()->sync($cats);
        }
        if ($request->heldposition != null) {
            $cats = HeldPosition::whereIntegerInRaw('id', $request->heldposition)->get();
            $coach->heldpositions()->sync($cats);
        }
        if ($request->location != null) {
            $cats = Location::where('id', $request->location)->get();
            $coach->locations()->sync($cats);
        }
        if ($request->language != null) {
            $cats = Languages::whereIntegerInRaw('id', $request->language)->get();
            $coach->languages()->sync($cats);
        }

        $notification = array(
            'message' => 'Coach Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function DeleteCoach(Request $request)
    {
       
        $coach = Coach::find($request->id);
        if (file_exists($coach->image)) {
            $img = explode('.', $coach->image);
            $small_img = $img[0] . "_" . $this->image_preset[0]->name . "." . $img[1];
            unlink($small_img);
            unlink($coach->image);
        }
        $coach->categories()->detach();
        $coach->coachthemes()->detach();
        $coach->coachmethods()->detach();
        $coach->coachorgs()->detach();
        $coach->canprovides()->detach();
        $coach->heldpositions()->detach();
        $coach->languages()->detach();
        $coach->locations()->detach();
        $coach->delete();
        $notification = array(
            'message' => 'Coach Record Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
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
   
    public function Ajax_Load(Request $request, Coach $coach)
    {

        $query = Coach::select('id', 'coach_code', 'name', 'image', 'gender', 'user_id', 'uploadby', 'created_at', 'updated_at')->get();

        return DataTables::of($query)
            ->setRowClass(function (Coach $coach) {
                return 'coach-' . $coach->id;
            })
            ->addColumn('image', function (Coach $coach) {
                 $img='backend/assets/images/sample.jpg';
                if($coach->image!='')
                {
                //$img = explode('.', $coach->image);
               // $table_img = $img[0] . '_small.' . $img[1];
                $img = $coach->image;
                }
              
                return  '<img src="' . asset($img) . '" class="w-75" >';
            })
            ->addColumn('uploadby', function (Coach $coach) {
                $uploaby = ($coach->user?->name) ? $coach->user->name : "Admin";
                $btn = ($coach->user?->name) ? 'inverse-primary' : 'inverse-warning';
                //  $link = ($coach->user?->name) ? route("agent.details", $coach->user->id) : '#';
                return  '<a href="#"  target="_blank" class="btn btn-sm btn-' . $btn . ' "> ' . $uploaby . '</a>';
            })
            ->addColumn('info', function (Coach $coach) {
                $pname = ucfirst($coach->name);
                $code  = $coach->coach_code;
                $gender = GENDER[$coach->gender];

                $languages = $coach->languages()->pluck('name')->toArray();
                $languages_list = implode(",", $languages);
                $locations = $coach->locations()->pluck('name')->toArray();
                $locations_list = implode(",", $locations);
                $created_at = $coach->created_at->format('d-m-Y g:i A ');
                $updated_at = $coach->updated_at->format('d-m-Y g:i A ');
                return  '<strong class="text-primary">Name:</strong>' . $pname . '<br>
                    <strong class="text-info">Code:</strong>' . $code . '<br>                   
                    <strong class="text-danger">Gender:</strong>' . $gender . '<br>   
                    <strong class="text-danger">Language:</strong>' . $languages_list . '<br>     
                    <strong class="text-danger">Location:</strong>' . $locations_list . '<br>              
                    <strong class="text-secondary">Created:</strong>' . $created_at . '<br>
                    <strong class="text-secondary">Updated:</strong>' . $updated_at . '';
            })
            ->addColumn('status', function (Coach $coach) {
                $btn = $coach->status == 0 ? 'success' : 'danger';
                $status = $coach->status == 0 ? 'Active' : 'Deactive';
               
            return'<button type="button" onClick="statusFunction('. $coach->id. ', \'Coach\')"
                                                class="shadow-none badge badge-light-' . $btn . ' warning changestatus' . $coach->id . '  bs-tooltip"
                                                data-toggle="tooltip" data-placement="top" title="Status"
                                                data-original-title="Status">' . $status . '</button>';
                
            })

            ->addColumn('action', function (Coach $coach) {

                $show = route('coaches.show', $coach->id);
                $x = '<a href="' . route('coaches.edit', $coach->id) . '"
    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
    data-placement="top" title="Edit" data-bs-original-title="Edit">
    <i data-feather="edit"></i>
</a>';

                $x .= '<a href="javascript:void(0)" onClick="deleteFunction(' . $coach->id . ', \'Coach\')"
    class="action-btn btn-edit bs-tooltip me-2 delete' . $coach->id . '"
    data-toggle="tooltip" data-placement="top" title="Delete"
    data-bs-original-title="Delete">
    <i data-feather="trash-2"></i>
</a>';

                return $x;
            })

            ->rawColumns(['image', 'uploadby', 'info', 'status', 'change', 'action'])
            ->make(true);
    }
}
