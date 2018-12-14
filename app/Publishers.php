<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publishers extends Model
{
    use SoftDeletes;
    protected $table =  'publishers';
    protected $fillable = ['token','publisherName','publisherDesription'];
    protected $dates = ['deleted_at'];
}
