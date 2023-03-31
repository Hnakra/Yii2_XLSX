<?php
namespace app\controllers;

use app\models\File;
use app\models\Transaction;
use app\models\UploadForm;
use Yii;
use yii\base\BaseObject;
use yii\web\Controller;
use yii\web\UploadedFile;

class TransactionsPageController extends Controller{

    public function actionView()
    {
        $model = new UploadForm();
        if(Yii::$app->request->isPost){
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->upload();
        }

        $transactions = Transaction::find();
        $summa_all = $transactions->sum('value');

        $last_file_transactions = File::find()->orderBy(['id' => SORT_DESC])->one()->transactions;
        $summa_last_file = array_reduce($last_file_transactions, fn($carry, $item)=>$carry+$item->value);

        return $this->render('view', [
            'summa_all' => $summa_all,
            'transactions' => $transactions,
            'model' => $model,
            'summa_last_file' => $summa_last_file,
        ]);
    }
}