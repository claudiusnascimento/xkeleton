<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UploadWysiwygRequest;
use Exception;


class UploadController extends Controller
{

    public function upload(UploadWysiwygRequest $request)
    {

        $uploads = [];

        foreach($request->file('images') as $uploadedFile) {
            $uploads[] = asset('storage/' . $uploadedFile->store($request->get('uploaddir')));
        }

        return response()->json(['uploads' => $uploads]);

    }

    /**
     *  Can't do that... Becose maybe user is in editing mode
     */
    public function delete()
    {
        /*
        $imgSrc = request()->get('image', '');

        if(!empty($imgSrc)) {

            $explode = explode('storage', $imgSrc);

            if(count($explode) == 2) {

                $file = trim($explode[1], '/');

                if(\Storage::exists($file)) {
                    \Storage::delete($file);
                }

            }
        }
        */

    }

}
