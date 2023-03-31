<?php

use app\models\Transaction;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $transactions \app\models\Transaction[]|array */
/* @var $model \app\models\UploadForm */
/* @var $summa_all int*/
/* @var $summa_last_file int*/
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?= $form->field($model, 'file')->fileInput() ?>
    <button>Загрузить</button>
<?php ActiveForm::end() ?>
<p>Суммарная стоимость: <?=$summa_all?></p>
<?php
if($transactions->count() != 0){
    ?>
    <p>Суммарная стоимость из последнего файла (для того, чтобы показать рабочую связь между таблицами): <?=$summa_last_file?></p>
    <?php
}
?>

<?php
/*$dataProvider = new ActiveDataProvider([
    'query' => $transactions,
    'pagination' => [
        'pageSize' => 10,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
]);*/
