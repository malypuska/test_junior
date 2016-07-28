<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Parking */
/* @var $historyDataProvider \yii\data\DataProviderInterface */

$this->title = 'Элемент';
$this->params['breadcrumbs'][] = ['label' => 'Элементы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        'name',
        'visible:boolean',
        ],
    ]) ?>
</div>
