<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['message'];
    
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
