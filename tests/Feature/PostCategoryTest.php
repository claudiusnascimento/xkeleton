<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\PostCategory;

class PostCategoryTest extends TestCase
{
    use RefreshDatabase;

    protected $categories;

    public function createCategories($n = 5) {

        $this->categories = factory(PostCategory::class, $n)->create();
    }

    /** @test */
    public function the_post_categories_route_exists()
    {

        $user = factory(User::class)->create();

        \Auth::login($user);

        $response = $this->get('/admin/pages');

        $response->assertStatus(200);

        \Auth::logout();
    }

    /** @test */
    public function it_fetches_all_posts_categories()
    {
        $this->createCategories();

        $this->assertEquals($this->categories->count(), 5);
    }

    /** @test */
    public function access_list_post_categories_page()
    {
        $user = factory(User::class)->create();

        \Auth::login($user);

        $response = $this->get('/admin/post-categories');

        $response->assertSuccessful();

        $response->assertViewIs('admin.modules.post-categories.index');

        $response->assertViewHas('models', PostCategory::query()->get());

        $response->assertSee('Categorias de Post');
    }

    /** @test */
    public function see_page_page()
    {
        $user = factory(User::class)->create();

        \Auth::login($user);

        $categorie = factory(PostCategory::class)->create();

        $response = $this->get('/admin/post-categories/' . $categorie->id . '/edit');

        $response->assertSuccessful();

        $response->assertViewIs('admin.modules.post-categories.edit');

        $response->assertViewHas('model', $categorie);

        $response->assertSee('Edição de Categoria de Post');
    }
}
