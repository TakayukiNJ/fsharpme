<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['body'];

    // $comment->book
    public function book() {
        return $this->belongsTo(App\Book);
    }
}
