<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $template=SiteSetting::find(1);
        return view('admin.index',compact('template'));
    }
    public function AdminLogin()
    {
        return view('admin.login');
    }
    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        $notification = array(
            'message' =>  'Admin Logout Successfully',
            'alert-type' => 'success'
        );
        return redirect('/admin/login')->with($notification);
    }
    public function AllAdmin()
    {
        $alladmin = User::where('role', 'admin')->get();
        return view('backend.other.admin.all_admin', compact('alladmin'));
    } // End Method 
    public function AddAdmin()
    {

        $roles = Role::pluck('name','id');
        return view('backend.other.admin.add_admin', compact('roles'));
    } // End Method 


    public function StoreAdmin(Request $request)
    {

       
        if($request->roles==4)
        {
            $role='user';  
        }else{
            $role = 'admin';  
        }
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->about = $request->about;
        $user->password =  Hash::make($request->password);
        $user->role = $role;
        $user->status = 0;
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New Staff Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    } // End Method 
    public function EditAdmin($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');
        return view('backend.other.admin.edit_admin', compact('user', 'roles'));
    } // End Method

    public function UpdateAdmin(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->about = $request->about;
        $user->role = 'admin';
        $user->status = 0;
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Staff Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    } // End Method 

    public function DeleteAdmin(Request $request)
    {

        $user = User::findOrFail($request->id);     
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'Staff Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 
   
}
