<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'alias'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Gets the Author image
     */
    public function image()
    {
        return $this->morphTo(Image::class, 'imageable');
    }
}
