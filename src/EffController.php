<?php

namespace effsoft\eff;

use Yii;
use yii\base\InlineAction;
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

    public $breadcrumb_links = [];
    /**
     * each element with
     * [
     *  'label' => 'Dashboard',
     *  'url' => '["/admin/dashboard", id="10"]', //if empty, this will set to active link
     *  'template' => '<li><b>{link}</b></li>', //optional
     * ]
     */
    public function pushBreadcrumbLink($link){
        $this->breadcrumb_links[] = $link;
    }

    public function init(){
        parent::init();

//        $language = \Yii::$container->get(\Sinergi\BrowserDetector\Language::class);
//        if (strpos(Yii::$app->language = $language->getLanguage(),'zh') !== false){
//            Yii::$app->language = 'zh-CN';
//        }else{
//            Yii::$app->language = 'en-US';
//        }

        if (!empty(\Yii::$app->request->get('lang'))){
            $lang = \Yii::$app->request->get('lang');
            if(array_key_exists($lang,\Yii::$app->params['language'])){
                \Yii::$app->language = $lang;
            }else{
                return $this->redirect('/');
            }
        }else{
            \Yii::$app->language = 'en';
        }

        $session = Yii::$app->session;
        $session->open();


    }

    public function render($view, $params = []){
//        \Yii::$app->view->params['breadcrumb_links'] = $this->breadcrumb_links;
        $params['breadcrumb_links'] = $this->breadcrumb_links;
        return parent::render($view, $params);
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