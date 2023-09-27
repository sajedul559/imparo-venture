<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $casts = [
        'content' => 'json',
    ];
    protected $fillable = ['title', 'slug','image','content','status'];
}
