<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'video';
    protected $fillable = [
        'title', 'description', 'image', 'link', 'status', 'slug'
    ];
}
