<?php
namespace app\modules\akut\controllers;

use Yii;
use app\modules\akut\models\Akut as AkutModel;

class SendController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new AkutModel();

        $request = Yii::$app->request;

        if ($model->load($request->post())) {
            $returnUrl = $model->save() ? $request->post('successUrl') : $request->post('errorUrl');
            return $this->redirect($returnUrl);
        } else {
            return $this->redirect(Yii::$app->request->baseUrl);
        }
    }
}