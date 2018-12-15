<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    //use SoftDeletes;
    protected $table =  'books';
    protected $fillable = ['bookName','publisher_id','bookDescription'];
    protected $dates = ['deleted_at'];
}
