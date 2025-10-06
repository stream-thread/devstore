<?php
use yii\helper\Html;
use yii\widgets\LinkPager;
?>

<h1>Stores</h1>
<ul>
    <?php foreach($stores as $store): ?>
        <li>
            <?= Html::encode("{$store->name} {$store->updated_at}") ?>
        </li>
    <?php endforeach; ?>
</ul>

<?=LinkPager::widget(['pagination' => $pagination]) ?>