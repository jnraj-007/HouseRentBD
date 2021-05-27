<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use App\Models\Userpackage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $title="Home";
        $totaluser=User::all();
        $totalpost=Post::where('status','Active')->get();
        $totalPurchase=Userpackage::where('status','Approved')->orWhere('status','expired')->get();
        $admins=Admin::where('status','Active')->get();
        return view('backend.layouts.adminhome',compact('title','totalpost','totalPurchase','totaluser','admins'));
    }
}
