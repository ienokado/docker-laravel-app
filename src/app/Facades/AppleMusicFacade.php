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
            config('services.apple_music.team_id'),
            config('services.apple_music.key_id'),
            config('services.apple_music.auth_key_path'),
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
        $data = null;

        try {
            $api = new AppleMusicAPI($this->client);
            $result = $api->searchCatalog(
                config('services.apple_music.country_code'), $query . '&limit=' . $limit, $type
            );
            if (property_exists($result->results, 'songs')) {
                $data = $result->results->songs->data;
            }
        } catch (\Exception $e) {
            throw $e;
        }

        return $data;
    }
}
