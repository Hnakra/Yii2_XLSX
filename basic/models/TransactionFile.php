<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;

/**
 * This is the model class for table "transaction_file".
 *
 * @property int $id
 * @property int $id_transaction
 * @property int $id_file
 */
class TransactionFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction_file';
    }
    public static function edit($id_transaction, $id_file)
    {
        $model = TransactionFile::findOne(['id_transaction' => $id_transaction]);
        $model->id_file = $id_file;
        $model->save();
    }
    public static function add($id_transaction, $id_file)
    {
        $model = new TransactionFile();
        $model->id_transaction = $id_transaction;
        $model->id_file = $id_file;
        $model->save();
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaction', 'id_file'], 'required'],
            [['id_transaction', 'id_file'], 'default', 'value' => null],
            [['id_transaction', 'id_file'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_transaction' => 'Id Transaction',
            'id_file' => 'Id File',
        ];
    }
}
