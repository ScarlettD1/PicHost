<?php

/** @var yii\web\View $this */

use yii\widgets\ActiveForm;


$this->title = 'PicHost';
?>
<div class="w-100 m-auto">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <h1 class="h3 my-3 fw-normal">Загрузите файлы</h1>
    <?php Yii::$app->session->hasFlash('success') ?>
    <div class="form">
        <?= $form->field($model, 'imageFiles[]')->fileInput(['class' => "form-control py-6", 'multiple' => true, 'accept' => 'image/*']) ?>
        <button type="submit" class="btn mt-4 btn-primary">Загрузить</button>
    </div>
    <?php ActiveForm::end() ?>
</div>
