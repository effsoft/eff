<?php
namespace effsoft\eff\libraries;

use GuzzleHttp\Client;

class GoogleApi extends \skeeks\yii2\googleApi\GoogleApi{

    //yii/httpclient/request.php/addoptons
//if(YII_DEBUG){
//$this->_options['proxy'] = '127.0.0.1:3128';
//$this->_options['sslVerifyPeer'] = false;
//}

    public function getGoogleClient()
    {
        if (YII_DEBUG){
            $httpClient = new Client([
                'proxy' => '127.0.0.1:3128', // by default, Charles runs on localhost port 8888
                'verify' => false, // otherwise HTTPS requests will fail.
            ]);

            $client = new \Google_Client();
            $client->setHttpClient($httpClient);
        }else{
            $client = new \Google_Client();
        }

        $client->setDeveloperKey($this->key);

        return $client;
    }
}