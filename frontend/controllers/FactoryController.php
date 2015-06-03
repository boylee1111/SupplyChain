<?php

namespace frontend\controllers;

use Yii;
use app\models\Factory;
use app\models\FactorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Depot;
use frontend\services\IFactoryService;

/**
 * FactoryController implements the CRUD actions for Factory model.
 */
class FactoryController extends Controller
{
    protected $factoryService;

    public function __construct($id, $module, IFactoryService $factoryService, $config = [])
    {
        $this->factoryService = $factoryService;
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
     * Lists all Factory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FactorySearch();
        $queryParams = array_merge(array(), Yii::$app->request->queryParams);
        $queryParams['FactorySearch']['active'] = 1;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Factory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Depot::isExist($id)) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Factory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Factory();
        $depot = new Depot();

        if ($depot->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post()) && $depot->save()) {
            $model->depot_id = $depot->depot_id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->depot_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'depot' => $depot,
            ]);
        }
    }

    /**
     * Updates an existing Factory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $depot = Depot::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save() &&
            $depot->load(Yii::$app->request->post()) && $depot->save()) {
            return $this->redirect(['view', 'id' => $model->depot_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'depot' => $depot,
            ]);
        }
    }

    /**
     * Deletes an existing Factory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->factoryService->deleteFactory($id);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Factory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Factory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Factory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
