<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\UserAccountVerification;
use App\Models\Category;
use App\Models\User;
use App\Models\Userverification;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function viewuser(){
//        $list=User::with('packageName')->get(); before paginate
        $list=User::with('packageName')->paginate('8'); //after paginate
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
            'about'=>'required',
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
            'about'=>$request->contact,
            'role'=>$request->role,
            'password'=>bcrypt($request->password),
            'packageId'=>$request->package,
            'image'=>$image

        ]);

        return redirect()->route('view.user');

    }

    public function userVerificationRequests()
    {
        $title="User Verificatin Request";
        $verificationRequests=Userverification::with('viewData')->where('status','pending')->get();
        return view('backend.layouts.userverification.verificationRequest',compact('verificationRequests','title'));
    }

    public function viewData($id)
    { $title="User Verificatin Data";

        $data=Userverification::with('viewData')->find($id);

        return view('backend.layouts.userverification.viewverifieddata',compact('title','data'));
    }

    public function verifyUser($id)
    {
        $verify=Userverification::find($id);
        $verify->update([
            'status'=>'verified'
        ]);
         $user=User::find($verify->userId);
         $user->update([
             'verification'=>'verified',
             'nIdNumber'=>$verify->nIdNumber,
             'about'=>$verify->contact
         ]);
         return redirect()->route('verified.users.list')->with('success','Now the user is verified');
    }

    public function denyVerification($id)
    {
        $deny=Userverification::find($id);
        $user=User::find($deny->userId);
        $user->update([
            'verification'=>'not verified'
        ]);
        $deny->delete();
        Mail::to($user->email)->send(new UserAccountVerification($deny));
        return redirect()->route('user.verification.requests')->with('danger','Verification denied!!!');
    }

    public function verifiedUsers()
    {   $title="Verified Users";
        $list=User::where('verification','verified')->orderBy('updated_at','DESC')->paginate(8);
        return view('backend.layouts.userverification.verifiedusers',compact('list','title'));
    }

}
