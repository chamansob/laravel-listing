<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Menugroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('backend.menu.all_menu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $type= ['Page', 'Url', 'External Page', 'Category'];
        $menugroup= Menugroup::pluck('title','id');
        $menus= Menu::pluck('title','id');
        return view('backend.menu.add_menu',compact('menus','type', 'menugroup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:menus|max:255',
        ]);


        Menu::insert([
            'parent_id' => ($request->parent_id!=null) ? $request->parent_id :0 ,
            'title' => $request->title,
            'url' => Str::slug($request->title),
            'type' => $request->type,
            'position'=> count(menu::all())+1,
            'group_id' => $request->group_id

        ]);
        $notification = array(
            'message' => 'Menu Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
       
        $type = ['Page', 'Url', 'External Page', 'Category'];
        $menugroup = Menugroup::pluck('title', 'id');
        $menus =  Menu::pluck('title', 'id');
        return view('backend.menu.edit_menu', compact('menu','menus', 'type', 'menugroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'title' => 'required|unique:menus|max:255',
        ]);


        $menu->update([
            'parent_id' => ($request->parent_id != null) ? $request->parent_id : 0,
            'title' => $request->title,
            'url' => Str::slug($request->title),
            'type' => $request->type,
            'position' => $request->position,
            'group_id' => $request->group_id

        ]);
        $notification = array(
            'message' => 'Menu Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
    public function delete(Request $request)
    {

        $menu = Menu::find($request->id);
        $menu->delete();
        $notification = array(
            'message' => 'Menu Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function StatusUpdate(Request $request)
    {
        $menu = Menu::find($request->id);

        $menu->update([
            'status' => ($menu->status == 1) ? 0 : 1,
        ]);

        return ($menu->status == 1) ? 'active' : 'deactive';
    }
}
