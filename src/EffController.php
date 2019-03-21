<?php

namespace effsoft\eff;

use Yii;
use yii\web\Controller;

class EffController extends Controller{

    // private $theme = 'effsoft';

    // public function setTheme(string $theme): void
    // {
    //     $this->theme = $theme;
    // }
    // public function getTheme(): string
    // {
    //     return $this->theme;
    // }



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

        $session['theme'] = 'effsoft';
    }

    // public function render($view, $params = [], $theme = ''){
    //     if (!empty($theme)){
    //         $this->theme = $theme;
    //     }
        
    //     $this->getView()->theme = \Yii::createObject([
    //         'class' => '\yii\base\Theme',
    //         'pathMap' => [
    //             dirname(dirname(__DIR__)) . '/' . $this->module->module_name . '/src/views' => [
    //                 '@app/themes/' . $this->theme . '/' . $this->module->module_name
    //             ],
    //         ],
    //     ]);

    //     return parent::render($view, $params);
    // }
}