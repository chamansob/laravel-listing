<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Services;
use App\Models\ImagePresets;
use Illuminate\Http\Request;
use App\Traits\ImageGenTrait;

class ServicesController extends Controller
{
    public $path = "upload/categories/thumbnail/";
    public $image_preset;
    public $image_preset_main;
    use ImageGenTrait;

    public function __construct()
    {
        $this->image_preset = ImagePresets::whereIn('id', [4])->get();
        $this->image_preset_main = ImagePresets::find(11);
    }
    public function index()
    {
        $services = Services::latest()->get();
        return view('backend.services.all_service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.services.add_service');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:Services|max:200',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            $save_url = '';
        }

        Services::insert([
            'name' => $request->name,
            'service_slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' =>  $save_url,
            'text' => $request->text,
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Service Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $service)
    {
        return view('backend.services.edit_service', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $service)
    {
        
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);

        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            if ($service->image != '') {
                $save_url = $service->image;
            } else {
                $save_url = '';
            }
        }
//dd($service);
        $service->update([
            'name' => $request->name,
            'service_slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' =>  $save_url,
            'text' => $request->text,
        ]);
        $notification = array(
            'message' => 'Service Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $Services = Services::find($request->id);
        if (file_exists($Services->image)) {
            $img = explode('.', $Services->image);
            $small_img = $img[0] . "_" . $this->image_preset[0]->name . "." . $img[1];
            unlink($small_img);
            unlink($Services->image);
        }
        $Services->delete();
        $notification = array(
            'message' => 'Category Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function StatusUpdate(Request $request)
    {
        $services = Services::find($request->id);
        $services->update([
            'status' => ($services->status == 1) ? 0 : 1,
        ]);

        return ($services->status == 0) ? 'active' : 'deactive';
    }
}
