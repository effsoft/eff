<?php

namespace effsoft\eff;

use yii\base\Module;
use yii\web\NotFoundHttpException;

class EffModule extends Module {

    public $module_name = '';
    public $dir = '';

    public function init(){
        parent::init();


    }

    public function registAlias(){
        \Yii::setAlias('@'.$this->module_name, $this->dir);
    }

    public function registTranslations()
    {
        \Yii::$app->i18n->translations[$this->module_name .'/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' =>  $this->dir . '\\messages',
            'fileMap' => [
                $this->module_name .'/app' => 'app.php',
                $this->module_name .'/error' => 'error.php',
            ],
        ];
    }

    public function registSubModules($modules){
        $this->modules = $modules;
    }

    public function registerThemes(){

        if (empty($this->module_name)){
            throw new NotFoundHttpException('$module_name can not be empty!');
        }

//        \Yii::$app->view->theme->basePath = '@app/views';
//        \Yii::$app->view->theme->pathMap = [
//
//            '@app/views' => [
//                '@app/views/' . \Yii::$app->session['theme'],
//            ],
//            $this->dir . '/views' => [
//
////                '@app/themes/' . \Yii::$app->session['theme'] . '/' . $this->module_name,
//
//            ],
//        ];

        \Yii::$app->view->theme = \Yii::createObject([
            'class' => '\yii\base\Theme',
            'basePath' => '@app/themes',
            'pathMap' => [

                $this->dir . '/views' => [
//                    '@app/themes/' . \Yii::$app->session['theme'] . '/' . $this->module_name,//找模块目录下的文件
                    '@app/themes/' . \Yii::$app->session['theme'],
                ],

                '@app/views' => [
                    $this->dir . '/views',
                    '@app/themes/' . \Yii::$app->session['theme'],
                ],
            ],
        ]);
    }

}