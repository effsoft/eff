<?php

namespace effsoft\eff\controllers;

use effsoft\eff\EffController;
use yii\helpers\Url;

class EffAuthorizedController extends EffController
{

    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['/passport/login']))->send();
        }
        return parent::beforeAction($action);
    }

    public function init()
    {
        return parent::init();
    }
}