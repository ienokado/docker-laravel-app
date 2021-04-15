<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\AdminUser;
use App\Models\ComedianGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComedianGroupControllerTest extends TestCase
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
     * 芸人一覧表示のルーティング.
     *
     * @return void
     */
    public function testComedianGroupRouting()
    {
        $response = $this
            ->actingAs($this->adminUser, 'admin')
            ->withSession(['user_id' => $this->adminUser])
            ->get(route('admin.comedian_group'));

        $response->assertStatus(200);
    }

    /**
     * 芸人新規登録画面表示のルーティング.
     *
     * @return void
     */
    public function testComedianGroupNewRouting()
    {
        $response = $this
            ->actingAs($this->adminUser, 'admin')
            ->withSession(['user_id' => $this->adminUser])
            ->get(route('admin.comedian_group.new'));

        $response->assertStatus(200);
    }

    /**
     * 芸人編集画面表示のルーティング.
     *
     * @return void
     */
    public function testComedianGroupEditRouting()
    {
        // テスト芸人データの作成
        $comedianGroup = factory(ComedianGroup::class)->create();

        $response = $this
            ->actingAs($this->adminUser, 'admin')
            ->withSession(['user_id' => $this->adminUser])
            ->get(route('admin.comedian_group.edit', ['id' => $comedianGroup->id]));

        $response->assertStatus(200);
    }

    /**
     * 芸人登録処理のルーティング.
     *
     * @return void
     */
    public function testComedianGroupStoreRouting()
    {
        // テスト芸人データの作成
        $comedianGroup = factory(ComedianGroup::class)->create();

        $response = $this
            ->actingAs($this->adminUser, 'admin')
            ->withSession(['user_id' => $this->adminUser])
            ->post(route('admin.comedian_group.store'), [
                '_token' => csrf_token(),
                'id' => $comedianGroup->id,
                'name' => 'テスト',
            ]);

        $response->assertRedirect(route('admin.comedian_group.edit', ['id' => $comedianGroup->id]));
    }
}
