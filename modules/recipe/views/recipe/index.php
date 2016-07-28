<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>
<h1>Блюда</h1>
<div><?= Html::a('Добавить', ['create'], ['class' => 'btn btn-primary']) ?></div>
<?php
echo GridView::widget([
    'dataProvider' => $model->search(),
    'filterModel' => $model,
    'columns' => [
        [
            'attribute' => 'name',
            'value'     => function($model){
                    return $model->name.' ('.count($model->ingredient).')';
            },
        ],                    
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
    ],
]);
?>

