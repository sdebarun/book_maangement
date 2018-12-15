<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book_Author_Relationship extends Model
{
    use SoftDeletes;
    protected $table =  'books_to_author';
    protected $fillable = ['book_id','author_id'];
    protected $dates = ['deleted_at'];
}
