<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {
        $s = $request->input('s') ? $request->input('s') : '';

        $users = User::whereLike(['first_name','last_name', 'mid_name', 'email', 'created_at', 'phone', 'last_name', 'mid_name', 'first_name', 'address'], $s)->paginate(10);
        $data = [
            'users' => $users,
            's'=> $s
        ];
        return view('users-management.users.index')->with($data);
    }//end of index

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return view('users-management.users.create');
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
        $rules = [
            'first_name' => 'string|required|max:20',
            'mid_name' => 'string|required|max:20',
            'last_name' => 'string|required|max:20',
            'phone' => 'nullable|max:15|unique:users',
            'address' => 'nullable|max:191',
            'email' => 'email|required|max:191|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'sometimes|required_with:password',
        ];

        $messages = [
        ];

        $this->validate($request, $rules, $messages);

        $active = $request->active ? true : false;

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->mid_name = $request->mid_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->active = $active;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index')->with('success',__('saved-successfully'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
        $user = User::findOrfail($id);
        if($user) {
            $data = [
                'user' => $user
            ];
            return view('users-management.users.edit')->with($data);
        } else {
            return redirect()->route('users.index')->with('success',__('server-error'));
        }
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param $id
    * @return Response
    */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        if($user) {
            $data = [
                'user' => $user
            ];
            return view('users-management.users.edit')->with($data);
        } else {
            return redirect()->route('users.index')->with('success',__('server-error'));
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
        $rules = [
            'first_name' => 'string|required|max:20',
            'mid_name' => 'string|required|max:20',
            'last_name' => 'string|required|max:20',
            'phone' => 'required|max:15|unique:users,phone,' . $id,
            'address' => 'nullable|max:191',
            'email' => 'email|required|max:191|unique:users,email,' . $id,
        ];

        $messages = [
        ];

        $this->validate($request, $rules, $messages);

        $user = User::findOrfail($id);
        if(!$user) {
            return redirect()->route('users.index')->with('success',__('server-error'));
        }

        $active = $request->active ? true : false;

        $user->first_name = $request->first_name;
        $user->mid_name = $request->mid_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->active = $active;
        $user->save();

        return redirect()->route('users.index')->with('success',__('forms.updated-successfully'));
    }//end of update

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        //        return 'delete';
        $user = User::findOrfail($id);
        if(!$user) {
            return redirect()->route('users.index')->with('error',__('server-error'));
        }
        $user->delete();

        return redirect()->route('users.index')->with('success',__('forms.deleted-successfully'));
    }

    public function getUserRoles($id){

        $user = User::findOrfail($id);
        $user_roles = $user->roles()->get();

        if(!$user) {
            return redirect()->route('users.index')->with('error',__('server-error'));
        }
        $user_roles = $user->roles()->get()->pluck('id')->toArray();
        $roles = Role::where('system_type', 'BOF')->get();

        $data = [
            'user_roles' => $user_roles,
            'roles' => $roles,
            'user' => $user
        ];

        return view('users-management.users.user-roles')->with($data);
    }

    public function updateUserRoles(Request $request, $id) {

        $user = User::findOrfail($id);
        if(!$user) {
            return redirect()->route('users.index')->with('error',__('server-error'));
        }

        $rules = [
            'roles' => 'required|array|min:1',
        ];

        $messages = [
            'roles.required' => 'يجب أختيار دور واحد على الأقل'
        ];

        $this->validate($request, $rules, $messages);

        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('success',__('forms.the-roles-were-successfully-awarded'));
    }
    public function showPassword() {
        // validation

        return view('system.user.reset-password');
    }

    public function resetPassword(Request $request) {
        // validation
        $rules = [
            'user_pwd' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ];

        $messages = [
        ];

        $this->validate($request, $rules, $messages);
        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->user_pwd);
        $user->update();
        return redirect()->route('show-password')->with('success',__('updated-successfully'));
    }
}
