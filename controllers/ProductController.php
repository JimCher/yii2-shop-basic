<?php


namespace app\controllers;


use app\models\Product;

class ProductController extends AppContoller
{
    public function actionView($id){
        $product = Product::find()->with('category')->where('id=:id',[':id'=>$id])->asArray()->limit(1)->one();

        return $this->render('view', compact('product'));
    }

}