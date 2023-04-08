<?php


namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Product;

class CategoryController extends AppContoller
{
    public function actionIndex(){
        $hits = Product::find()->where(['hit'=>'1'])->limit(6)->asArray()->all();

        return $this->render('index',[
            'hits' => $hits
        ]);
    }

    public function actionView($id = null){
        $products = Product::find()->where('category_id=:id',[':id'=> $id])->asArray()->all();

        return $this->render('view', [
            'products'=>$products
        ]);
    }
}