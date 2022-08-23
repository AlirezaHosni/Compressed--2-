<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Article extends Model
{
    use SoftDeletes, Notifiable;

    protected $fillable = ['title', 'shortNews', 'titleTwo', 'image', 'publishDate', 'imageAlt', 'url', 'source', 'metaDescription', 'metaKeyWords', 'user_id', 'tag', 'article_Group_id', 'image', 'mainContent', 'summary', 'active'];

    public function article_group()
    {
        return $this->belongsTo(ArticleGroup::class, 'article_Group_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
