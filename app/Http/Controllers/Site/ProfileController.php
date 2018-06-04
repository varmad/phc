<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Http\Requests\Site\ProfileRequest;

class ProfileController extends Controller
{

    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(function($request, $next){
          $this->user = Auth::user();

          return $next($request);
        });

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user_profile = $this->user;

      return view('site.profiles.index', compact('user_profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      $user_profile = $this->user;
      return view('site.profiles.edit', compact('user_profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
      $user = User::find($this->user->id);

      $user->display_name = Input::get('display_name');
      $user->mobile = Input::get('mobile');
      $user->address = Input::get('address');
      $user->save();

      return redirect()->route('profile.index')->withSuccess(__('Profile updated.'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_password(Request $request)
    {
      $user = User::find($this->user->id);

      return view('site.profiles.change_password', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_password_store(Request $request)
    {
      $request->validate([
            'password' => 'required|string|min:6|confirmed'
      ]);

      $user = User::find($this->user->id);
      $user->password = Hash::make(Input::get('password'));

      return redirect()->route('profile.change-password')->withSuccess(__('Password updated'));
    }




    public function picture(Request $request)
    {
      // $request->validate([
      //       'profile_picture' => 'required|file|max:1024',
      // ]);
      $user = User::find($this->user->id);
      // file upload
      if(request()->profile_picture) {
        $file_name = "profile_picture".time().'.'.request()->profile_picture->getClientOriginalExtension();
        $request->profile_picture->storeAs('profile_picture',$file_name);
        $user->profile_picture = $file_name;
      }

      $user->save();

      return redirect()->route('profile.edit')->withSuccess(__('Profile updated.'));
    }
}
