<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Userpackage;
use Illuminate\Http\Request;

class PackageController extends Controller
{

//    show approved post
    public function viewPackages()
    {

        $user=Userpackage::where('userId',auth('user')->user()->id)->where('status','Approved')->orderBy('created_at','DESC')->paginate(3);

        $packages=Package::all();
        return view('frontend.layouts.user.dashboard.userpackages',compact('packages','user'));
    }

//    show pending post

    public function pendingPackage($id)
    {
        switch ($id){
            case 'pending':

        $packageStatus="Pending Packages";
        $user=Userpackage::where('userId',auth('user')->user()->id)->where('status','pending')->orderBy('created_at','DESC')->paginate('6');
        return view('frontend.layouts.user.dashboard.purchaseHistory',compact('user','packageStatus'));
        break;
            case 'Disapproved':
                $packageStatus="Disapproved Purchase";
                $user=Userpackage::where('userId',auth('user')->user()->id)->where('status','Disapproved')->orderBy('updated_at','DESC')->paginate('6');
                return view('frontend.layouts.user.dashboard.purchaseHistory',compact('user','packageStatus'));
                break;
            case 'history':
                $packageStatus="Purchase History";
                $user=Userpackage::where('userId',auth('user')->user()->id)->where('status','expired')->orderBy('updated_at','DESC')->paginate('6');
                return view('frontend.layouts.user.dashboard.purchaseHistory',compact('user','packageStatus'));
                break;
            case 'Approved':
                $packageStatus="Approved Purchase";
                $user=Userpackage::where('userId',auth('user')->user()->id)->where('status','Approved')->orderBy('updated_at','DESC')->paginate('6');
                return view('frontend.layouts.user.dashboard.purchaseHistory',compact('user','packageStatus'));
                break;

            default: return redirect()->back();
                break;

        }
    }

    public function purchaseForm($id)
    {
//        dd($id);
        $data= Package::where('id',$id)->first();
        return view('frontend.layouts.user.dashboard.purchase',compact('data'));
    }

    public function packagePurchase(Request $request)
    {
        Userpackage::create([
            'userId'=>auth('user')->user()->id,
            'package_id'=>$request->packageId,
            'package_price'=>$request->packagePrice,
            'numberOfPosts'=>$request->numberofposts,
            'transactionId'=>$request->transactionId,
            'amountToPay'=>$request->pricePaid,
            'packageName'=>$request->packageName,
            'paymentMethod'=>$request->paymentMethod


        ]);
        return redirect()->route('user.package.view');

    }

}
