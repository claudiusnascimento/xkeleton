<?php

namespace App\Http\Controllers\Admin;


use App\Models\Page;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\PageRequest;

use App\Http\Controllers\Admin\Traits\CrudTraits\All;

class PageController extends Controller
{

    use All;

    protected $model = Page::class;
    protected $modelRequest = PageRequest::class;

    protected $query = null;

    protected $createdMessage = 'Página criada com sucesso';
    protected $updatedMessage = 'Página atualizada com sucesso';
    protected $deletedMessage = 'Página deletada com sucesso';

    protected $modelNotFound = 'Página não encontrada';

    protected $wildcard = 'pages';

}
