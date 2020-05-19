<?php

namespace App\Models;

use App\Models\Traits\QueryScopeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends XModel
{
    use SoftDeletes, QueryScopeTrait;

    protected $fillable = ['title', 'slug', 'resume', 'content', 'image', 'active', 'options'];

    public function categories() {
        return $this->belongsToMany(\App\Models\PostCategory::class);
    }
}
