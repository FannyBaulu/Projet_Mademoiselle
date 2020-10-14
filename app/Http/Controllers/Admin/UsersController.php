<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('superadmin')->except(['accountInformation','accountManagementView','accountManagement']);;
    }
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }

    public function accountManagementView(){
        return view('costumer.accountManage');
    }

    public function accountManagement(Request $request){
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'address' => 'required|min:10',
            'codezip' => 'required|integer',
            'city' => 'required|min:3'
        ]);
        $user =User::find(Auth::user()->id);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->address=$request->address;
        $user->codezip=$request->codezip;
        $user->city=$request->city;
        if ($user->save()) {
            $request->session()->flash('success','Your information has been updated');
        } else {
            $request->session()->flash('error', 'There was an error filling the form, please try again.');
        }
        return redirect()->route('users.accountInformation');
    }

    public function accountInformation(){
        $user=Auth::user();
        return view('costumer.account',['user'=>$user]);
    }
    /**
     * Show the form for editing users.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view ('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the user selected in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->role_id=$request->role;
        $user->name =$request->name;
        $user->email =$request->email;
        $user->save();

        if($user->save()){
            $request->session()->flash('success',$user->name.' has been updated');
        }
        else{
            $request->session()->flash('error','There was an error updating');
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the user from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success',"L'utilisateur a bien été supprimé.");
    }
}
