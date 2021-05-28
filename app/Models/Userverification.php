<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userverification extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function viewData()
    {
      return  $this->belongsTo(User::class,'userId','id');
    }
}
