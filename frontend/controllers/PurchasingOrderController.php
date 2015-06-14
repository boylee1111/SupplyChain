<?php

namespace frontend\controllers;

use Yii;
use app\models\PurchasingOrder;
use app\models\PurchasingOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use frontend\services\IPurchasingOrderService;

/**
 * PurchasingOrderController implements the CRUD actions for PurchasingOrder model.
 */
class PurchasingOrderController extends Controller
{
    protected $purchasingOrderService;

    public function __construct($id, $module, IPurchasingOrderService $purchasingOrderService, $config = [])
    {
        $this->purchasingOrderService = $purchasingOrderService;
        parent::__construct($id, $module, $config);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['apply', 'index', 'confirmation-list', 'confirm', 'warehousing-list', 'warehousing', 'discrepant', 'view', 'update'],
                        'roles' => ['shippingOrderManagement'],
                    ],
                    [
                        'allow' => false,
                        'actions' => ['delete'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['approve-list', 'approve'],
                        'roles' => ['reviewOrder'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Creates a new PurchasingOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionApply()
    {
        $model = new PurchasingOrder();

        if ($model->load(Yii::$app->request->post())) {
            $model->apply_user_id = Yii::$app->user->getId();
            $model->apply_date = date("Y-m-d H:i:s");
            $model->save();
            $this->purchasingOrderService->applyNewPurchasingOrder($model->purchasing_order_id);
            return $this->redirect(['view', 'id' => $model->purchasing_order_id]);
        } else {
            return $this->render('apply', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Lists all PurchasingOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PurchasingOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionApproveList()
    {
        $searchModel = new PurchasingOrderSearch();
        $queryParams = array_merge(array(), Yii::$app->request->queryParams);
        $queryParams['PurchasingOrderSearch']['status'] = 0;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('approve-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionApprove($id)
    {
        $this->purchasingOrderService->approvePurchasingOrder($id);

        return $this->redirect(['view', 'id' => $this->findModel($id)->purchasing_order_id]);
    }

    public function actionReject($id)
    {
        $this->purchasingOrderService->rejectPurchasingOrder($id);

        return $this->redirect(['view', 'id' => $this->findModel($id)->purchasing_order_id]);
    }

    public function actionConfirmationList()
    {
        $searchModel = new PurchasingOrderSearch();
        $queryParams = array_merge(array(), Yii::$app->request->queryParams);
        $queryParams['PurchasingOrderSearch']['status'] = 1;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('confirm-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionConfirm($id)
    {
        $this->purchasingOrderService->confirmPurchasingOrder($id);

        return $this->redirect(['view', 'id' => $this->findModel($id)->purchasing_order_id]);        
    }

    public function actionWarehousingList()
    {
        $searchModel = new PurchasingOrderSearch();
        $queryParams = array_merge(array(), Yii::$app->request->queryParams);
        $queryParams['PurchasingOrderSearch']['status'] = 2;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('warehousing-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionWarehousing($id)
    {
        $model = $this->findModel($id);

        if (count(Yii::$app->request->post()) == 0) {
            $model->arrival_date = date("Y-m-d");
            return $this->render('warehousing', [
                'model' => $model,
            ]);
        } else {
            $model->load(Yii::$app->request->post());
            $model->save();
            $this->purchasingOrderService->warehousingPurchasingOrder($id);
            return $this->redirect(['view', 'id' => $model->purchasing_order_id]);
        }
    }

    public function actionDiscrepant($id)
    {
        $this->purchasingOrderService->discrepantPurchasingOrder($id);

        return $this->redirect(['view', 'id' => $this->findModel($id)->purchasing_order_id]);
    }

    /**
     * Displays a single PurchasingOrder model.
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
     * Updates an existing PurchasingOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->purchasing_order_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PurchasingOrder model.
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
     * Finds the PurchasingOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PurchasingOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PurchasingOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
