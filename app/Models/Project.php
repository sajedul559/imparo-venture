<?php

namespace App\Models;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $casts = [
        'content' => 'json',
    ];
    protected $fillable = ['title', 'slug','image','content','category_id','status'];

    public function features()
    {
        return $this->hasMany(ProjectFeature::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function projectGalleries()
    {
        return $this->hasMany(ProjectGallery::class);
    }

}
