<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\UserRequest;

use App\Http\Controllers\Admin\Traits\CrudTraits\All;

class UserController extends Controller
{

    use All;

    protected $model = User::class;
    protected $modelRequest = UserRequest::class;

    protected $query = null;

    protected $createdMessage = 'Usuário criado com sucesso';
    protected $updatedMessage = 'Usuário atualizado com sucesso';
    protected $deletedMessage = 'Usuário deletado com sucesso';

    protected $modelNotFound = 'Usuário não encontrado';

    protected $wildcard = 'users';

    protected $updateOnly = ['name', 'email', 'active'];

}
