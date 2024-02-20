<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Categories;
use App\Models\ImagePresets;
use Illuminate\Http\Request;
use App\Traits\ImageGenTrait;

class CategoriesController extends Controller
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
        $categories = Categories::latest()->get();
        return view('backend.categories.all_category', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categories.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:200',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            $save_url = '';
        }

        Categories::insert([
            'name' => $request->name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->name)),            
            'image' =>  $save_url,            
            'text' => $request->text,
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
        
        return view('backend.categories.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);
        
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            if ($category->image != '') {
                $save_url = $category->image;
            } else {
                $save_url = '';
            }
        }
        
        $category->update([
            'name' => $request->name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' =>  $save_url,
            'text' => $request->text,
        ]);
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $categories = Categories::find($request->id);
        if (file_exists($categories->image)) {
            $img = explode('.', $categories->image);
            $small_img = $img[0] . "_" . $this->image_preset[0]->name . "." . $img[1];
            unlink($small_img);
            unlink($categories->image);
        }
        $categories->delete();
        $notification = array(
            'message' => 'Category Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function StatusUpdate(Request $request)
    {
        $categories = Categories::find($request->id);
        $categories->update([
            'status' => ($categories->status == 1) ? 0 : 1,
        ]);

        return ($categories->status == 0) ? 'active' : 'deactive';
    }
}
