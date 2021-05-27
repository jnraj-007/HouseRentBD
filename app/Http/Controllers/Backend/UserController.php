<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Package;

class UserController extends Controller
{
    public function viewuser(){
//        $list=User::with('packageName')->get(); before paginate
        $list=User::with('packageName')->paginate('5'); //after paginate
         $title="View user";
        return view('backend.layouts.user.list',compact('list','title'));
    }
    public function userform(){
        $title="Add user";
        $lol=Package::all();
        return view('backend.layouts.user.add',compact('title','lol'));
    }
    public function useradd(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'address'=>'required',
            'contact'=>'required',
            'role'=>'required',
            'password'=>'required',
            'photo'=>'required'


        ]);
        $image="";

        if ($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            if ($file->isValid()){

                $image=date('Ymdhms').'.'.$file->getClientOriginalExtension();
                $file->storeAs('users',$image);


            }
        }


        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'role'=>$request->role,
            'password'=>bcrypt($request->password),
            'packageId'=>$request->package,
            'image'=>$image

        ]);

        return redirect()->route('view.user');

    }
}
