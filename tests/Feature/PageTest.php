<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Page;

class PageTest extends TestCase
{
    use RefreshDatabase;

    protected $pages;

    public function createPages($n = 5) {

        $this->pages = factory(Page::class, $n)->create();
    }

    /** @test */
    public function the_page_route_exists()
    {

        $user = factory(User::class)->create();

        \Auth::login($user);

        $response = $this->get('/admin/pages');

        $response->assertStatus(200);

        \Auth::logout();
    }

    /** @test */
    public function it_fetches_all_pages()
    {
        $this->createPages();

        $this->assertEquals($this->pages->count(), 5);
    }

    /** @test */
    public function access_list_pages_page()
    {
        $user = factory(User::class)->create();

        \Auth::login($user);

        $response = $this->get('/admin/pages');

        $response->assertSuccessful();

        $response->assertViewIs('admin.modules.pages.index');

        $response->assertViewHas('models', Page::query()->get());

        $response->assertSee('Páginas');
    }

    /** @test */
    public function see_page_page()
    {
        $user = factory(User::class)->create();

        \Auth::login($user);

        $page = factory(Page::class)->create();

        $response = $this->get('/admin/pages/' . $page->id . '/edit');

        $response->assertSuccessful();

        $response->assertViewIs('admin.modules.pages.edit');

        $response->assertViewHas('model', $page);

        $response->assertSee('Edição de página');
    }
}
