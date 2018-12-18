<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;
    protected $table =  'author';
    protected $fillable = ['token','authorName','authorDescription'];
    protected $dates = ['deleted_at'];

    public function getAuthorsid(){
        return $this->hasMany('App\author','books_to_author','author_id','book_id');
    }
}
