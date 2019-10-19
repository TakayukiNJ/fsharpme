<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = ['title', 'body'];
    
    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
//クエリビルダー
