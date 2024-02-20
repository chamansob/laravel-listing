<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CanProvide;
class CanProvideController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $can_provides = CanProvide::latest()->get();
        return view('backend.can_provides.all_provide', compact('can_provides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.can_provides.add_provide');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:can_provides|max:200',
        ]);


        canProvide::insert([
            'name' => $request->name,
            'provide_slug' => strtolower(str_replace(' ', '-', $request->name)),

        ]);
        $notification = array(
            'message' => 'Can Provide Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(CanProvide $can_provides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CanProvide $can_provide)
    {
        return view('backend.can_provides.edit_provide', compact('can_provide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CanProvide $can_provide)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);

        $can_provide->update([
            'name' => $request->name,
            'provide_slug' => strtolower(str_replace(' ', '-', $request->name)),
        ]);
        $notification = array(
            'message' => 'Can Provide Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    public function delete(Request $request)
    {
        $can_provides = canProvide::find($request->id);

        $can_provides->delete();
        $notification = array(
            'message' => 'Can Provide Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function StatusUpdate(Request $request)
    {
        $can_provides = canProvide::find($request->id);
        $can_provides->update([
            'status' => ($can_provides->status == 1) ? 0 : 1,
        ]);

        return ($can_provides->status == 0) ? 'active' : 'deactive';
    }
}
