<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class UserTest extends TestCase
{

    use RefreshDatabase;

    protected $users;

    public function createUsers($n = 5) {

        $this->users = factory(User::class, $n)->create();
    }

    /** @test */
    public function the_user_route_exists()
    {
        $user = factory(User::class)->create();

        \Auth::login($user);

        $response = $this->get('/admin/users');

        $response->assertStatus(200);

        \Auth::logout();
    }

    /** @test */
    public function it_fetches_all_users()
    {
        $this->createUsers();

        $this->assertEquals($this->users->count(), 5);
    }

    /** @test */
    public function testing_users_count()
    {
        $count = 10;

        $this->createUsers($count);

        $this->assertEquals($this->users->count(), $count);
    }

    /** @test */
    public function access_list_users_page()
    {
        $user = factory(User::class)->create();

        \Auth::login($user);

        $response = $this->get('/admin/users');

        $response->assertSuccessful();

        $response->assertViewIs('admin.modules.users.index');

        $response->assertViewHas('models', User::query()->get());

        $response->assertSee('Usuários');
    }

    /** @test */
    public function see_user_page()
    {
        $user = factory(User::class)->create();

        \Auth::login($user);

        $response = $this->get('/admin/users/' . $user->id . '/edit');

        $response->assertSuccessful();

        $response->assertViewIs('admin.modules.users.edit');

        $response->assertViewHas('model', $user);

        $response->assertSee('Edição de usuário');
    }
}
