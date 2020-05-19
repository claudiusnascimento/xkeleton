<?php

namespace App\Http\Controllers\Admin\Traits\CrudTraits;

trait Editable {

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $model = $this->query->findOrFail($id);
        $wildcard = $this->wildcard;

        return view('admin.modules.'. $this->wildcard .'.edit', compact('model', 'wildcard'));
    }

}
