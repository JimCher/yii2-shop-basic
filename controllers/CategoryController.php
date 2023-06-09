<?php


namespace app\controllers;

use app\models\SearchForm;
use Yii;
use app\models\Category;
use app\models\Product;
use yii\base\BaseObject;
use yii\data\Pagination;

class CategoryController extends AppContoller
{


    public function actionIndex()
    {
        $this->setMetaTags('E-Shop');

        $hits = Product::find()->where(['hit' => '1'])->limit(6)->asArray()->all();

        return $this->render(
            'index',
            [
                'hits' => $hits
            ]
        );
    }

    public function actionView($id = null)
    {
        $category = Category::findOne(['id=:id', ['id' => $id]]);
        if (empty($category))
            throw new \yii\web\HttpException(404, "There is no {$id} category");

        $this->setMetaTags('E-Shop | ' . $category->name, $category->keywords, $category->description);

//        $products = Product::find()->where('category_id=:id',[':id'=> $id])->asArray()->all();
        $query = Product::find()->where('category_id=:id', [':id' => $id])->asArray();
        $pages = new Pagination(
            [
                'totalCount' => $query->count(),
                'pageSize' => 3,
                'forcePageParam' => false,
                'pageSizeParam' => false
            ]
        );
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render(
            'view',
            [
                'products' => $products,
                'pages' => $pages,
                'category' => $category,
            ]
        );
    }


    public function actionSearch(){
        $model = new SearchForm();
        $model->load(Yii::$app->request->get());
        $query = trim($model->query);
        $this->setMetaTags('E-Shop | ' . $model->query);
        if (!$model->validate() || !$query){
            return $this->render(
                'search',
                [
                    'modelSearch' =>  $model,
                ]
            );
        }

        $query = Product::find()->where(['like', 'name', $query])->asArray();
        $pages = new Pagination(
            [
                'totalCount' => $query->count(),
                'pageSize' => 3,
                'forcePageParam' => false,
                'pageSizeParam' => false
            ]
        );

        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();


        return $this->render(
            'search',
            [
                'products' => $products,
                'pages' => $pages,
                'modelSearch' =>  $model,
            ]
        );
    }
}