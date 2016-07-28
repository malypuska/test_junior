<?php

use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
?>
<h1>Поиск блюда.</h1>
<?php $form = ActiveForm::begin(); ?>
<?= $form->errorSummary($SearchForm) ?>
<?php
echo $form->field($SearchForm, 'search', ['template' => "{input}\n{hint}"])->widget(Select2::className(), [
    'language' => 'ru',
    'data' => ArrayHelper::map($SearchForm->Ingredient, 'id', 'name'),
    'options' => ['placeholder' => 'Выбирите ингридиенты', 'multiple' => true],
    'pluginOptions' => [
        'allowClear' => false,
        'minimumInputLength' => 1,
        'minimumResultsForSearch' => 1,
        'maximumSelectionLength' => 5,
    ],
        /*                                            'pluginEvents' => [
          'change' => 'function() { alert("select")}',
          ],
         */
])->label(false);
?>
<?= Html::submitButton('Найти', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>
<?php if ($SearchForm->validate()) : ?>
<?= ListView::widget([
        'id' => 'list-ingredient-all',
        'dataProvider' => $RecipeIngredient->search($SearchForm->search),
        'itemView' => '_recipe',
        'layout' => "{items}",
        'emptyText' => 'Ничего не найдено',
    ]);
?>
<?php endif; ?>