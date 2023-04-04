<?php


namespace app\widgets;


use app\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{
    //parameter about type of menu
    public $tmpl;
    //categories from db
    public $data;
    //result of conversion $data
    public $tree;
    //html code depending from $tmpl
    public $menuHtml;

    public function init()
    {
        parent::init();

        if ($this->tmpl === null) {
            $this->tmpl = 'menu';
        }
        $this->tmpl .= '.php';
    }

    public function run()
    {
        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
//        debug($this->data);
        return $this->menuHtml;
    }

    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] =  &$node;
            } else {
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree)
    {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->cutToTemplate($category);
        }
        return $str;
    }

    protected function cutToTemplate($category)
    {
        ob_start();
        include __DIR__ . '/menu_tmpl/' . $this->tmpl;
        return ob_get_clean();
    }

}