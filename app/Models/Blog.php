<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(Blog $blog)
 * @method static where(string $string , mixed $id)
 * @method static create(mixed $validate)
 */
class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    protected $fillable = [
        'title' ,
        'slug' ,
        'description' ,
        'short_description' ,
        'content' ,
        'image' ,
        'user_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
