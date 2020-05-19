<?php

namespace App\Models;

use App\Models\Traits\QueryScopeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends XModel
{
    use SoftDeletes, QueryScopeTrait;

    protected $fillable = ['name', 'slug', 'description', 'image', 'active', 'options'];

    public function posts() {
        return $this->belongsToMany(\App\Models\Post::class);
    }
}

