<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use App\Models\Userpackage;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function view(){
       $packages= Package::all();
       $title="Package List";
       return view('backend.layouts.packages.pview',compact('packages','title'));
    }
    public function packageadd(Request $request){
        $cool=Package::create([
            'name'=>$request->package_name,
            'description'=>$request->description,
            'price'=>$request->package_price,
            'status'=>$request->status,
            'numberofposts'=>$request->postNo

        ]);
        return redirect()->back();
    }

    public function packageDelete($id)
    {
        $delete=Package::find($id);
        $delete->delete();
        return redirect()->route('package.view');
    }

    public function purchaseRequest()
    {    $title="Purchase Request";
        $purchaseRequest=Userpackage::with('userdata')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        return view('backend.layouts.purchase.purchaserequest',compact('purchaseRequest','title'));
    }

    public function approveRequest($id)
    {

        $approve=Userpackage::find($id);
        $approve->update([
            'status'=>'Approved',
            'current_package_status'=>'active'

        ]);
        $username=User::find($approve->userId);

        Payment::create([

            'userId'=>$approve->userId,
            'userName'=>$username->name,
            'packageId'=>$approve->package_id,
            'packageName'=>$approve->packageName,
            'approvedBy'=>auth('admin')->user()->name,
            'purchaseId'=>$approve->id,
            'amount'=>$approve->amountToPay,
            'paymentDate'=>$approve->created_at,
            'transactionId'=>$approve->transactionId
        ]);
        return redirect()->back()->with('success','Request Approved');

}

    public function disapproveRequest($id)
    {

       $disapprove= Userpackage::find($id);
       $disapprove->update([
           'status'=>'Disapproved'
       ]);
       return redirect()->back()->with('success','Request has been Disapproved');

}

    public function disapproveAfterApprove($id)
    {
        $disapprove=Userpackage::find($id);
        $disapprove->update([
            'status'=>'Disapproved',
            'current_package_status'=>'Inactive'
        ]);
        $payment=Payment::where('purchaseId',$id);
       $payment->delete();
       return redirect()->back()->with('success','Request Disapproved Successfully!!!');

}

    public function disapprovedList()
    {
        $title="Disapproved Purchase Requests";
        $disapprovedRequests=Userpackage::with('userdata')->where('status','Disapproved')->orderBy('updated_at','DESC')->paginate(10);
        return view('backend.layouts.purchase.purchaseDisapproved',compact('disapprovedRequests','title'));

    }

    public function approvedList()
    {
        $title="Approved Purchase Requests";
        $approvedRequests=Userpackage::with('userdata')->where('status','Approved')->orWhere('status','expired')->orderBy('updated_at','desc')->paginate(10);
        return view('backend.layouts.purchase.approved',compact('approvedRequests','title'));

    }

    public function paymentHistory()
    {
        $title="Payment History";
        $paymentHistory=Payment::orderBy('created_at','DESC')->paginate(10);
        return view('backend.layouts.payment.paymenthistory',compact('paymentHistory','title'));
    }


}
