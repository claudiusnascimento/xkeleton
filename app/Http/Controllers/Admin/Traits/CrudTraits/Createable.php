<?php

namespace App\Http\Controllers\Admin\Traits\CrudTraits;

trait Createable {

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wildcard = $this->wildcard;

        return view('admin.modules.'. $this->wildcard .'.create', compact('wildcard'));
    }

}
