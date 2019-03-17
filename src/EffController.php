<?php

namespace effsoft;

use Yii;
use yii\web\Controller;

class BaseController extends Controller{

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