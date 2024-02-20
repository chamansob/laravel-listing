<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Models\User;
use DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.other.permission.all_permission', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.other.permission.add_permission');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permission = Permission::create([
            'name' => strtolower($request->name),
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('permission.create')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.other.permission.edit_permission', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $per_id = $id;

        Permission::findOrFail($per_id)->update([
            'name' => strtolower($request->name),
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('permission.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function ImportPermission()
    {

        return view('backend.other.permission.import_permission');
    } // End Method 

    public function Export()
    {
        return Excel::download(new PermissionExport, 'permission.xlsx');
    } // End Method 
    public function Import(Request $request)
    {

        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 
    public function AddRolesPermission()
    {

        $roles = Role::orderBy('id')->pluck('name', 'id');
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.other.rolesetup.add_roles_permission', compact('roles', 'permissions', 'permission_groups'));
    } // End Method 
    public function RolePermissionStore(Request $request)
    {

        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        } // end foreach 

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    } // End Method 
    public function AllRolesPermission()
    {

        $roles = Role::all();
        return view('backend.other.rolesetup.all_roles_permission', compact('roles'));
    } // End Method 
    public function AdminEditRoles($id)
    {

        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.other.rolesetup.edit_roles_permission', compact('role', 'permissions', 'permission_groups'));
    } // End Method 
    public function AdminRolesUpdate(Request $request, $id)
    {

        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    } // End Method
    public function AdminDeleteRoles(Request $request)
    {

        $role = Role::find($request->id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method
    public function Ajax_Data(Request $request)
    {

        if ($request->ajax()) {
            $query = Permission::select('id', 'name', 'group_name')->get();

            return DataTables::of($query)
                ->addColumn('sl', function (Permission $permission) {
                    return  $permission->id;
                })
                ->addColumn('name', function (Permission $permission) {
                    return  !empty($permission->name) ? $permission->name : '-';
                })
                ->addColumn('group_name', function (Permission $permission) {
                    return  !empty($permission->group_name) ? $permission->group_name : '-';
                })

                ->addColumn('action', function (Permission $permission) {

                    $x =     \Collective\Html\FormFacade::open([
                        'method' => 'delete',
                        'route' => ['permission.destroy', $permission->id],
                        'class' => 'forms-sample',
                    ]);
                    $x .= '<a href="' . route('permission.edit', $permission->id) . '"
                                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                                    data-placement="top" title="Edit" data-bs-original-title="Edit">
                                                    <i data-feather="edit"></i>
                                                </a>';
                    $x .= '<a href="' . route('permission.edit', $permission->id) . '" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                                    data-placement="top" title="Edit" data-bs-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                    $x .= '<button type="submit" class="btn btn-inverse-light border-0 bg-white btn-submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>';
                    $x .=  \Collective\Html\FormFacade::close();
                    return $x;
                })

                ->rawColumns(['action'])
                ->make(true);
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
}
