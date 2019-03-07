<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookmark extends Model
{
    use SoftDeletes;
    protected $table =  'bookmark';
    protected $fillable = ['image','attached_book','get_from'];
    protected $dates = ['deleted_at'];

    
}
