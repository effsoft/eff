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
        }
        $permission = $this->module->id . '/' . $this->id;
        if (!\Yii::$app->user->can($permission)) {
            return $this->redirect(Url::to(['/passport/login']));
        }
        return parent::beforeAction($action);
    }

    public function init()
    {
        return parent::init();
    }
}