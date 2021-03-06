<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{

    protected $fillable = [
        'title', 'body',
    ];

    public function comments()
    {
        return $this->morphMany(comment::class, 'commentable')->where('parent_id',0);
    }
}
