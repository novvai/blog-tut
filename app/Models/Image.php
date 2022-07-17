<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo

     */
    public function imageable()
    {
        return $this->morphTo();
    }

    public function url()
    {
        return Storage::url($this->attributes['path']);
    }
}
