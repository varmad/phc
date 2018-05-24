<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\NurseCategory;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::paginate();

      return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $username = generate_random_string();
        $roles = Role::all()->pluck('name', 'id');
        return view('admin/users/create', compact('username', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
      $user = new User;
      $user->name = Input::get('display_name');
      $user->email = Input::get('email');
      $user->display_name = Input::get('display_name');
      $user->username = Input::get('username');
      $user->password = Hash::make('demo123');
      $user->mobile = Input::get('mobile');
      $user->address = Input::get('address');
      $user->user_service_type = 0;
      $user->last_ip = '';
      $user->ban_message = '';
      $user->timezone = '';
      $user->force_password_reset = 0;
      $user->status = 'Active';

      // $user = User::create($request->only(['name', 'email', 'display_name', 'username', 'password', 'role_id', 'mobile', 'address', 'status']));

      if ($user->save()) {
        $role = Role::find(Input::get('role_id'));
        $user->assignRole($role->name);
      }

      return redirect()->route('users.index', $user)->withSuccess(__('User created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $username = $user->username;
        $roles = Role::all()->pluck('name', 'id');
        $nurse_categories = NurseCategory::all()->pluck('name', 'id');

        //set user role for autoselect
        $roles_user = $user->roles->pluck('name');
        if (count($roles_user) > 0) {
          $role = reset($roles_user);
          $user->role_id = Role::where('name', $role[0])->pluck('id');
        }

        return view('admin.users.edit', compact('user', 'username', 'roles', 'nurse_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
      $user->name = Input::get('display_name');
      $user->email = Input::get('email');
      $user->display_name = Input::get('display_name');
      $user->username = Input::get('username');
      $user->password = Hash::make(Input::get('password'));
      $user->mobile = Input::get('mobile');
      $user->address = Input::get('address');
      $user->nurse_category_id = Input::get('nurse_category_id');
      $user->id_proof = Input::get('id_proof');
      $user->user_service_type = 0;
      $user->last_ip = '';
      $user->ban_message = '';
      $user->timezone = '';
      $user->force_password_reset = 0;
      $user->status = 'Active';

      // file upload
      if(request()->upload_id_proof) {
        $file_name = "id_proof".time().'.'.request()->upload_id_proof->getClientOriginalExtension();
        $request->upload_id_proof->storeAs('idproofs',$file_name);
        $user->upload_id_proof = $file_name;
      }

      // $user->save();
      // $user = User::create($request->only(['name', 'email', 'display_name', 'username', 'password', 'role_id', 'mobile', 'address', 'status']));

      if ($user->save()) {
        //get user role
        $roles = $user->roles->pluck('name');
        if (count($roles) > 0) {
          $role = reset($roles);
          //remove role
          $user->removeRole($role[0]);
          // add role
          $new_role = Role::find(Input::get('role_id'));
          $user->assignRole($new_role->name);
        }
      }

      return redirect()->route('users.edit', $user)->withSuccess(__('User updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function getListData()
    {
      $users = User::select(['id', 'username', 'display_name', 'email', 'last_login' ,'status'])->get();

      return Datatables::of($users)
          ->addColumn('action', function($user){
            return view('admin.users._actions', compact('user'));
          })
          ->addColumn('role', function($user){
            $roles = $user->roles->pluck('name');
            return reset($roles);
          })
          ->editColumn('id', '{{$id}}')
          ->editColumn('last_login', function($user){
            return $user->last_login;
          })
          ->make(true);
    }
}
