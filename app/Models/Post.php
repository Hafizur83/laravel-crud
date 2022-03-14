<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'body',
        'author',
        'cat_id',
        'image',
        'status',
        'view'
    ];
    public function catagories(){
        return $this->belongsTo(Catagory::class,'cat_id');
    }
}
