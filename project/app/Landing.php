<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Landing extends Model
{
    use SoftDeletes, Notifiable;

    protected $dates=['deleted_at'];

    protected $guarded=['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
