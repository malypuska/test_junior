<?php $recipe = \app\models\Recipe::findOne($model->recipe_id); ?>
<div class="view-block-recipe">
    <h4><?= $recipe->name ?></h4>
<?php foreach ($recipe->ingredient as $ingredient) : ?>
    <div class="view-recipe-ingredient"><?= $ingredient->name ?></div>
<?php endforeach; ?>       
</div>
<hr>