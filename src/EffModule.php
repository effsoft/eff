<?php

namespace effsoft\eff;

use yii\base\Module;
use yii\web\NotFoundHttpException;

class EffModule extends Module {

    public $module_name = '';

    public function init(){
        parent::init();

    }

//    public function registerThemes($theme = 'effsoft'){
//
//        if (empty($this->module_name)){
//            throw new NotFoundHttpException('$module_name can not be empty!');
//        }
//
////        \Yii::$app->view->theme->pathMap = [
////
////            dirname(dirname(__DIR__)) . '/' . $this->module_name . '/src/views' => [
////
////                '@app/themes/' . $theme . '/' . $this->module_name,
////
////                dirname(__DIR__) . '/views',
////
////            ],
////        ];
//    }

}