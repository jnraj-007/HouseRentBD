<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function userinterest(){
      return  $this->belongsTo(User::class,'userId','id');

    }
    public function authordetails(){
      return  $this->belongsTo(User::class,'postAuthorId','id');

    }
    public function postinterest(){
     return   $this->belongsTo(Post::class,'postId','id');


    }
    public function interestPosts()
    {
        return $this->belongsTo(Post::class,'postId','id');
    }

    public function userinterestsdetails()
    {
        return $this->belongsTo(User::class,'userContact','contact');
    }
}
