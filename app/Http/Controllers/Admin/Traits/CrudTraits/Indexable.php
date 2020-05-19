<?php

namespace App\Http\Controllers\Admin\Traits\CrudTraits;

trait Indexable {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $models = $this->query->get();

        return view('admin.modules.'. $this->wildcard .'.index')
                ->with('models', $models)
                ->with('wildcard', $this->wildcard);
    }

}
