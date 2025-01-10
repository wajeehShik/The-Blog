<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
'description',
'logo',
'facebook',
'twiter',
'linked_in',
'youtube',
'phone',
'gmail',
'admin_id',
    ];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
  
    public function getlogoUrlAttribute()
    {
        // if (!$this->logo) {
        //     return 'https://www.incathlab.com/logos/products/default_product.png';
        // }
        // if (Str::startsWith($this->logo, ['http://', 'https://'])) {
        //     return $this->logo;
        // }
        return asset( $this->logo);
    }
}
