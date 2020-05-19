<?php

namespace App\Models;

use App\Models\Traits\QueryScopeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends XModel
{

    use QueryScopeTrait, SoftDeletes;

    protected $fillable = ['title', 'slug', 'subtitle', 'body', 'image', 'active', 'options'];
}

