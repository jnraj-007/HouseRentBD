<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminList(){
       $adminList= Admin::all();
       $title="Admin List";
       return view('backend.layouts.admin.adminList',compact('title','adminList'));

    }
    public function adminForm(){
        $title="Add Admin";
        return view('backend.layouts.admin.adminAdd',compact('title'));
    }
    public function adminAdd(Request $request){

         $request->validate([
            'name'=>'required',
            'password'=>'required|min:6',
             'email'=>'required|email|unique:admins',
             'about'=>'required|unique:admins',
             'status'=>'required',
             'role'=>'required',
             'photo'=>'required'
         ]);
//
             $image="";

        if ($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            if ($file->isValid()){

                $image=date('Ymdhms').'.'.$file->getClientOriginalExtension();
                $file->storeAs('admins',$image);


            }
        }
      Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'address'=>$request->address,
            'about'=>$request->contact,
            'status'=>$request->status,
            'role'=>$request->role,
          'image'=>$image
        ]);
        return redirect()->route('admin.list');
    }

    public function deleteAdmin($id)
    {
        $del= Admin::find($id);
        $del->delete();
        return redirect()->route('admin.list');

    }

    public function loginForm()
    {
        return view('backend.layouts.admin.adminlogin');
    }

    public function login(Request $request)
    {
//        dd($request->all());


        //validation
        $request->validate([
            'email'=>'email|required',
            'password'=>'required|min:6'
        ]);
        $admin_auth=$request->only( 'email','password');
//        dd($admin_auth);
        if(Auth::guard('admin')->attempt($admin_auth)){
          $request->session()->regenerate();
          return redirect()->route('home');


        }
        return back()->withErrors([
            'email'=>'Invalid credentials'
        ]);


    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.loginForm');
    }


}
