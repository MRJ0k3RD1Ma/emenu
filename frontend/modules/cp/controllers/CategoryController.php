<?php

namespace frontend\modules\cp\controllers;

use common\models\Category;
use common\models\Navigate;
use common\models\search\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;
/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Category models.
     *
     * @return string
     */
    public function actionIndex($id=null)
    {
        if(!$id){
            $id = Navigate::find()->min('id');
        }
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams,$id);

        $model = new Category();
        $model->id = "";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
            'id'=>$id
        ]);
    }

    /**
     * Displays a single Category model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if($model->image = UploadedFile::getInstance($model,'image')){
                    $name = microtime(true).'.'.$model->image->extension;
                    $model->image->saveAs(Yii::$app->basePath.'/web/upload/'.$name);
                    $model->image = $name;
                }
                if($model->save()){
                    return $this->redirect(['index','id'=>$model->navigate_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->redirect(['index']);

    }
    public function actionStatus($id)
    {
        $model = $this->findModel($id);
        if($model->status == 1){
            $model->status = 2;
        }else{
            $model->status = 1;
        }
        $model->save(false);
        return $this->redirect(['index','id'=>$model->navigate_id]);
    }
    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img = $model->image;
        if ($this->request->isPost && $model->load($this->request->post())) {
            if($model->image = UploadedFile::getInstance($model,'image')){
                $name = microtime(true).'.'.$model->image->extension;
                $model->image->saveAs(Yii::$app->basePath.'/web/upload/'.$name);
                $model->image = $name;
            }else{
                $model->image = $img;
            }
            if($model->save()){
                return $this->redirect(['index','id'=>$model->navigate_id]);
            }
        }

        return $this->renderAjax('_form', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 0;
        $model->save(false);
        return $this->redirect(['index','id'=>$model->navigate_id]);
    }


    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
