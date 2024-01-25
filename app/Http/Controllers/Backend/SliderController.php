<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use App\Models\Slider;
use App\Models\ImagePresets;
use Illuminate\Http\Request;
use App\Traits\ImageGenTrait;

class SliderController extends Controller
{
    public $path = "upload/slider/thumbnail/";
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
        $sliders = Slider::all(['id','name','status']);
        return view('backend.slider.all_slider', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.slider.add_slider');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:sliders|max:200',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            $save_url = '';
        }

        Slider::insert([
            'name' => $request->name,
            'heading' => $request->heading,
            'small' => $request->small,
            'image' =>  $save_url,            
            'text' => $request->text,
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
      // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('backend.slider.edit_slider', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            if ($slider->state_image != '') {
                $save_url = $slider->image;
            } else {
            }
            $save_url = '';
        }
        $slider->update([
            'name' => $request->name,
            'heading' => $request->heading,
            'small' => $request->small,
            'image' =>  $save_url,           
            'text' => $request->text,
        ]);
        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $slider = Slider::find($request->id);
        if (file_exists($slider->image)) {
            $img = explode('.', $slider->image);
            $small_img = $img[0] . "_" . $this->image_preset[0]->name . "." . $img[1];
            unlink($small_img);
            unlink($slider->image);
        }
        $slider->delete();
        $notification = array(
            'message' => 'Slider Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function StatusUpdate(Request $request)
    {
        $slider = slider::find($request->id);
        $slider->update([
            'status' => ($slider->status == 1) ? 0 : 1,
        ]);

        return ($slider->status == 1) ? 'active' : 'deactive';
    }
}
