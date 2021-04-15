<?php

namespace Tests\Feature\Http\Controllers\Admin\System;

use App\Models\AdminUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogControllerTest extends TestCase
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
     * リクエストログ一覧表示のルーティング.
     *
     * @return void
     */
    public function testRouting()
    {
        $response = $this
            ->actingAs($this->adminUser, 'admin')
            ->withSession(['user_id' => $this->adminUser])
            ->get(route('admin.system.log'));

        $response->assertStatus(200);
    }
}
