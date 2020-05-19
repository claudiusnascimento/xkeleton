<?php

namespace App\Http\Controllers\Admin\Traits\CrudTraits;

trait Updateable {

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request // no need in this trait - use resolve
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $request = resolve($this->modelRequest);

        $model = $this->query->findOrFail($id);

        $fields = property_exists($this, 'updateOnly') ?
            $request->only($this->updateOnly) :
            $request->all();

        $model->update($fields);

        /*if($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => $this->updatedMessage
            ]);
        }*/

        message($this->updatedMessage);

        return redirect()->route($this->wildcard . '.index');
    }

}


