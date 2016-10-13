<?php

/* @var $this yii\web\View */

$this->title = 'Библиотека';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="page-header">
        <h1><small><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Авторизуйтесь, чтобы получить доступ к редактированию библиотеки.</small></h1>
        <h2><small><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Книги, доступные к просмотру:</small></h2>
    </div>


     <?php if(!empty($books)): ?>
            <?php foreach ($books as $book): ?>

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
                </table>
            </div>

            <?php endforeach; ?>
        <?= \yii\widgets\LinkPager::widget(


             ['pagination' => $pages],

              $options = [
                  'class' => 'pagination pagination-sm']



         )

         ?>
    <?php endif; ?>





</div>
