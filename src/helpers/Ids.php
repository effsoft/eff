<?php
namespace effsoft\eff\helpers;

use Hashids\Hashids;

class Ids{

    private static $hashids = null;
    private static function getInstance(){
        if (self::$hashids == null){
            self::$hashids = new Hashids(\Yii::$app->components['request']['cookieValidationKey'],10);
        }
        return self::$hashids;
    }

    public static function encode($id){
        $hashid = self::getInstance();
        return $hashid->encode($id);
    }
    public static function decode($hex){
        $hashid = self::getInstance();
        @$result = $hashid->decode($hex);
        if (isset($result[0])){
            return $result[0];
        }
        return false;
    }

    public static function encodeId($id){
        $hashid = self::getInstance();
        return $hashid->encodeHex($id);
    }

    public static function decodeId($hex){
        $hashid = self::getInstance();
        @$result = $hashid->decodeHex($hex);
        return $result;
    }
}