<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LibrarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'publish') ?>

    <?= $form->field($model, 'year') ?>

    <?php  echo $form->field($model, 'pages') ?>

    <?php  echo $form->field($model, 'Illustrations') ?>

    <?php  echo $form->field($model, 'price') ?>

    <?php  echo $form->field($model, 'branch') ?>

    <?php  echo $form->field($model, 'department') ?>
    

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Обновить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
