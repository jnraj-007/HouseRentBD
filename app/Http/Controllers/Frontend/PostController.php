<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Interest;
use App\Models\Package;
use App\Models\Post;
use App\Models\User;
use App\Models\Userpackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Global_;

class PostController extends Controller
{
    public function posts()
    {
        $categories=Category::all();
        $posts = Post::with(['categoryName','userDetails'])
            ->whereHas('userDetails',function ($query){
                $query->where('status','Active');
            })
            ->where('status','Active')->paginate('9');
        return view('frontend.layouts.posts', compact('posts','categories'));
    }

    //post under category

    public function postsUnderCategory($id)
    {  $categories=Category::all();
        $category = Category::find($id);
         $posts=Post::where('categoryId',$id)->orderBy('created_at','desc')->where('status','Active')->paginate('9');
//        dd($posts);
//        return view('frontend.layouts.post.postUnderCategory',compact('posts','categories'));
        return view('frontend.layouts.posts', compact('posts','categories','category'));

    }


    public function viewSinglePost($id)
    {
        $categories=Category::all();

        $posts = Post::find($id);
        $sameCategoryPosts=Post::with('categoryName')->where('categoryId',$posts->categoryId)->where('id','!=',$id)->orderBy('created_at','DESC')->paginate(8);
        if (Auth::guard('user')->check()) {

            $checkPost = Interest::where('userId', auth('user')->user()->id)->where('postId', $id)->first();
            return view('frontend.layouts.post.singlePostView', compact('posts', 'checkPost','categories','sameCategoryPosts'));
        } else {

            return view('frontend.layouts.post.singlePostView', compact('posts','categories','sameCategoryPosts'));
        }
    }

//add interest to interest table
    public function interested($id)
    {
            $getAuthorId=Post::find($id);
//        $user=Interest::with('userinterestsdetails')->get();
        if(auth('user')->user()->contact==null){
            return redirect()->back()->with('success','Please add contact to interest in a post');
        }


        Interest::create([
            'postId' => $id,
            'userId' => auth('user')->user()->id,
            'postAuthorId'=>$getAuthorId->authorId,
            'userContact'=>auth('user')->user()->contact


        ]);
        return redirect()->back();
    }

//    cancel purchase reqeust

    public function cancelPackagePurchase($id)
    {

        $cancel=Userpackage::find($id);
        if ($cancel->status=='Approved'){
            return redirect()->back()->with('success','Request has Already been Approved');
        }else{


            $cancel->delete();
            return redirect()->back()->with('success','Package Purchase cancelled .');
        }
}



    public function interestedPosts()
    {
        $interestedPosts = Interest::with('interestPosts')->
        where('userId', auth('user')->user()->id)->
        orderBy('created_at','DESC')
//            ->where('status','Disapproved')
            ->Where('status','pending')
            ->paginate('3');

        $interestedPost=Interest::with('interestPosts')->
        where('userId', auth('user')->user()->id)->
        where('status','Disapproved')->
        orderBy('created_at','DESC')->
        paginate('3');

        $interestedPo=Interest::with('interestPosts')->
        where('userId', auth('user')->user()->id)->
        where('status','Approved')->
        orderBy('created_at','DESC')->
        paginate('5');


/*if you want to see the  interested posts in a card view than use pluck to get all the ids
        $ids = $interestedPosts->pluck('postId')->toArray();

        $posts = Post::whereIn('id', $ids)->get();--}*/


        return view('frontend.layouts.user.dashboard.interests', compact('interestedPosts','interestedPost','interestedPo'));
    }

//    public function approve($id)
//    {
//     $approve=Interest::find($id);
//     $approve->update([
//
//
//         'status'=>'Approved'
//
//     ]);
//     return redirect()->back();
//
//    }

//user can approve or disapprove the requests to their posts
    public function approve($id,$action)
    {
        $stringName=$action;

        switch ($stringName){


            case 'approve':
                $approve=Interest::find($id);
     $approve->update([


         'status'=>'Approved',
         'postAuthorContact'=>auth('user')->user()->contact

     ]);
     return redirect()->back();
     break;
            case 'disapprove':
                $approve=Interest::find($id);
     $approve->update([


         'status'=>'Disapproved'

     ]);
     return redirect()->back();
     break;


        }

}
//user request delete
    public function deleteRequest($id)
    {
        $check=Interest::find($id);
        if ($check->status=='Approved'){
            return redirect()->back()->with('success','Request Has been Approved by user');

        }
        elseif ($check->status=="Disapproved"){
            return redirect()->back()->with('success','Request Has been Disapproved by user');
        }
        else{

            $deleteRequest= Interest::find($id);
            $deleteRequest->delete();

            return redirect()->back()->with('success','Request deleted successfully');
        }

}
///user post delete
    public function deletePost($id)
    {

        $deletepost=Post::find($id);
        $deleteRequest=Interest::where('postId',$id);
        $deletepost->delete();
        $deleteRequest->delete();
        return redirect()->back()->with('success','Post deleted successfully.');

}
  public function viewInterestedUsers()
  {
       $interestedUsers=Interest::with('userinterest','postinterest')->
       where('postAuthorId',auth('user')->user()->id)->
       where('status','pending')->get();

       $approvedUsers=Interest::with('userinterest','postinterest')->
       where('postAuthorId',auth('user')->user()->id)->
       where('status','Approved')->get();

       $disapprovedUsers=Interest::with('userinterest','postinterest')->
       where('postAuthorId',auth('user')->user()->id)->
       where('status','Disapproved')->get();

       return view('frontend.layouts.user.dashboard.interestedUserList',compact('interestedUsers','approvedUsers','disapprovedUsers'));

    }

    public function userPostForm()
    {

        $checkPackage = Userpackage::where('userId', auth('user')->user()->id)->where('status', 'Approved')->get();

        $category = Category::all();
        $isExist = !(auth('user')->user()->userpackages()->where('current_package_status', 'active')->exists());


        return view('frontend.layouts.user.dashboard.usercreatepost', compact('category', 'isExist'));
    }

    public function userAddPost(Request $request)
    {
           $package_count = auth('user')->user()->userpackages()->where('current_package_status', 'active')->orWhere('status','Approved')->where('numberOfPosts','>',0)->first();


           if ($package_count == null) {

               return redirect()->back()->with('success','You do not have any posts left to do. Please purchase a package');
           }
           else{
               $request->validate([
                   'post_title'=>'required',
                   'catId'=>'required',
                   'price'=>'required',
                   'bed'=>'required',
                   'bathroom'=>"required",
                   'area'=>"required",
                   'unit'=>"required",
                   'region'=>"required",
                   'sectorNo'=>"required",
                   'roadNo'=>"required",
                   'houseNo'=>"required",
                   'postimage'=>"required",
                   'description'=>"required",
                   'latitude'=>"required",
                   'longitude'=>"required"
                   ]);



              // now()->format('Y-m-d') > $data->expire_at
           $image = "";

           if ($request->hasFile('postimage')) {
               $file = $request->file('postimage');
               if ($file->isValid()) {

                   $image = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                   $file->storeAs('posts', $image);


               }
           }
           $post = Post::create([
               'title' => $request->post_title,
               'categoryId' => $request->catId,
               'rentAmount' => $request->price,
               'region' => $request->region,
               'sectorNo' => $request->sectorNo,
               'roadNo' => $request->roadNo,
               'houseNo' => $request->houseNo,
               'description' => $request->description,
               'image' => $image,
               'authorId' => auth('user')->user()->id,
               'authorName' => auth('user')->user()->name,
               'authorRole' => auth('user')->user()->role,
               'packageId' => $package_count->id,
               'expire_at'=>now()->addMonth(),
               'latitude'=>$request->latitude,
               'longitude'=>$request->longitude,
               'bedroom'=>$request->bed,
               'bathroom'=>$request->bathroom,
               'area'=>$request->area,
               'unit'=>$request->unit
           ]);

           $package_count->decrement('numberOfPosts');
           return redirect()->route('user.posts.view');
       }}





    public function userPostView()
    {
        $posts = Post::where('authorId', auth('user')->user()->id)->
        where('authorRole', auth('user')->user()->role)->
        orderBy('created_at','DESC')->paginate('5');

        return view('frontend.layouts.user.dashboard.userpostview', compact('posts'));

    }

}
