<?php

namespace Tests\Feature\Http\Controllers\Admin\Auth;

use App\Models\AdminUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $adminUser;

    public function setUp(): void
    {
        parent::setUp();

        // テスト管理者ユーザ作成
        $this->adminUser = factory(AdminUser::class)->create();
    }

    /**
     * 管理画面ログインフォーム表示のルーティング.
     *
     * @return void
     */
    public function testLoginFormRouting()
    {
        $response = $this->get(route('admin.login.form'));

        $response->assertStatus(200);
    }

    /**
     * ログイン処理のルーティング.
     *
     * @return void
     */
    public function testLoginRouting()
    {
        $response = $this->post(route('admin.login'), [
            '_token' => csrf_token(),
            'email' => $this->adminUser->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.top'));
        // 認証された管理ユーザー判定
        $this->assertAuthenticatedAs($this->adminUser, 'admin');
    }

    /**
     * ログアウト処理のルーティング.
     *
     * @return void
     */
    public function testLogoutRouting()
    {
        // actingAsヘルパで現在認証済みのユーザーを指定する
        $response = $this->actingAs($this->adminUser, 'admin')->get(route('admin.logout'));

        $response->assertRedirect(route('admin.top'));

        $this->assertGuest('admin');
    }
}
