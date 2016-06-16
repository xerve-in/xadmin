<?php

namespace app\controllers;

use Yii;
use app\models\CategoryPathMaps;
use app\models\CategoryPathMapsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CategoryPathMapsController implements the CRUD actions for CategoryPathMaps model.
 */
class CategorypathmapsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CategoryPathMaps models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoryPathMapsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CategoryPathMaps model.
     * @param string $seller
     * @param string $s_cat_path
     * @return mixed
     */
    public function actionView($seller, $s_cat_path)
    {
        return $this->render('view', [
            'model' => $this->findModel($seller, $s_cat_path),
        ]);
    }

    /**
     * Creates a new CategoryPathMaps model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CategoryPathMaps();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'seller' => $model->seller, 's_cat_path' => $model->s_cat_path]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CategoryPathMaps model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $seller
     * @param string $s_cat_path
     * @return mixed
     */
    public function actionUpdate($seller, $s_cat_path)
    {
        $model = $this->findModel($seller, $s_cat_path);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'seller' => $model->seller, 's_cat_path' => $model->s_cat_path]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CategoryPathMaps model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $seller
     * @param string $s_cat_path
     * @return mixed
     */
    public function actionDelete($seller, $s_cat_path)
    {
        $this->findModel($seller, $s_cat_path)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CategoryPathMaps model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $seller
     * @param string $s_cat_path
     * @return CategoryPathMaps the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($seller, $s_cat_path)
    {
        if (($model = CategoryPathMaps::findOne(['seller' => $seller, 's_cat_path' => $s_cat_path])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
