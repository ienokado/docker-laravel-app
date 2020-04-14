<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\AdminUser;
use App\Models\Debayashi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DebayashiControllerTest extends TestCase
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
     * 出囃子一覧表示のルーティング.
     *
     * @return void
     */
    public function testDebayashiRouting()
    {
        $response = $this
            ->actingAs($this->adminUser, 'admin')
            ->withSession(['user_id' => $this->adminUser])
            ->get(route('admin.debayashi'));

        $response->assertStatus(200);
    }

    /**
     * 出囃子新規登録画面表示のルーティング.
     *
     * @return void
     */
    public function testDebayashiNewRouting()
    {
        $response = $this
            ->actingAs($this->adminUser, 'admin')
            ->withSession(['user_id' => $this->adminUser])
            ->get(route('admin.debayashi.new'));

        $response->assertStatus(200);
    }

    /**
     * 出囃子編集画面表示のルーティング.
     *
     * @return void
     */
    public function testDebayashiEditRouting()
    {
        // テスト出囃子データの作成
        $debayashi = factory(Debayashi::class)->create();

        $response = $this
            ->actingAs($this->adminUser, 'admin')
            ->withSession(['user_id' => $this->adminUser])
            ->get(route('admin.debayashi.edit', ['id' => $debayashi->id]));

        $response->assertStatus(200);
    }

    /**
     * 出囃子登録処理のルーティング.
     *
     * @return void
     */
    public function testDebayashiStoreRouting()
    {
        // テスト出囃子データの作成
        $debayashi = factory(Debayashi::class)->create();

        $response = $this
            ->actingAs($this->adminUser, 'admin')
            ->withSession(['user_id' => $this->adminUser])
            ->post(route('admin.debayashi.store'), [
                '_token' => csrf_token(),
                'id' => $debayashi->id,
                'name' => 'テスト出囃子',
                'artist_name' => 'テストアーティスト',
            ]);

        $response->assertRedirect(route('admin.debayashi.edit', ['id' => $debayashi->id]));
    }
}
