<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use PouleR\AppleMusicAPI\APIClient;
use PouleR\AppleMusicAPI\AppleMusicAPI;
use PouleR\AppleMusicAPI\AppleMusicAPITokenGenerator;
use Symfony\Component\HttpClient\CurlHttpClient;

class AppleMusicFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AppleMusicFacade';
    }

    public $curl;

    public $client;

    public function __construct()
    {
        $this->curl = new CurlHttpClient();
        $this->client = new APIClient($this->curl);
        $tokenGenerator = new AppleMusicAPITokenGenerator();

        $jwtToken = $tokenGenerator->generateDeveloperToken(
            env('APPLE_TEAM_ID'),
            env('APPLE_KEY_ID'),
            env('APPLE_AUTH_KEY_PATH'),
        );
        $this->client->setDeveloperToken($jwtToken);
    }

    /**
     * Undocumented function
     *
     * @param string $query 検索する曲名 + アーティスト名
     * @param string $type track|artist|album|playlist
     * @return void
     */
    public function search($query, $type = 'songs', $limit = 1)
    {
        $api = new AppleMusicAPI($this->client);

        $result = $api->searchCatalog(env('APPLE_COUNTRY_CODE'), $query. '&limit='. $limit, $type);

        return $result->results->songs->data;
    }
}
