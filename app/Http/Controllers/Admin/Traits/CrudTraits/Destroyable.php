<?php

namespace App\Http\Controllers\Admin\Traits\CrudTraits;

trait Destroyable {

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->query->find($id);

        if(!$model) {
            message($this->modelNotFound, 'toastr', 'error');
            return redirect()->route($this->wildcard . '.index');
        }

        $model->delete();

        message($this->deletedMessage);

        return redirect()->route($this->wildcard . '.index');

    }

}
