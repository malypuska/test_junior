<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\helpers\ArrayHelper;

$this->title = 'Блюдо';
$this->params['breadcrumbs'][] = ['label' => 'Блюда', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
<?php if ($ingredient) : ?>
<div class="ingredient-recipe-block"  data-recipe-id="<?= $model->id ?>">
<div class="ingredient-block ingredient-recipe">
<?= ListView::widget([
    'id'=>'list-ingredient-recipe',
    'dataProvider' => $model->RecipeIngredient,
    'itemView' => '_ingredient_recipe',
    'layout' => "{items}",
]); ?>    
</div>
<div class="ingredient-block ingredient-all-recipe">    
<?= ListView::widget([
    'id'=>'list-ingredient-all',
    'dataProvider' => $ingredient->search_not(ArrayHelper::getColumn($model->ingredient, 'id')),
    'itemView' => '_ingredient_all',
    'layout' => "{items}",
]); ?>
</div>
</div>
<?php endif; ?>

<?php
$this->registerJs("$('.ingredient-item.all i').click(function(){
        var id = $(this).attr('data-id');
        var rid = $('.ingredient-recipe-block').attr('data-recipe-id');
        if (confirm('Добавить '+$('#ingredient-all-'+id).children('span').text()+' в блюдо?')) {
        $.ajax({
            type: 'POST',
            url: 'add-ingredient',
            data: {rid: rid, id : id},
            success: function (data) {

                $('#ingredient-all-'+id).hide();
            },
            error: function (data) {
                console.log(data);
            }
        });            
        }
    })
    
    $('.ingredient-item.recipe i').click(function(){
        var id = $(this).attr('data-id');
        var rid = $('.ingredient-recipe-block').attr('data-recipe-id');
        if (confirm('Удалить '+$('#ingredient-recipe-'+id).children('span').text()+' из блюда?')) {
        $.ajax({
            type: 'POST',
            url: 'delete-ingredient',
            data: {rid: rid, id : id},
            success: function (data) {

                $('#ingredient-recipe-'+id).hide();
            },
            error: function (data) {
                console.log(data);
            }
        });            
        }
    })
");
?>