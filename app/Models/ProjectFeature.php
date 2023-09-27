<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFeature extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','feature_id'];

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

}
