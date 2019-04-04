<?php
namespace effsoft\eff\helpers;

use Hashids\Hashids;

class Ids{
    public static function encodeId($id){
        return \Yii::$container->get(Hashids::class,[
            'salt' => \Yii::$app->components['request']['cookieValidationKey'],
        ])->encodeHex($id);
    }

    public static function decodeId($hex){
        return \Yii::$container->get(Hashids::class,[
            'salt' => \Yii::$app->components['request']['cookieValidationKey'],
        ])->decodeHex($hex);
    }
}