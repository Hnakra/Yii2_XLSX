<?php
namespace app\controllers;

use app\models\Transaction;
use app\models\UploadForm;
use Yii;
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
        return $this->render('view', [
            'transactions' => $transactions,
            'model' => $model
        ]);
    }
}