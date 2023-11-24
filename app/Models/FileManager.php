<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $validate)
 * @method static where(string $string , mixed $id)
 */
class FileManager extends Model
{
    use HasFactory;

    protected $table = "file_managers";

    protected $fillable= [
        'description',
        'slug',
        'file',
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
