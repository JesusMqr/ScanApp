<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }

    protected $fillable = [
        'title',
        'number',
        'post_id',
    ];
}
