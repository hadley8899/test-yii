<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TodoListItem */

$this->title = 'Update TODO Item: ' . $model->title;
?>

<div class="todo-list-item-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
