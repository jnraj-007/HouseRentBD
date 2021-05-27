<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function categoryName()
    {return $this->belongsTo(Category::class,'categoryId','id');
    }
    public function userDetails()
    {return $this->belongsTo(User::class,'authorId','id');
    }


}
