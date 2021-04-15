<?php

namespace Tests\Feature\Request;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DebayashiSearchRequestTest extends TestCase
{
    /**
     * 出囃子検索テスト
     *
     * @return void
     */
    // public function testDebayashiSearch()
    // {
    //     $response = $this->post('/debayashi/search', [
    //         'keyword' => '霜降り明星'
    //     ]);

    //     // echo config('app.env');

    //     $this->assertEquals('testing', env('DB_DATABASE'));
    // }

    /**
     * Not Found Test
     *
     * @return void
     */
    // public function testDebayashiSearchNotFound()
    // {
    //     $response = $this->post('/debayashi/search', [
    //         'keyword' => 'Not Found'
    //     ]);

    //     $response->assertSee('<p>その芸人さん、<br>知らんわ…</p>');
    // }
}
