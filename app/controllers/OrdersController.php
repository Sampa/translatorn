<?php

namespace app\controllers;

use Yii;
use app\models\Orders;
use app\models\OrdersSearch;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\easyii\models\Setting;
use yii\web\NotFoundHttpException;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    public $layout = '@vendor/noumo/easyii/views/layouts/main';
    public function init(){
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index','create','update','view'],
                'rules' => [
                    [
                        'actions' => ['index', 'create','view', 'update', 'delete', 'admin','search'],
                        'allow' => true,
                        'roles' => ['manager'],
                    ],
                    [
                        'actions' => ['create', 'view'],
                        'allow' => true,
                        'roles' => ['customer'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id,$konto=null)
    {
        $view = 'view';
        if(Yii::$app->user->can('customer') && !Yii::$app->user->can('manager')) {
            $this->layout = 'main';
            if(!is_null($konto)){
                $view = 'customerView';
            }else {
                $view = 'customerBokaView';
            }
        }
        return $this->render($view, [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'main';
        $model = new Orders();
        $ordersView = null;
        $count = Setting::get('BookingRefCounter');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->bill_ref = $count+$model->id .' '. $model->date. ' ' . $model->language;
            if( $model->save() ) {
                $ordersView = $this->renderPartial('customerBokaView', [
                    'model' => $model,
                ]);
            } else{
                return var_dump($model->getErrors()) . Yii::t('orders', 'Could not save order');
            }
        }
        $dataProvider = $model->getLatest(Yii::$app->user->id,5); //limit not working and this is monthly
        return $this->render('create', [
            'model' => $model,
            'latest' => $dataProvider,
            'ordersView' =>$ordersView
        ]);

    }


    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(isset($this->files[0])){
                $this->bill_sent = true;
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
