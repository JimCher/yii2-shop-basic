<?php
namespace app\controllers;


use app\models\Cart;
use app\models\Product;
use Yii;

class CartController extends AppContoller
{
    public function actionAdd($id){
        $product = Product::find()->where('id=:id',[':id'=>$id])->asArray()->limit(1)->one();
        if (empty($product)) return false;

        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }
}