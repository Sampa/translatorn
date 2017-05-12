<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\controllers\user;
use dektrium\user\controllers\ProfileController as BaseProfileController;
use dektrium\user\Finder;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotAcceptableHttpException;
use yii\web\NotFoundHttpException;
use app\models\OrdersSearch;
use Yii;

/**
 * ProfileController shows users profiles.
 *
 * @property \dektrium\user\Module $module
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class ProfileController extends BaseProfileController
{
       /** @inheritdoc */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'actions' => ['index'], 'roles' => ['@']],
                    ['allow' => true, 'actions' => ['show'], 'roles' => ['?', '@']],
                    ['allow' => true, 'actions' => ['company'], 'roles' => ['@']],

                ],
            ],
        ];
    }

    /**
     * Redirects to current user's profile.
     *
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        return $this->redirect(['show', 'id' => \Yii::$app->user->getId()]);
    }

    /**
     * Shows user's profile.
     *
     * @param int $id
     *
     * @return \yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionShow($id)
    {
        $profile = $this->finder->findProfileById($id);
        $user = Yii::$app->user;
        $company = $profile->user->company;
        if ($profile === null) {
            throw new NotFoundHttpException();
        }
        if($id != $user->id && !$user->can('manager')){
            throw new NotAcceptableHttpException(); // NotFoundHttpException();
        }
        $orderSearch = new OrdersSearch();

        if($profile->user->is_boss == null)
            $orderSearch->user_id = $id;
        $dataProvider = $orderSearch->search(Yii::$app->request->queryParams);

        return $this->render('show', [
            'profile' => $profile,
            'dataProvider' => $dataProvider,
            'searchModel' => $orderSearch,
            'companyInfo' => '',
        ]);
    }

    public function actionCompany($id=null){
        return $this->render('show', ['companyInfo' => '123']);
    }
}
