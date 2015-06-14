<?php

namespace frontend\controllers;

use Yii;
use app\models\Depot;
use app\models\DepotSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DepotController implements the CRUD actions for Depot model.
 */
class DepotController extends Controller
{
    public function behaviors()
    {
        return [
            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'rules' => [
            //         [
            //             'allow' => false,
            //             'actions' => ['index', 'view', 'create', 'update', 'delete'],
            //         ],
            //     ],
            // ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    // /**
    //  * Lists all Depot models.
    //  * @return mixed
    //  */
    // public function actionIndex()
    // {
    //     $searchModel = new DepotSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    // /**
    //  * Displays a single Depot model.
    //  * @param integer $id
    //  * @return mixed
    //  */
    // public function actionView($id)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }

    // /**
    //  * Creates a new Depot model.
    //  * If creation is successful, the browser will be redirected to the 'view' page.
    //  * @return mixed
    //  */
    // public function actionCreate()
    // {
    //     $model = new Depot();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->depot_id]);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    // /**
    //  * Updates an existing Depot model.
    //  * If update is successful, the browser will be redirected to the 'view' page.
    //  * @param integer $id
    //  * @return mixed
    //  */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->depot_id]);
    //     } else {
    //         return $this->render('update', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    // /**
    //  * Deletes an existing Depot model.
    //  * If deletion is successful, the browser will be redirected to the 'index' page.
    //  * @param integer $id
    //  * @return mixed
    //  */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    /**
     * Finds the Depot model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Depot the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Depot::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
