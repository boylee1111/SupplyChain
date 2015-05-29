<?php

namespace frontend\controllers;

use Yii;
use app\models\TransitPoint;
use app\models\TransitPointSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Depot;

/**
 * TransitPointController implements the CRUD actions for TransitPoint model.
 */
class TransitPointController extends Controller
{
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
     * Lists all TransitPoint models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransitPointSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TransitPoint model.
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
     * Creates a new TransitPoint model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TransitPoint();
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
     * Updates an existing TransitPoint model.
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
     * Deletes an existing TransitPoint model.
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
     * Finds the TransitPoint model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TransitPoint the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TransitPoint::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
