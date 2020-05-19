<?php

namespace App\Extends;

use Closure;
use Illuminate\Database\Schema\Blueprint;

// do the work when app is a multilanguage
class XBlueprint extends Blueprint
{

    public function __construct($table, Closure $callback = null, $prefix = '')
    {
        parent::_construct($table, $callback, $prefix);
    }

}
