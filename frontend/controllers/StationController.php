<?php

namespace frontend\controllers;

use Yii;
use app\models\Station;
use app\models\StationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Depot;
use frontend\services\IStationService;

/**
 * StationController implements the CRUD actions for Station model.
 */
class StationController extends Controller
{
    protected $stationService;

    public function __construct($id, $module, IStationService $stationService, $config = [])
    {
        $this->stationService = $stationService;
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
     * Lists all Station models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Station model.
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
     * Creates a new Station model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Station();
        $depot = new Depot();

        if ($model->load(Yii::$app->request->post()) && $depot->load(Yii::$app->request->post()) && $depot->save()) {
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
     * Updates an existing Station model.
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
     * Deletes an existing Station model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $depot = Depot::findOne($id);
        foreach ($depot->getRoadSections()->all() as $roadSection) {
            $roadSection->delete();
        }
        foreach ($depot->getRoadSections0()->all() as $roadSection) {
            $roadSection->delete();
        }
        $depot->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Station model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Station the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Station::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
