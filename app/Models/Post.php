<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    public function chapters(){
        return $this->hasMany(Chapter::class);
    }
    protected $fillable = [
        'title',
        'description',
        'imageUrl',
    ];
}
