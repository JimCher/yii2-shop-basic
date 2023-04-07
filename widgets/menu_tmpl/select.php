<!--can be different-->
<li>
    <?= \yii\helpers\Html::a(
        '!!!'.$category['name'].
        (isset($category['childs']) ? '<span class="badge pull-right"><i class="fa fa-plus"></i></span>' : ''),
        ['']
    ) ?>
    <?php
    if (isset($category['childs'])): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs']) ?>
        </ul>
    <?php
    endif; ?>
</li>

