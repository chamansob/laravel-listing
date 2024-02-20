<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CoachTheme;
use Illuminate\Http\Request;

class CoachThemeController extends Controller
{
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
            'message' => 'Coach ThemeAdded Successfully',
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
            'message' => 'Coach ThemeUpdated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function delete(Request $request)
    {
        $coach_themes = CoachTheme::find($request->id);

        $coach_themes->delete();
        $notification = array(
            'message' => 'Coach ThemeDeleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function StatusUpdate(Request $request)
    {
        $coach_themes = CoachTheme::find($request->id);
        $coach_themes->update([
            'status' => ($coach_themes->status == 1) ? 0 : 1,
        ]);

        return ($coach_themes->status == 0) ? 'active' : 'deactive';
    }
}
