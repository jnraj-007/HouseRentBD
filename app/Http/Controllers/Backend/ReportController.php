<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportGenerateForm()
    { $title="Report Generate";
        return view('backend.layouts.reportgenerating.paymentreport',compact('title'));
    }

    public function reportGenerate()
    {
        $payments=[];
        $fromDate=null;
        $toDate=null;
        $title="Generate Report";
        if(isset($_GET['from_date']) && isset($_GET['to_date']) )
        {
            $fromDate=date('Y-m-d',strtotime($_GET['from_date']));
            $toDate=date('Y-m-d',strtotime($_GET['to_date']));

//            $allBooking=Booking::whereDate('booking_from',$fromDate)->get();
            $payments=Payment::whereBetween('created_at',[$fromDate,$toDate])->get();
//            dd($allBooking);
        }

        return view('backend.layouts.reportgenerating.paymentreport',compact('payments','fromDate','toDate','title'));

    }
}
