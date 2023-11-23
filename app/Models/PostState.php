<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;   

class PostState extends Model
{
    use HasFactory;

    function posts()
    {
        $this->hasMany(Post::class);
    }
}
