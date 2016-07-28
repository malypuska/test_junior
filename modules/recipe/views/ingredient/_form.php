<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<div>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'visible')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
