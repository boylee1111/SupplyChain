<?php

namespace frontend\controllers;

use Yii;
use app\models\ReturningOrder;
use app\models\ReturningOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use frontend\services\IPurchasingOrderService;
use frontend\services\IReturningOrderService;
use app\models\PurchasingOrder;
use app\models\PurchasingOrderSearch;

/**
 * ReturningOrderController implements the CRUD actions for ReturningOrder model.
 */
class ReturningOrderController extends Controller
{
    protected $purchasingOrderService;
    protected $returningOrderService;

    public function __construct($id,
                                $module,
                                IPurchasingOrderService $purchasingOrderService,
                                IReturningOrderService $returningOrderService,
                                $config = [])
    {
        $this->purchasingOrderService = $purchasingOrderService;
        $this->returningOrderService = $returningOrderService;
        parent::__construct($id, $module, $config);
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionApplyList()
    {
        $searchModel = new PurchasingOrderSearch();
        $queryParams = array_merge(array(), Yii::$app->request->queryParams);
        $queryParams['PurchasingOrderSearch']['status'] = 9;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('apply-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionApply($id)
    {
        $purchasingModel = $this->purchasingOrderService->findModel($id);
        $model = new ReturningOrder();

        if (count(Yii::$app->request->post()) == 0) {
            $model->purchasing_order_id = $id;
            return $this->render('apply', [
                'model' => $model,
                'purchasingModel' => $purchasingModel,
            ]);
        } else {
            $model->load(Yii::$app->request->post());
            $model->returning_order_code = str_replace('PO', 'RO', $purchasingModel->purchasing_order_code);
            $model->purchasing_order_id = $id;
            $model->apply_user_id = Yii::$app->user->getId();
            $model->apply_date = date("Y-m-d");
            $model->quantity = $model->purchasingOrder->quantity;
            $model->save();
            $this->returningOrderService->applyNewReturningOrder($model->returning_order_id);
            return $this->redirect(['view', 'id' => $model->returning_order_id]);
        }
    }

    public function actionApproveList()
    {
        $searchModel = new ReturningOrderSearch();
        $queryParams = array_merge(array(), Yii::$app->request->queryParams);
        $queryParams['ReturningOrderSearch']['status'] = 0;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('approve-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionApprove($id)
    {
        $this->returningOrderService->approveReturningOrder($id);

        return $this->redirect(['view', 'id' => $this->findModel($id)->returning_order_id]);
    }

    public function actionReject($id)
    {
        $this->returningOrderService->rejectReturningOrder($id);

        return $this->redirect(['view', 'id' => $this->findModel($id)->returning_order_id]);
    }

    public function actionConfirmationList()
    {
        $searchModel = new ReturningOrderSearch();
        $queryParams = array_merge(array(), Yii::$app->request->queryParams);
        $queryParams['ReturningOrderSearch']['status'] = 1;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('confirm-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionConfirm($id)
    {
        $model = $this->findModel($id);

        if (count(Yii::$app->request->post()) == 0) {
            $model->returning_date = date("Y-m-d");
            return $this->render('confirm', [
                'model' => $model,
            ]);
        } else {
            $model->load(Yii::$app->request->post());
            $model->save();
            $this->returningOrderService->confirmReturningOrder($id);
            return $this->redirect(['view', 'id' => $model->returning_order_id]);
        }
    }

    /**
     * Lists all ReturningOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReturningOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ReturningOrder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ReturningOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ReturningOrder();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->returning_order_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ReturningOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->returning_order_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ReturningOrder model.
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
     * Finds the ReturningOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ReturningOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReturningOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
