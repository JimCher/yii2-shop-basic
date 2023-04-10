<?php

namespace app\models;

use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SearchForm extends Model
{
    public $query;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['query'], 'string', 'max' => 10],
            [['query'], 'trim'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'query' => 'Поиск...',
        ];
    }

}
