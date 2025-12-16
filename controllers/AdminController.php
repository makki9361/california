<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use app\models\LoginForm;
use app\models\OrdersForm;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class AdminController extends Controller
{
    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'index', 'orders', 'view-order', 'update-order', 'delete',
                    'products', 'view-product', 'create-product', 'update-product', 'delete-product'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index', 'orders', 'view-order', 'update-order', 'delete',
                            'products', 'view-product', 'create-product', 'update-product', 'delete-product'],
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

    public function actionProducts()
    {
        $searchModel = new Product();
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->with('category'),
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('products', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionViewProduct($id)
    {
        $model = $this->findProductModel($id);

        return $this->render('view-product', [
            'model' => $model,
        ]);
    }

    public function actionCreateProduct()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->validate()) {
                if ($model->imageFile && $model->imageFile->tempName) {
                    $fileName = uniqid() . '.' . $model->imageFile->extension;
                    $filePath = 'media/' . $fileName;

                    $uploadDir = dirname($filePath);
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    if ($model->imageFile->saveAs($filePath)) {
                        $model->image = $fileName;
                    }
                }

                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Продукт успешно создан.');
                    return $this->redirect(['view-product', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create-product', [
            'model' => $model,
            'categories' => Category::find()->select(['name', 'id'])->indexBy('id')->column(),
        ]);
    }

    public function actionUpdateProduct($id)
    {
        $model = $this->findProductModel($id);
        $oldImage = $model->image;

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->validate()) {
                if ($model->imageFile && $model->imageFile->tempName) {
                    $fileName = uniqid() . '.' . $model->imageFile->extension;
                    $filePath = 'media/' . $fileName;

                    $uploadDir = dirname($filePath);
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    if ($model->imageFile->saveAs($filePath)) {
                        if ($oldImage && file_exists($oldImage)) {
                            @unlink($oldImage);
                        }
                        $model->image = $fileName;
                    }
                } else {
                    $model->image = $oldImage;
                }

                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Продукт успешно обновлен.');
                    return $this->redirect(['view-product', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update-product', [
            'model' => $model,
            'categories' => Category::find()->select(['name', 'id'])->indexBy('id')->column(),
        ]);
    }

    public function actionDeleteProduct($id)
    {
        $model = $this->findProductModel($id);

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Продукт успешно удален.');
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка при удалении продукта.');
        }

        return $this->redirect(['products']);
    }

    protected function findProductModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Продукт не найден.');
    }
}