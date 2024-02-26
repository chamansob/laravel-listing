<?php

namespace App\Http\Controllers\Backend;

use App\Exports\CategoriesExport;
use App\Http\Controllers\Controller;
use App\Imports\CategoriesImport;
use App\Models\Categories;
use App\Models\ImagePresets;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use App\Traits\ImageGenTrait;
use Maatwebsite\Excel\Facades\Excel;

class CategoriesController extends Controller
{
    public $path = "upload/categories/thumbnail/";
    public $image_preset;
    public $image_preset_main;
    use ImageGenTrait;
    use CommonTrait;

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
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
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
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
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
    
    
    /**
     * Import data from a CSV file into the database
     */
    public function ImportCategories()
    {

        return view('backend.categories.import_category');
    }
    // End Method 
    /**
     * Export data from a CSV file into the database
     */
    public function Export()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }
    // End Method 
    /**
     * Upload CSV file for import data into the database
     */
    public function Import(Request $request)
    {

        Excel::import(new CategoriesImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Categories Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } 
    // End Method 
}
