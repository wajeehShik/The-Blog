<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'comment',
        'name',
        'email',
        'status',
        'post_id',
    ];
    public function post(){
        return $this->belongsTo(Post::class);
    }
    
}
