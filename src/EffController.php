<?php

namespace effsoft\eff;

use Yii;
use yii\web\Controller;

class EffController extends Controller{

    public function init(){
        parent::init();

        $language = \Yii::$container->get(\Sinergi\BrowserDetector\Language::class);
        if (strpos(Yii::$app->language = $language->getLanguage(),'zh') !== false){
            Yii::$app->language = 'zh-CN';
        }else{
            Yii::$app->language = 'en';
        }

        $session = Yii::$app->session;
        $session->open();
    }
}