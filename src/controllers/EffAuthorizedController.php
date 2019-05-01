<?php

namespace effsoft\eff\controllers;

use effsoft\eff\EffController;
use yii\helpers\Url;

class EffAuthorizedController extends EffController
{

    public function beforeAction($action)
    {
        if (!\Yii::$app->user->isGuest) {
            $user = \Yii::$app->user->identity;
            if ($user->email === \Yii::$app->params['admin_email']) {
                return true;
            }
            if($user->blocked){
                return $this->redirect(Url::to(['/site/error/403']));
            }
        }
        $permission = $this->module->id . '/' . $this->id;
        if (!\Yii::$app->user->can($permission)) {
            return $this->redirect(Url::to(Url::to(['/site/error/403'])));
        }
        return parent::beforeAction($action);
    }

    public function init()
    {
        return parent::init();
    }
}