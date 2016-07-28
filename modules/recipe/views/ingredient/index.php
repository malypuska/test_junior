<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>
<h1>Ингридиенты</h1>
<div><?= Html::a('Добавить', ['create'], ['class' => 'btn btn-primary']) ?></div>
<?php
echo GridView::widget([
    'dataProvider' => $model->search(),
    'filterModel' => $model,
    'columns' => [
        'name',
        'visible:boolean',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
    ],
]);
?>