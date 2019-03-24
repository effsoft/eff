<?php

namespace effsoft\eff;

use yii\base\Exception;


class EffView extends \ogheo\htmlcompress\View{

    function init(){
        parent::init();
    }

    function render($view, $params = [], $context = null){
        $module_name = '';
        
        if(isset($context->module)){
            if(isset($context->module->module_name)){
                $module_name = $context->module->module_name;
            }
        }else{
            if(isset($context->module->module_name)){
                $module_name = $this->context->module->module_name;
            }
        }

        if(empty($module_name)){
            return parent::render($view, $params, $context);
        }

//        $this->theme = \Yii::createObject([
//            'class' => '\yii\base\Theme',
//            'basePath' => '@app/views',
//            'pathMap' => [
//                // dirname(dirname(__DIR__)) . '/' .  $module_name . '/src/views' => [
//                //     '@app/themes/' . \Yii::$app->session['theme'] . '/' . $module_name,
//                //     '@app/vendor/effsoft/'. $module_name . '/src/views',
//                //     dirname(dirname(__DIR__)).'/'.$module_name.'/src/views',
//                // ],
//                // dirname(dirname(__DIR__)) . '/' .  $module_name . '/src/widgets/views' => [
//                //     '@app/themes/' . \Yii::$app->session['theme'] . '/' . $module_name.'/widgets',
//                //     '@app/vendor/effsoft/'. $module_name . '/src/views/widgets',
//                //     dirname(dirname(__DIR__)).'/'.$module_name.'/src/views/widgets',
//                // ],
//                '@app/views' => [
//                    '@app/themes/' . \Yii::$app->session['theme'],
//                    '@app/themes/effsoft',
//                ],
//            ],
//        ]);

        // var_dump(\Yii::$app->controller->module->getViewPath());exit;
        // $viewFile = $this->findViewFile($view, $context);
        // return $this->renderFile($viewFile, $params, $context);

        return parent::render($view, $params, $context);
    }
}