<?php

namespace effsoft\eff;

use Yii;
use yii\web\Controller;

class EffController extends Controller{



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

//        $permission = $this->module->id.'/'.$this->id;
//        var_dump($permission);
//        var_dump(\Yii::$app->user->can($permission));

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

    }

    public function render($view, $params = []){

        $params['breadcrumb_links'] = $this->breadcrumb_links;
        return parent::render($view, $params);
    }

    public function render_error( $status = 0, $message = '', $code = 404){
        $params['code'] = $code;
        $params['status'] = $status;
        $params['message'] = $message;
        return parent::render('//error/404', $params);
    }
}