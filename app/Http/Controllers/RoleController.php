<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::where('system_type', 'BOF')->get();
        return view('users-management.roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::where('system_type', 'BOF')->get()->groupBy('entity_name');
        $data = [
            'permissions' => $permissions
        ];
        // return $data;
        return view('users-management.roles.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $roles = [
            'name' => 'required|max:191|unique:roles',
            'display_name' => 'required',
            'description' => 'nullable|max:191',
            'permissions' => 'required|array|min:1',
        ];

        $messages = [
            'roles.required' => __('forms.please-add-permissions-for-this-role')
        ];

        $this->validate($request, $roles, $messages);

        $role = new Role();
        $role->name = 'BOF' . $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->system_type = 'BOF';
        $role->save();

        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success',__('saved-successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $role = Role::findOrfail($id);

        if($role) {
            $permissions_roles = $role->permissions()->get()->pluck('id')->toArray();
          $permissions = Permission::where('system_type', 'BOF')->get()->groupBy('entity_name');
            $data = [
                'role' => $role,
                'permissions' => $permissions,
                'permissions_roles' => $permissions_roles
            ];
            return view('users-management.roles.edit')->with($data);
        } else {
            return redirect()->route('roles.index')->with('success',__('server-error'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $roles = [
            'name' => 'required|max:191|unique:roles,name,'. $id,
            'display_name' => 'required',
            'description' => 'nullable|max:191',
            'roles' => 'required|array|min:1',
        ];

        $messages = [
            'roles.required' => __('forms.please-add-permissions-for-this-role')
        ];

        $this->validate($request, $roles, $messages);

        $role = Role::find($id);

        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->update();

        $role->syncPermissions($request->roles);

        return redirect()->route('roles.index')->with('success',__('updated-successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role) {
            $role->delete();
        }

        return redirect()->route('roles.index')->with('success', 'record deleted successfuly ...');
    }
}
