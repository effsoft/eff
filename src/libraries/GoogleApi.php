<?php
namespace effsoft\eff\libraries;

use GuzzleHttp\Client;

class GoogleApi extends \skeeks\yii2\googleApi\GoogleApi{
    public function getGoogleClient()
    {
        if (YII_DEBUG){
            $httpClient = new Client(['defaults'=>[
                'proxy' => 'localhost:3128', // by default, Charles runs on localhost port 8888
                'verify' => false, // otherwise HTTPS requests will fail.
            ]]);
            $client = new \Google_Client();
            $client->setHttpClient($httpClient);
        }else{
            $client = new \Google_Client();
        }

        $client->setDeveloperKey($this->key);

        return $client;
    }
}