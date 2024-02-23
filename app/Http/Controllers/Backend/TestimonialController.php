<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Testimonial;
use App\Models\ImagePresets;
use Illuminate\Http\Request;
use App\Traits\ImageGenTrait;

class TestimonialController extends Controller
{
    public $path = "upload/testimonials/thumbnail/";
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
        $testimonials = Testimonial::all();
        return view('backend.testimonials.all_testimonial', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.testimonials.add_testimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:testimonials|max:200',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            $save_url = '';
        }

        Testimonial::insert([
            'name' => $request->name,
            'designation' => $request->designation,            
            'image' =>  $save_url,            
            'text' => $request->text,
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Testimonial Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonials.edit_testimonial', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
           
            if ($testimonial->image != '') {
                $save_url = $testimonial->image;
            } else {
                $save_url = '';
            }
           
        }
        
        $testimonial->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' =>  $save_url,           
            'text' => $request->text,
            'status' => $request->status,
        ]);
        $notification = array(
            'message' => 'Testimonial Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            $testimonials = Testimonial::whereIn('id', $request->id);
            foreach ($testimonials as $testimonial) {
                if (file_exists($testimonial->image)) {
                    $img = explode('.', $testimonial->image);
                    $small_img = $img[0] . "_" . $this->image_preset[0]->name . "." . $img[1];
                    unlink($small_img);
                    unlink($testimonial->image);
                }
            }
        } else {
            $testimonials = Testimonial::find($request->id);
            if (file_exists($testimonials->image)) {
                $img = explode('.', $testimonials->image);
                $small_img = $img[0] . "_" . $this->image_preset[0]->name . "." . $img[1];
                unlink($small_img);
                unlink($testimonials->image);
            }
        }

        $testimonials->delete();
        $notification = array(
            'message' => 'Testimonial Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function StatusUpdate(Request $request)
    {
        $testimonial = Testimonial::find($request->id);
        $testimonial->update([
            'status' => ($testimonial->status == 1) ? 0 : 1,
        ]);

        return ($testimonial->status == 0) ? 'active' : 'deactive';
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
