<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

$count = 0;
while($count !== 100) {
    $this->params['breadcrumbs'][] = $count;
    $count++;
}

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card">
        <div class="card-header">
            Testing
        </div>

        <div class="card-body">


            This is the card body

        </div>
        <div class="card-footer">
            This is he card footer
        </div>
    </div>
</div>
