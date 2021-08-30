<?php
namespace App\Lib;

use GuzzleHttp\Client;

class GuzzleFunction
{
    public static function use_guzzle_for_ibm_translator($arg) {
        $api_key = config('translate.ibm_trans_api_key');
        $url = config('translate.ibm_trans_api_url') . '/v3/translate?version=2018-05-01';
        $user = 'apikey';
        $client = new Client();
        $response = $client->post($url, [
            'auth' => [
                $user,
                $api_key,
            ],
            'json' => [
                'text' => $arg,
                'model_id' => 'ja-en',
            ]
        ]);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        return $posts['translations'][0]['translation'];
    }
}