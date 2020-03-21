<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SpotifyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SpotifyFacade';
    }

    public $client;

    public function __construct()
    {
        $this->client = app()->make('SpotifyWrapper');
        $this->client->session->requestCredentialsToken();
        $accessToken = $this->client->session->getAccessToken();
        $this->client->api->setAccessToken($accessToken);
    }

    /**
     * Undocumented function
     *
     * @param string $query 検索する曲名 + アーティスト名
     * @param string $type track|artist|album|playlist
     * @return void
     */
    public function search($query, $type = 'track', $options = [])
    {
        // どうにかして該当の1件に絞りたい
        $options['limit'] = 1;

        $result = $this->client->api->search($query, $type, $options);

        return $result->tracks->items;
    }
}
