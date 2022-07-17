<?php

namespace App\Models;

use App\Traits\ImageMorphRelation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory, ImageMorphRelation;

    // protected $fillable = ['first_name', 'last_name', 'alias'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function postsCount()
    {
        return count($this->posts);
    }
}
