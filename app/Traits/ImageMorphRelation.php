<?php

namespace App\Traits;

use App\Models\Image;

trait ImageMorphRelation
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
