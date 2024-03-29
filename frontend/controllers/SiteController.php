<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Menu;
use common\models\Navigate;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($id = null)
    {
        if(!$id){
            $id = Navigate::find()->min('id');
        }
        $category = Category::find()->where(['navigate_id'=>$id])->andWhere(['status'=>1])->all();
        return $this->render('index',[
            'id'=>$id,
            'category'=>$category
        ]);
    }


    public function actionCategory($id){
        $category = Category::findOne($id);
        $menu = Menu::find()->where(['category_id'=>$id])->andWhere(['status'=>1])->all();

        return $this->render('menu',[
            'menu'=>$menu,
            'id'=>$category->navigate_id
        ]);
    }

    public function actionSearch($q){

        $id = Navigate::find()->min('id');

        $menu = Menu::find()->where(['like','name',$q])->andWhere(['status'=>1])->all();

        return $this->render('menu',[
            'menu'=>$menu,
            'id'=>$id
        ]);
    }

    public function actionOrder($id){
        $order = [];
        if(Yii::$app->session->has('order')){
            $order = Yii::$app->session->get('order');
        }

        if(isset($order[$id])){
            $order[$id]++;
        }else{
            $order[$id] = 1;
        }

        Yii::$app->session->set('order',$order);
        return json_encode(['id'=>$id,'value'=>$order[$id]]);
    }

    public function actionOrderlist(){
        $order = [];
        if(Yii::$app->session->has('order')){
            $order = Yii::$app->session->get('order');
        }
        return $this->render('orderlist',[
            'order'=>$order
        ]);
    }

    public function actionOrderone($id){
        $order = [];
        if(Yii::$app->session->has('order')){
            $order = Yii::$app->session->get('order');
        }

        if(isset($order[$id])){
            return json_encode(['id'=>$id,'value'=>$order[$id]]);
        }else{
            return json_encode(['id'=>$id,'value'=>0]);
        }
    }

    public function actionOrdertotal(){
        $order = [];
        if(Yii::$app->session->has('order')){
            $order = Yii::$app->session->get('order');
        }
        $total = 0;
        foreach ($order as $key=>$item){
            if($pro = Menu::findOne($key)){
                $total += $item * $pro->narxi;
            }
        }
        return $total;
    }


    public function actionOrderremove($id){
        $order = [];
        if(Yii::$app->session->has('order')){
            $order = Yii::$app->session->get('order');
        }
        $u = false;
        if(isset($order[$id])){
            $order[$id]--;
        }else{
            $order[$id] = 0;
        }
        if($order[$id] <= 0){
            unset($order[$id]);
            $u = true;
        }

        Yii::$app->session->set('order',$order);

        return $u ? json_encode(['id'=>$id,'value'=>0]) : json_encode(['id'=>$id,'value'=>$order[$id]]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = 'login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) and $model->login()) {
            return $this->redirect(['/cp']);
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
