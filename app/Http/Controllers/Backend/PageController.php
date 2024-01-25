<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Page;
use App\Models\Menu;
use App\Models\ImagePresets;
use Illuminate\Http\Request;
use App\Traits\ImageGenTrait;

class PageController extends Controller
{
    public $path = "upload/page/thumbnail/";
    public $image_preset;
    public $image_preset_main;
    use ImageGenTrait;
    public function __construct()
    {
        $this->image_preset = ImagePresets::whereIn('id', [4])->get();
        $this->image_preset_main = ImagePresets::find(14);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::latest()->get();
        return view('backend.pages.all_pages', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus=Menu::pluck('title','id');
        return view('backend.pages.add_pages', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:pages|max:200',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            $save_url = '';
        }

        Page::insert([
            'menu_id' => $request->menu_id,
            'name' => $request->name,            
            'link' => $request->link,            
            'small_text' => $request->small_text,
            'image' =>  $save_url,
            'text' => $request->text,
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Page Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        $menus = Menu::pluck('title', 'id');
        return view('backend.pages.edit_pages', compact('page', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            if ($page->state_image != '') {
                $save_url = $page->image;
            } else {
            }
            $save_url = '';
        }
        $page->update([
            'menu_id' => $request->menu_id,
            'name' => $request->name,
            'link' => $request->link,
            'small_text' => $request->small_text,
            'image' =>  $save_url,
            'text' => $request->text           
        ]);
        $notification = array(
            'message' => 'Page Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $page = Page::find($request->id);
        if (file_exists($page->image)) {
            $img = explode('.', $page->image);
            $small_img = $img[0] . "_" . $this->image_preset[0]->name . "." . $img[1];
            unlink($small_img);           
            unlink($page->image);
        }        
        $page->delete();
        $notification = array(
            'message' => 'Page Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function StatusUpdate(Request $request)
    {
        $page = Page::find($request->id);

        $page->update([
            'status' => ($page->status == 1) ? 0 : 1,
        ]);

        return ($page->status == 1) ? 'active' : 'deactive';
    }
}
