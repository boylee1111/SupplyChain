<?php

namespace frontend\controllers;

use Yii;
use app\models\ShippingOrder;
use app\models\ShippingOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use frontend\services\IShippingOrderService;

/**
 * ShippingOrderController implements the CRUD actions for ShippingOrder model.
 */
class ShippingOrderController extends Controller
{
    protected $shippingOrderService;

    public function __construct($id, $module, IShippingOrderService $shippingOrderService, $config = [])
    {
        $this->shippingOrderService = $shippingOrderService;
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

    /**
     * Lists all ShippingOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShippingOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionApproveList()
    {
        $searchModel = new ShippingOrderSearch();
        $queryParams = array_merge(array(), Yii::$app->request->queryParams);
        $queryParams['ShippingOrderSearch']['status'] = 0;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('approve-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionApprove($id)
    {
        $this->shippingOrderService->approveShippingOrder($id);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionReject($id)
    {
        $this->shippingOrderService->rejectShippingOrder($id);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionConfirmationList()
    {
        $searchModel = new ShippingOrderSearch();
        $queryParams = array_merge(array(), Yii::$app->request->queryParams);
        $queryParams['ShippingOrderSearch']['status'] = 1;
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
            $model->shipping_date = date("Y-m-d");
            return $this->render('confirm', [
                'model' => $model,
            ]);
        } else {
            $model->load(Yii::$app->request->post());
            $this->shippingOrderService->confirmShippingOrder($id);
            return $this->render('view', [
                'model' => $model,
            ]);
        }
    }

    public function actionReceivingList()
    {
        $searchModel = new ShippingOrderSearch();
        $queryParams = array_merge(array(), Yii::$app->request->queryParams);
        $queryParams['ShippingOrderSearch']['status'] = 2;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('receiving-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReceiving($id)
    {
        $this->shippingOrderService->receivingShippingOrder($id);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDiscrepant($id)
    {
        $this->shippingOrderService->discrepantShippingOrder($id);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single ShippingOrder model.
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
     * Creates a new ShippingOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionApply()
    {
        $model = new ShippingOrder();
    
        if ($model->load(Yii::$app->request->post())) {
            $model->apply_user_id = Yii::$app->user->getId();
            $model->save();
            $this->shippingOrderService->applyNewShippingOrder($model->shipping_order_id);
            return $this->redirect(['view', 'id' => $model->shipping_order_id]);
        } else {
            return $this->render('apply', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ShippingOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->shipping_order_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ShippingOrder model.
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
     * Finds the ShippingOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ShippingOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ShippingOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
