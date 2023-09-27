<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status','slug'];
    public function projects()
    {
         $project =  $this->hasMany(Project::class)->orderby('id','desc');
        return $project;
    }
}
