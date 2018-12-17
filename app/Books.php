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

    public function toArray(){
        $array = parent::toArray();
        $array['publishers'] = $this->getPublisher->pluck('id','publisherName')->all();
        return $array;
    }
}
