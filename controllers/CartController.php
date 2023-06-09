<?php
namespace app\controllers;


use app\models\Cart;
use app\models\Product;
use Yii;

class CartController extends AppContoller
{
    public function actionAdd(int $id, int $qty = null){
        $product = Product::find()->where('id=:id',[':id'=>$id])->asArray()->limit(1)->one();
        if (empty($product)) return false;

        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);

        if (!Yii::$app->request->isAjax){
            return $this->redirect(Yii::$app->request->referrer);
        }

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionClearCart(){
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDeleteItem($id){
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionGetCart(){
        $session = Yii::$app->session;
        $session->open();

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionView(){
        return $this->render('view');
    }
}