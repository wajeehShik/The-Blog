<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMedia extends Model
{
    use HasFactory;
    protected $fillable=[
        'post_id',
        'file_name',
        'file_type',
        'file_size',
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
