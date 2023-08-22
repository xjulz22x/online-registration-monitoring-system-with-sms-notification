<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['id' , 'author_id' , 'title', 'content' , 'post_image'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
