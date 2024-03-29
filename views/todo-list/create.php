<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TodoListItem */

$this->title = 'Create TODO Item';
?>

<div class="todo-list-item-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
