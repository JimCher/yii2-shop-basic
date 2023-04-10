<?php


namespace app\controllers;


use app\models\Product;

class ProductController extends AppContoller
{
    public function actionView($id){

        $product = Product::find()->with('category')->where('id=:id',[':id'=>$id])->asArray()->limit(1)->one();

        if (empty($product))
            throw new \yii\web\HttpException(404, "There is no {$id} product");

        $hits = Product::find()->where(['hit' => '1'])->limit(5)->asArray()->all();

        $this->setMetaTags('E-Shop | ' . $product['name'], $product['keywords'], $product['description']);

        return $this->render('view', compact('product', 'hits'));
    }


}