<?php

use app\models\Todo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Todos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-index">




    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
        
            [
                'header' => 'Todo item name',
                'attribute' => 'name',
                'value' => function ($model) {
                        return $model->name;
                    }
            ],

            
            [
                'header' => 'Category',
                'attribute' => 'category_id',
                'value' => function ($model) {
                        return $model->category->name;
                    }
            ],
            [
                'header' => 'Timestamp',
                'attribute' => 'timestamp',
                'value' => function ($model) {                    
                        return date('d M', strtotime($model->timestamp));
               
                    }
            ],


            [
                'header' => 'Actions',
                'class' => ActionColumn::className(),
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model, $key) { // render your custom button
                            return Html::a('delete', Url::toRoute(['todo/delete', 'id' => $model->id]), [
                                'class' => 'btn btn-danger delete-btn',
                                'onclick' => 'deleteToDo(event)'
                            ]);
                        },
                ],
            ],


        ],
    ]); ?>


</div>
