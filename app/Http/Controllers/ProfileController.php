<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\CanProvide;
use App\Models\Categories;
use App\Models\Coach;
use App\Models\CoachedOrganization;
use App\Models\CoachingMethod;
use App\Models\CoachTheme;
use App\Models\HeldPosition;
use App\Models\ImagePresets;
use App\Models\Languages;
use App\Models\Location;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Traits\ImageGenTrait;

class ProfileController extends Controller
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
     * Display the user's profile form.
     */
    public function UserDashboard()
    {
        return view('user.dashboard');
    }
    public function AddCoach(Request $request): View
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
       
        return view('profile.coach.add_coach', compact('categories', 'canprovide', 'coachorg', 'coachmethod', 'coachtheme', 'heldposition', 'language', 'location'));
    }
    public function Coachstore(Request $request)
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
            'user_id' =>  Auth::user()->id,            
            'uploadby' =>  1,
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
        return Redirect::route('user.coach.edit')->with($notification);
    }
   
    public function CoachEdit(Request $request): View
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
        $coach = Auth::user()->coach;
      
        return view('profile.coach.edit_coach', compact('coach', 'categories', 'canprovide', 'coachorg', 'coachmethod', 'coachtheme', 'heldposition', 'language', 'location'));
   
    }
    public function UpdateCoach(Request $request)
    {
        $coach=Coach::find(1);
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
            'uploadby' => 1,            
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
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    /**
     * Update the user's profile information.
     */

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        $notification = array(
            'message' => 'User Profile Updated',
            'alert-type' => 'success'
        );

        return Redirect::route('profile.edit')->with($notification);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function ShowCoach(Request $request,string $coach_slug)
    {
       $coach= Coach::where('coach_slug', $coach_slug)->first();
        return view('frontend.coach-details', compact('coach'));
    }
}
