<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
