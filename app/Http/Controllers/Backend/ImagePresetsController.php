<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\ImagePresets;
use Illuminate\Http\Request;

class ImagePresetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $image_preset = ImagePresets::all(['id','name','width','height','status']);
        return view('backend.image_preset.all_image_pre', compact('image_preset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.image_preset.add_image_pre');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:countries|max:200',
            'width' => 'required',
            'height' => 'required',
        ]);

        ImagePresets::insert([
            'name' => $request->name,
            'width' => $request->width,
            'height' => $request->height,
            'status' => 1,
        ]);
        $notification = array(
            'message' => 'Image Preset Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    /**
     * Display the specified resource.
     */
    public function show(ImagePresets $imagePreset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImagePresets $imagePreset)
    {
        $image_preset = $imagePreset;
        return view('backend.image_preset.edit_image_pre', compact('image_preset'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImagePresets $imagePreset)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
            'width' => 'required',
            'height' => 'required',
        ]);

        $imagePreset->update([
            'name' => $request->name,
            'width' => $request->width,
            'height' => $request->height,
        ]);
        $notification = array(
            'message' => 'Image Preset Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function delete(Request $request)
    {

        $imagePreset = ImagePresets::find($request->id);
        $imagePreset->delete();
        $notification = array(
            'message' => 'Image Preset Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function StatusUpdate(Request $request)
    {

        $imagePreset = ImagePresets::find($request->id);
        $imagePreset->update([
            'status' => ($imagePreset->status == 1) ? 0 : 1,
        ]);
        $notification = array(
            'message' => 'Image Preset Status changed successfully',
            'alert-type' => 'success',
        );

        return ($imagePreset->status == 0) ? 'active' : 'deactive';
    }
}
