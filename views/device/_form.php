<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Device $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="device-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stored_in')->textInput() //->dropDownList($model->retrieveStoresArray()) валидация не работает ?>

<!--
    <?= $form->field($model, 'created_at')->textInput() ?>
 
    <?= $form->field($model, 'updated_at')->textInput() ?> 
-->

    <?php
        if($bUseTimeFields)
        {
            $form->field($model, 'created_at')->textInput();
            $form->field($model, 'updated_at')->textInput();
        }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
