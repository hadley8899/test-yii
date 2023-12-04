<?php
/* @var $this yii\web\View */
/* @var $todos app\models\TodoListItem[] */

use yii\helpers\Html;

$this->title = 'To-Do List';
?>

<?= Html::a('Create New To-Do', ['todo-list/create'], ['class' => 'btn btn-success']) ?>


<h1><?= Html::encode($this->title) ?></h1>

<table class="table">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($todos as $todo): ?>
        <tr>
            <td><?= Html::encode($todo->title) ?></td>
            <td><?= Html::encode($todo->description) ?></td>
            <td>
                <?= Html::a('Update', ['todo-list/update', 'id' => $todo->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['todo-list/delete', 'id' => $todo->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>