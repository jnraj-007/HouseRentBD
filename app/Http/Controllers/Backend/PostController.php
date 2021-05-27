<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
public function viewpost(){
    $title=" Post List";
    $posts= Post::with('userDetails','categoryName')->where('status','Active')->orderBy('created_at','Desc')->paginate(8);
    return view('backend.layouts.post.postList',compact('posts','title'));

}
public function postform(){

      $category=Category::all();
    $title="Add Post";
    return view('backend.layouts.post.postform',compact('title','category'));

}
public function addpost(Request $request){
    $image="";

if ($request->hasFile('postimage'))
{


    $file=$request->file('postimage');
    if ($file->isValid()){

        $image=date('Ymdhms').'.'.$file->getClientOriginalExtension();
        $file->storeAs('posts',$image);


    }
}
    $post=Post::create([
        'title'=>$request->post_title,
        'categoryId'=>$request->catId,
        'rentAmount'=>$request->price,
        'region'=>$request->region,
        'sectorNo'=>$request->sectorNo,
        'roadNo'=>$request->roadNo,
        'houseNo'=>$request->houseNo,
        'description'=>$request->description,
        'status'=>$request->status,
        'image'=>$image,
        'authorId'=>auth()->user()->id,
        'authorName'=>auth()->user()->name,
        'authorRole'=>auth()->user()->role
        ]);
    return redirect()->route('post.view');

}

    public function postdelete($id)
    {
        $delete=Post::find($id);
        $delete->delete();
        return redirect()->route('post.view');

 }
}
