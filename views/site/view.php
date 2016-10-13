<?php
$this->title = $book->name;
$this->params['breadcrumbs'][] = ['label' => 'Библиотека', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="panel panel-info">
    <!-- Default panel contents -->
    <div class="panel-heading"><a href ="<?=\yii\helpers\Url::to(['site/view', 'id'=> $book->id]) ?>"><h4>Книга: <?=$book->name?></h4></a></div>
    <!-- Table -->
    <table class="table">
        <tr>
            <td>Автор: <?=$book->author?></td>
        </tr>
        <tr>
            <td>Издательство: <?=$book->publish?></td>
        </tr>
        <tr>
            <td>Год издания: <?=$book->year?></td>
        </tr>
        <tr>
            <td>Количество страниц: <?=$book->pages?></td>
        </tr>
        <tr>
            <td>Количество иллюстраций: <?=$book->Illustrations?></td>
        </tr>
        <tr>
            <td>Стоимость: <?=$book->price?></td>
        </tr>
        <tr>
            <td>Название филиала: <?=$book->branch?></td>
        </tr>
        <tr>
            <td>Факультет: <?=$book->department?></td>
        </tr>
    </table>
</div>