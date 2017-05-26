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
use yii\filters\AccessControl;
use yii\web\NotAcceptableHttpException;
use yii\web\NotFoundHttpException;
use app\models\OrdersSearch;
use Yii;
use app\models\InvoiceSearch;

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

        if($id != $user->id){
            if($user->can('manager') || $user->can('root')) {
            }else{
                throw new NotAcceptableHttpException(); // NotFoundHttpException();
            }
        }

        $orderSearch = new OrdersSearch();
        $params = Yii::$app->request->queryParams;
        $params['OrdersSearch']['company_name'] = $company->name;
        if($profile->user->is_boss == 0) {
//            $dataProvider = $orderSearch->getOrdersByUserId($user->id);
            $params['OrdersSearch']['user_id'] = $profile->user->username;
        }else{
            $parmas['OrdersSearch']['user_id'] = null;
        }
        $dataProvider = $orderSearch->search($params);

        $dataProvider->pagination->pageSize = 10;
        $invoiceSearchModel = new InvoiceSearch();
        $invoiceSearchModel->company_id = 1;
        $invoiceDataProvider = $invoiceSearchModel->search(Yii::$app->request->queryParams);
        return $this->render('show', [
            'profile' => $profile,
            'dataProvider' => $dataProvider,
            'searchModel' => $orderSearch,
            'companyInfo' => '',
            'invoiceSearchModel' => $invoiceSearchModel,
            'invoiceDataProvider' => $invoiceDataProvider
        ]);
    }

    public function actionCompany($id=null){
        return $this->render('show', ['companyInfo' => '123']);
    }
}
