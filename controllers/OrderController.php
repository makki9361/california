<?php

namespace app\controllers;

use app\models\OrdersForm;
use app\models\Product;
use yii\web\Controller;
use Yii;

class OrderController extends Controller
{
    public function actionSend()
    {
        $model = new OrdersForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model = OrdersForm::find()
                ->where(['id' => $model->id])
                ->with('product')
                ->one();

            $this->sendEmail($model);
            Yii::$app->session->setFlash('success', 'Заказ успешно сохранен!');

            return $this->refresh();
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    private function sendEmail($order)
    {
        $productName = 'Не указан';
        if ($order->product_id && $order->product) {
            $productName = $order->product->name;
        } elseif ($order->product_id) {
            $product = Product::findOne($order->product_id);
            $productName = $product ? $product->name : 'Товар #' . $order->product_id;
        }

        $emailContent = $this->renderPartial('@app/mail/_email-template', [
            'order' => $order,
            'productName' => $productName,
        ]);

        $fromEmail = Yii::$app->params['senderEmail'];
        $toEmail = $order->email;

        $message = Yii::$app->mailer->compose()
            ->setFrom([$fromEmail => Yii::$app->name])
            ->setTo($toEmail)
            ->setSubject("Новый заказ #{$order->id} от {$order->name}")
            ->setHtmlBody($emailContent);

        if ($message->send()) {
            Yii::info("Письмо о заказе #{$order->id} успешно отправлено", 'mail');
            return true;
        } else {
            Yii::error("Ошибка отправки письма о заказе #{$order->id}", 'mail');
            return false;
        }

    }
}