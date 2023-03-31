<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;

/**
 * This is the model class for table "transactions".
 *
 * @property int $id
 * @property string|null $date
 * @property int|null $value
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transactions';
    }

    public static function saveTransaction($row)
    {
        if(!isset($row['id'])){
            return;
        }
        $transaction = Transaction::find()->where(['id' => $row['id']])->one();
        isset($transaction) ? Transaction::updateTransaction($row) : Transaction::addTransaction($row);
    }
    private static function updateTransaction($row)
    {
        $transaction = Transaction::find()->where(['id' => $row['id']])->one();
        $transaction->date = $row['date'];
        $transaction->value = $row['value'];
        $transaction->save();
    }
    private static function addTransaction($row)
    {
        $transaction = new Transaction();
        $transaction->id = $row['id'];
        $transaction->date = $row['date'];
        $transaction->value = $row['value'];
        $transaction->save();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'value'], 'required'],
            [['date'], 'datetime', 'format' => 'php:Y-m-d'],
            [['value'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'value' => 'Value',
        ];
    }
}
