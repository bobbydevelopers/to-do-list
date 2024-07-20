<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var app\models\Todo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="todo-form">

    <?php $form = ActiveForm::begin([
        'id' => 'to-do-form',
        'action' => ['todo/create'],
        'options' => [
            'onSubmit' => (Yii::$app->controller->id == 'todo') ? false : 'addTask(event)'
        ],
    ]); ?>


<div class="input">
<?= $form->field($model, 'category_id')->dropDownList($model->getAllCategories()) ?>
</div>
    
<div class="input">
<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Type todo item name'])->label(false) ?>
</div>


<div class="input">
<?= Html::submitButton('Add', ['class' => 'btn btn-success', 'id'=>'btn-add']) ?>
</div>

    <?php ActiveForm::end(); ?>

</div>
