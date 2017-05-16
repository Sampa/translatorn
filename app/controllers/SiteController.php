<?php

namespace app\controllers;

use Yii;
use yii\easyii\modules\page\models\Page;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        if(!Yii::$app->getModule('admin')->installed){
            return $this->redirect(['/install/step1']);
        }

        if(Yii::$app->user->can('customer'))
            return $this->redirect(['/orders/create']);
        return $this->render('index');
    }

    public function actionAkut()
    {
        if(!Yii::$app->getModule('admin')->installed){
            return $this->redirect(['/install/step1']);
        }
        return $this->render('akut');
    }

    public function actionJob(){
        return $this->render('job');
    }
}