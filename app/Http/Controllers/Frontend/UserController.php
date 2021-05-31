<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Interest;
use App\Mail\Emailverification;
use App\Mail\PasswordReset;
use App\Mail\ProfileVerificationRequst;
use App\Mail\Registration;
use App\Models\PasswordResets;
use App\Models\Post;
use App\Models\User;
use App\Models\Userpackage;
use App\Models\Userverification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Psy\Util\Str;


class UserController extends Controller
{
    public function userRegistration()
    {
        return view('frontend.layouts.usersignup');
    }

    public function doReg(Request $request)
    {


        $request->validate([
            'name'=>'required',
            'password'=>'required|min:6',
            'email'=>'required|email|unique:users',

        ]);
        $registration=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'image'=>'userImage.jpg'
        ]);

        Mail::to($request->email)->send(new Registration($registration));
        return redirect()->route('frontend.user.reg')->with('success','Registration is successful');
    }

    public function loginForm()
    {
        return view('frontend.layouts.userlogin');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $user_auth=$request->only('email','password');
        if (Auth::guard('user')->attempt($user_auth)){

            $request->session()->regenerate();
            return redirect()->route('home.view');
        }
        return back()->withErrors([
            'email'=>'Invalid credentials']);
    }
    public function userLogout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('home.view');
    }

    public function userDashboard()
    {

//        dd($updateuserpackage);
        $noOfPosts=Post::where('authorId',auth('user')->user()->id)->get();
        $noOfInterestedPosts=\App\Models\Interest::where('userId',auth('user')->user()->id)->get();
        $noOfInterestsUsers=\App\Models\Interest::where('postAuthorId',auth('user')->user()->id)->get();
        $noOfPackages=Userpackage::where('userId',auth('user')->user()->id)->where('status','expired')->orWhere('status','Approved')->get();

        return view('frontend.layouts.user.dashboard.dashboard',compact('noOfPosts','noOfInterestedPosts','noOfInterestsUsers','noOfPackages'));
    }

    public function userProfile()
    {
        return view('frontend.layouts.user.dashboard.profile');
    }

    public function editProfileForm()
    {
        if(\auth('user')->user()->verification=='verified'){
            return view('frontend.layouts.user.dashboard.profileupdate');
        }
        else{
            return  redirect()->back()->with('danger','you must verify your account for update account!!!');
        }
    }

    public function updateUser(Request $request)
    {

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $user_auth=$request->only('email','password');
        if (Auth::guard('user')->attempt($user_auth)){

            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'about' => 'required|min:11|numeric',
                'role' => 'required',
                'newPassword' => 'required',
                'photo' => 'required'
            ]);
            $image = "";

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                if ($file->isValid()) {

                    $image = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('users', $image);


                }
            }
            $updateUser = User::where('id', auth('user')->user()->id)->update([

                'name' => $request->name,
                'address' => $request->address,
                'about' => $request->contact,
                'role' => $request->role,
                'password' => bcrypt($request->newPassword),
                'image' => $image

            ]);


            return redirect()->route('frontend.user.profile')->with('success', 'Profile updated Successfully');
        }

else{    return redirect()->back()->with('success', 'Password Not Matched.');

     }
}


//user password reset
    public function passwordResetForm()
    {
        return view('frontend.layouts.passwordReset.passwordResetForm');
}

    public function emailValidate(Request $request)
    {
        $validateEmail=User::where('email',$request->email)->first();
        $token=\Illuminate\Support\Str::random(40);
        if($validateEmail){
          PasswordResets::insert([

              'email'=>$request->email,
              'token'=>$token
          ]);

            Mail::to($request->email)->send(new PasswordReset($validateEmail,$token));

            return redirect()->back()->with('success','Reset link has been send to you email.');
        }else{
            return redirect()->back()->with('success','Email you Entered is not Valid');
        }

}

    public function updatePasswordForm($id)
    {
//        dd($id);
        $checkToken=PasswordResets::where('token',$id)->first();
        if ($checkToken){
            return view('frontend.layouts.passwordReset.passwordUpdateForm',compact('checkToken'));
        }
        else{
            return  redirect()->route('password.reset.form')->with('success','Token Expired!!!Try Again.');
        }

}

    public function updatePassword(Request $request)
    {
        $password=$request->password;
        $checkpass=$request->password1;
        if ($password==$checkpass){

            User::where('email',$request->email)->update(['password'=>bcrypt($request->password)]);
            $delete=PasswordResets::where('email',$request->email);
            $delete->delete();
            return redirect()->route('frontend.login.form')->with('success','Password Changed successfully!!!Login?');
        }
        else{
            return redirect()->back()->with('success','Password not matched! Try again!');
        }
}



//email verification start

    public function sendVerificationLink()
    {
        $email=auth('user')->user()->email;
        $token=encrypt($email);
        Mail::to($email)->send(new Emailverification($email, $token));
        return redirect()->back()->with('success','Email verification link has been send to you email. Click the link to verify!!!');

//                        Mail::to($request->email)->send(new PasswordReset($validateEmail,$token));


}

    public function clickToVerify($id)
    {
        $token=decrypt($id);
        $update=User::where('email',$token)->first();
        if($update->email_verified_at==null){
            $message="Your Email verified Succesfully !!!";
            $update->update([
                'email_verified_at'=>now(),
            ]);
            return view('frontend.layouts.mail.emailverificationmessage',compact('message'));
        }else{
            $message="your mail is already Varified";
            return view('frontend.layouts.mail.emailverificationmessage',compact('message'));

        }
}
//email verification end

    public function userVerificationForm()
    {
 return view('frontend.layouts.user.userverification.userverificationform');
    }

    public function submitVerification(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'nIdNumber'=>'required|unique:users|min:10|max:10',
           'photo'=>'required|image',
           'frontNId'=>'required|image',
           'backNId'=>'required|image',
           'contact'=>'required|min:11|max:11|unique:users',
        ]);

        $check=User::find(auth('user')->user()->id);
        if ($check->verification=='verified'||$check->verification=='processing'){
            return redirect()->route('frontend.user.profile')->with('danger','Your are not allowed to request for verification!!! ');
        }else{
            $image1="";

            if ($request->hasFile('photo'))
            {
                $file=$request->file('photo');
                if ($file->isValid()){

                    $image1=date('Ymdhms').'.'.$file->getClientOriginalExtension();
                    $file->storeAs('userverification',$image1);


                }
            }
            $image2="";

            if ($request->hasFile('frontNId'))
            {
                $file=$request->file('frontNId');
                if ($file->isValid()){
                    $key=\Illuminate\Support\Str::random(3);

                    $image2=date('Ymdhms').$key.'.'.$file->getClientOriginalExtension();
                    $file->storeAs('userverification',$image2);


                }
            }
            $image3="";

            if ($request->hasFile('backNId'))
            {
                $file=$request->file('backNId');
                if ($file->isValid()){
                    $key=\Illuminate\Support\Str::random(2);

                    $image3=date('Ymdhms').$key.'.'.$file->getClientOriginalExtension();
                    $file->storeAs('userverification',$image3);


                }
            }


            $applyVerification=Userverification::create([
                'name'=>$request->name,
                'nIdNumber'=>$request->nIdNumber,
                'userId'=>auth('user')->user()->id,
                'image'=>$image1,
                'frontNId'=>$image2,
                'backNId'=>$image3,
                'contact'=>$request->contact
            ]);
            $update=User::find(auth('user')->user()->id);
            $update->update([
                'verification'=>'processing',

            ]);
            Mail::to(auth('user')->user()->email)->send(new ProfileVerificationRequst($applyVerification));
            //                        Mail::to($request->email)->send(new PasswordReset($validateEmail,$token));
            return redirect()->route('frontend.user.profile')->with('success','Request for profile verification has been submitted!!!');
        }



    }



}
