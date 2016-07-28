<?php
use yii\helpers\Html;
$this->title = 'Ингридиент';
$this->params['breadcrumbs'][] = ['label' => 'Ингридиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referrer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
