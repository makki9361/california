<?php

namespace app\controllers;

use app\models\Product;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use app\models\LoginForm;
use app\models\OrdersForm;
use yii\web\NotFoundHttpException;

class AdminController extends Controller
{
    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'index', 'orders', 'view-order', 'update-order', 'delete'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index', 'orders', 'view-order', 'update-order', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    return $this->redirect(['admin/login']);
                },
            ],
        ];
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['admin/index']);
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['admin/index']);
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['admin/login']);
    }

    public function actionIndex()
    {
        $totalOrders = OrdersForm::find()->count();
        $todayOrders = OrdersForm::find()
            ->where(['>=', 'created_at', date('Y-m-d 00:00:00')])
            ->count();

        return $this->render('index', [
            'totalOrders' => $totalOrders,
            'todayOrders' => $todayOrders,
        ]);
    }

    public function actionOrders()
    {
        $searchModel = new OrdersForm();
        $dataProvider = new ActiveDataProvider([
            'query' => OrdersForm::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('orders', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionViewOrder($id)
    {
        $model = $this->findModel($id);

        return $this->render('view-order', [
            'model' => $model,
            'productsList' => Product::getProductsList(),
        ]);
    }

    public function actionUpdateOrder($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Заказ успешно обновлен.');
            return $this->redirect(['view-order', 'id' => $model->id]);
        }

        return $this->render('update-order', [
            'model' => $model,
            'productsList' => Product::getProductsList(),
        ]);
    }

    public function actionCreate()
    {
        $model = new OrdersForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Заказ успешно создан.');
            return $this->redirect(['view-order', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'productsList' => Product::getProductsList(),
        ]);
    }


    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Заказ успешно удален.');
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка при удалении заказа.');
        }

        return $this->redirect(['orders']);
    }

    protected function findModel($id)
    {
        if (($model = OrdersForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Заказ не найден.');
    }
}