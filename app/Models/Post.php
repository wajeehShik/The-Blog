<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory,Sluggable;
    protected $fillable=[
     'title',
    'slug',
    'description',
    'content',
    'status',
    'is_finsih_read',
    'comment_able',
    'admin_id',
    'category_id',
    'image',
];  
public function sluggable(): array
{
    return [
        'slug' => [
            'source' => 'title'
        ]
    ];
}
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'posts_tags')->withTimestamps();
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }



    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('assets/posts/'. $this->image);
    }



}
