<?php

namespace effsoft\eff;

use yii\base\Module;
use yii\web\NotFoundHttpException;

class EffModule extends Module {

    public $module_name = '';

    public function init(){
        parent::init();

        $this->registerThemes();
    }

    private function registerThemes(){

        if (empty($this->module_name)){
            throw new NotFoundHttpException('$module_name can not be empty!');
        }
        if (empty(\Yii::$app->params['theme'])){
            throw new NotFoundHttpException('theme in config\params can not be empty!');
        }

        if(!empty($this->module_name) && !empty(\Yii::$app->params['theme'])){

            \Yii::$app->view->theme->pathMap = [
                dirname(dirname(__DIR__)) . '/' . $this->module_name . '/src/views' => [
                    '@app/themes/' . \Yii::$app->params['theme'] . '/' . $this->module_name,
                    dirname(__DIR__) . '/views',
                ],
            ];

        }
    }

}