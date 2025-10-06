<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Store $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="store-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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
