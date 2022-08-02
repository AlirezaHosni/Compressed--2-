<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded=['id'];
    public function articleGroups(){
        return $this->hasMany(ArticleGroup::class);
    }
    
    public function parent()
    {
        return $this->belongsTo($this, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany($this, 'parent_id')->orderBy('id');
    }
    
    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', null)->orderBy('id')->get();
    }
}
