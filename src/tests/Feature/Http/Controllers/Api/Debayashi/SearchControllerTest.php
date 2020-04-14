<?php

namespace Tests\Feature\Http\Controllers\Api\Debayashi;

use App\Models\AdminUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $adminUser;

    protected $accessToken;

    public function setUp(): void
    {
        parent::setUp();

        // テスト管理者ユーザ作成
        $this->adminUser = factory(AdminUser::class)->create();

        // 作成したテストユーザのemailとpasswordで認証リクエスト
        $response = $this->json('post', 'api/auth/login', [
            'email' => $this->adminUser->email,
            'password' => 'password',
        ]);

        $content = $response->getContent();
        $tokenInfo = json_decode($content, true);
        $this->accessToken = $tokenInfo['access_token'];
    }

    /**
     * routing test.
     *
     * @return void
     */
    public function testRouting()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $this->accessToken,
            'Content-Type' => 'application/json',
        ])->json('get', route('api.debayashi.search', ['q' => 'test']));

        $response->assertStatus(200);
    }
}
