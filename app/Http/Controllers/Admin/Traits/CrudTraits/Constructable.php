<?php

namespace App\Http\Controllers\Admin\Traits\CrudTraits;

trait Constructable {


    public function __construct() {

        $this->query = app()->make($this->model)->newQuery();
    }

}
