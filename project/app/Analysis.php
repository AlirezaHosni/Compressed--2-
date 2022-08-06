<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Analysis extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $table = 'analysis';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }
}
