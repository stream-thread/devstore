<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Store $model */

$this->title = 'Update Store: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="store-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'bUseTimeFields' => $bUseTimeFields,
    ]) ?>

</div>

<h4>Устройства, хранящиеся на складе: </h4>
<?php foreach($model->devices as $device): ?>
    <p><?= $device->serial ?> | <?= $device->name ?></p>
<?php endforeach; ?>
