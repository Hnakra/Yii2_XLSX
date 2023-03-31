<?php

use app\models\Transaction;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $transactions \app\models\Transaction[]|array */
/* @var $model \app\models\UploadForm */
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?= $form->field($model, 'file')->fileInput() ?>
    <button>Загрузить</button>
<?php ActiveForm::end() ?>

<?php
$dataProvider = new ActiveDataProvider([
    'query' => $transactions,
    'pagination' => [
        'pageSize' => 10,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
]);
