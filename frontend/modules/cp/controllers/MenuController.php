<?php

namespace frontend\modules\cp\controllers;

use common\models\Category;
use common\models\Menu;
use common\models\search\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;
/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
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
     * Lists all Menu models.
     *
     * @return string
     */
    public function actionIndex($id = null)
    {
        if(!$id){
            $id = Category::find()->min('id');
        }
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search($this->request->queryParams,$id);
        $model = new Menu();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
            'id'=>$id
        ]);
    }

    /**
     * Displays a single Menu model.
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
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Menu();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if($model->image = UploadedFile::getInstance($model,'image')){
                    $name = microtime(true).'.'.$model->image->extension;
                    $model->image->saveAs(Yii::$app->basePath.'/web/upload/'.$name);
                    $model->image = $name;
                }
                if($model->save()){
                    return $this->redirect(['index','id'=>$model->category_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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
        return $this->redirect(['index','id'=>$model->category_id]);
    }
    /**
     * Updates an existing Menu model.
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
                return $this->redirect(['index','id'=>$model->category_id]);
            }
        }

        return $this->renderAjax('_form', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Menu model.
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
        return $this->redirect(['index','id'=>$model->category_id]);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
