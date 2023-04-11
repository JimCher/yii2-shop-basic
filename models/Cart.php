<?php


namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product, $qny = 1)
    {
//        debug($product);
        echo 'Cool !';
    }

}