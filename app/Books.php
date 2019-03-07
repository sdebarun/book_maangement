<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
    use SoftDeletes;
    protected $table =  'books';
    protected $fillable = ['bookName','publisher_id','bookDescription'];
    protected $dates = ['deleted_at'];

    public function getPublisher(){
        return $this->belongsTo('App\Publishers','publisher_id');
    }

    public function getAuthorsid(){
        return $this->belongsToMany('App\author','books_to_author','book_id','author_id');
    }

    
    // public function toArray(){
    //     $array = parent::toArray();
    //     $array['publishers'] = $this->getPublisher->pluck('publisherName','id')->all();
    //     $array['authors'] = $this->getAuthorsid->pluck('authorName','id')->all();
    //     return $array;
    // }
}
