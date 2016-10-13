<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Library */

$this->title = 'Добавить книгу';
$this->params['breadcrumbs'][] = ['label' => 'Библиотека', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
