<?php

namespace App\Http\Controllers\Admin;

use DB;

use App\Models\PostCategory;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\PostCategoryRequest;

use App\Http\Controllers\Admin\Traits\CrudTraits\All;

class PostCategoryController extends Controller
{

    use All;

    protected $model = PostCategory::class;
    protected $modelRequest = PostCategoryRequest::class;

    protected $query = null;

    protected $createdMessage = 'Categoria criada com sucesso';
    protected $updatedMessage = 'Categoria atualizada com sucesso';
    protected $deletedMessage = 'Categoria deletada com sucesso';

    protected $modelNotFound = 'categoria não encontrada';

    protected $wildcard = 'post-categories';

}
