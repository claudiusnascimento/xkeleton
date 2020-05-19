<?php

namespace App\Http\Controllers\Admin\Traits\CrudTraits;

trait Storeable {

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request // no need in this trait - use resolve
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $request = resolve($this->modelRequest);

        $fields = property_exists($this, 'storeOnly') ?
            $request->only($this->storeOnly) :
            $request->all();


        $this->query->create($fields);

        message($this->createdMessage);

        return redirect()->route($this->wildcard . '.index');
    }

}


