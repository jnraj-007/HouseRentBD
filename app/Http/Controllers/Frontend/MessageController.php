<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messageForm($postId,$toId)
    { $messages=Message::where('postId',$postId)->where('fromId',auth('user')->user()->id)->where('toId',$toId)->orWhere(function ($query) use($postId,$toId){
        $query->where('postId',$postId)->where('toId',auth('user')->user()->id)->where('fromId',$toId);
    })->get();
    /*Message::where('postId',$postId)->orWhere(function ($query){
        $query->where('toId',auth('user')->user()->id)->where('fromId',auth('user')->user()->id);
    })->get();*/


        return view('frontend.layouts.message.messageformuser',compact('postId','toId','messages'));
    }
    public function postMessage(Request $request,$postId,$toId){
      $message=Message::create([
          'fromId'=>auth('user')->user()->id,
          'toId'=>$toId,
          'postId'=>$postId,
          'message'=>$request->message

      ]);
      return redirect()->back();

    }
//
//    public function messageFormOwner($postId,$fromId)
//    {
//        $messages=Message::where('fromId',auth('user')->user()->id)->where('postId',$postId)->orWhere('toId',$toId)->where(function ($query) use($postId,$toId){
//            $query->where('toId',auth('user')->user()->id)->where('postId',$postId)->where('fromId',$toId);
//        })->get();
//
//        return view('frontend.layouts.message.messageformuser',compact('postId','toId','messages'));
//    }

    public function ownerPostMessage(Request $request,$postId,$fromId){
        $message=Message::create([
            'toId'=>auth('user')->user()->id,
            'fromId'=>$fromId,
            'postId'=>$postId,
            'message'=>$request->message

        ]);
        return redirect()->back();

    }
}
