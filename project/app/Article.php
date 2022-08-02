<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'shortNews', 'titleTwo', 'image', 'publishDate', 'imageAlt', 'urll', 'source', 'metaDescription', 'metaKeyWords', 'user_id', 'tag', 'article_Group_id', 'image', 'mainContent', 'summary', 'active'];

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
        return $this->hasMany(Comment::class);
    }
}
