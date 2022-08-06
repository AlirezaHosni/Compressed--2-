<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalysisType extends Model
{
    protected $table = 'analysis_types';

    protected $fillable = ['title', 'description'];
}
