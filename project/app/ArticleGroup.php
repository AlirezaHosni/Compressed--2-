<?php

namespace App;

use App\Http\Requests\createRegisterRequest;
use Illuminate\Database\Eloquent\Model;

class ArticleGroup extends Model
{
    protected $guarded = ['id'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function parent()
    {
        return $this->belongsTo($this, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany($this, 'parent_id')->get();
    }

    public static function allchildren(ArticleGroup $articleGroup, array $result=[])
    {
        if (count($articleGroup->children()) == 0)
            return $result;
        foreach ($articleGroup->children() as $child){
            array_push($result, $child);
            $result = ArticleGroup::allchildren($child, $result);
        }
        return $result;
    }

    public static function getMaxLevel()
    {
        $articleGroups = ArticleGroup::all();
        $level = 0;
        $maxLevel = 0;
        foreach ($articleGroups as $articleGroup){
            while ($articleGroup->parent_id){
                $level++;
                if ($level > $maxLevel)
                    $maxLevel = $level;

                $articleGroup = $articleGroup->parent();
            }
            $level = 0;
        }
        return $maxLevel;
    }

    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', null)->orderBy('id')->get();
    }
}
