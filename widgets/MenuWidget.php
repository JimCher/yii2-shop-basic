<?php


namespace app\widgets;


use yii\base\Widget;

class MenuWidget extends Widget
{
    public $tmpl;

    public function init()
    {
        parent::init();

        if($this->tmpl === null){
            $this->tmpl = 'menu';
        }
        $this->tmpl .= 'php';
    }

    public function run()
    {
       return $this->tmpl;
    }

}