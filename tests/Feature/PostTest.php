<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected $posts;

    public function createPosts($n = 5) {

        $this->posts = factory(Post::class, $n)->create();
    }

    /** @test */
    public function the_post_route_exists()
    {

        $user = factory(User::class)->create();

        \Auth::login($user);

        $response = $this->get('/admin/posts');

        $response->assertStatus(200);

        \Auth::logout();
    }

    /** @test */
    public function it_fetches_all_posts()
    {
        $this->createPosts();

        $this->assertEquals($this->posts->count(), 5);
    }

    /** @test */
    public function access_list_post_page()
    {
        $user = factory(User::class)->create();

        \Auth::login($user);

        $response = $this->get('/admin/posts');

        $response->assertSuccessful();

        $response->assertViewIs('admin.modules.posts.index');

        $response->assertViewHas('models', Post::query()->get());

        $response->assertSee('Posts');
    }

    /** @test */
    public function see_page_post()
    {
        $user = factory(User::class)->create();

        \Auth::login($user);

        $post = factory(Post::class)->create();

        $response = $this->get('/admin/posts/' . $post->id . '/edit');

        $response->assertSuccessful();

        $response->assertViewIs('admin.modules.posts.edit');

        $response->assertViewHas('model', $post);

        $response->assertSee('Edição de Post');
    }
}
