<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Post;
use App\Models\PostCategory;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\PostRequest;

use App\Http\Controllers\Admin\Traits\CrudTraits\All;

class PostController extends Controller
{

    use All;

    protected $model = Post::class;
    protected $modelRequest = PostRequest::class;

    protected $query = null;

    protected $createdMessage = 'Post criado com sucesso';
    protected $updatedMessage = 'Post atualizado com sucesso';
    protected $deletedMessage = 'Post deletado com sucesso';

    protected $modelNotFound = 'post não encontrado';

    protected $wildcard = 'posts';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wildcard = $this->wildcard;

        $categories = PostCategory::activated()
                                    ->orderBy('name', 'asc')
                                    ->get(['name', 'id']);

        return view('admin.modules.'. $this->wildcard .'.create', compact('wildcard', 'categories'));
    }

    public function store(PostRequest $request)
    {

        DB::beginTransaction();

        try {

            $model = $this->query->create($request->except('categories'));

            $model->categories()->sync($request->get('categories', []));

        } catch (\Exception $e) {

            DB::rollBack();
            // TODO
            // some log

            message('Ocorreu um erro ao cadastras o post', 'toastr', 'error');

            return redirect()->back()->withInput();
        }

        DB::commit();

        message($this->createdMessage);

        return redirect()->route($this->wildcard . '.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->query->with('categories')->findOrFail($id);

        $categories = PostCategory::activated()
                                    ->orderBy('name', 'asc')
                                    ->get(['name', 'id']);

        $wildcard = $this->wildcard;

        return view('admin.modules.'. $this->wildcard .'.edit', compact('model', 'wildcard', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request // no need in this trait - use resolve
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {

        $model = $this->query->findOrFail($id);

        DB::beginTransaction();

        try {

            $model->update($request->except('categories'));

            $model->categories()->sync($request->get('categories', []));

        } catch (\Exception $e) {

            DB::rollBack();
            // TODO
            // some log

            message('Ocorreu um erro ao editar o post', 'toastr', 'error');

            return redirect()->back()->withInput();
        }

        DB::commit();

        message($this->updatedMessage);

        return redirect()->route($this->wildcard . '.index');
    }

}
