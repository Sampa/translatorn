<?php
/**
 * Created by PhpStorm.
 * User: Happyjuiced
 * Date: 2017-05-11
 * Time: 01:09
 */


namespace app\controllers\user;

use dektrium\user\controllers\AdminController as BaseAdminController;
use yii\helpers\Url;
use dektrium\user\models\UserSearch;

class AdminController extends BaseAdminController
{
    public $layout = '@vendor/noumo/easyii/views/layouts/main';

//    public $layout
    /**
     * Lists all User models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember('', 'actions-redirect');
        $searchModel  = \Yii::createObject(UserSearch::className());
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }
}