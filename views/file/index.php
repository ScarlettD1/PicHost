<?php

/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Html;


$this->title = 'PicHost view';
?>
<div class="w-100">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'filename',
            'created_at:datetime',
            [
                'attribute' => 'Preview',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img(Yii::getAlias('@web/uploads/' . $model->filename), ['width' => '100']);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('View', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                    },
                ],
            ],
        ],
    ]) ?>
</div>
