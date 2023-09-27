<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $casts = [
        'content' => 'json',
    ];
    protected $fillable = ['title', 'slug','language','content','meta_description','meta_keywords','template_name','status'];

}
