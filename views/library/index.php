<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LibrarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>


<?php
$this->title = 'Библиотека';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-index">

    <div class="page-header">
        <h1><small><span class="glyphicon glyphicon-book" aria-hidden="true"></span> <?= Html::encode($this->title); ?></small></h1>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-star" aria-hidden="true"></span>Добавить книгу', ['create'], ['class' => 'btn btn-info']) ?>

    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           // 'id',
            'name',
            'author',
            'publish',
            'year',
             'pages',
             'Illustrations',
             'price',
             'branch',
             'department',
            ['class' => 'yii\grid\ActionColumn'],
        ],

        'options' => [
            'class' => 'grid-view'
        ],

        'rowOptions' => [
//            'style' => 'background-color:#778899;'
        ],
    ]);


    ?>
</div>
