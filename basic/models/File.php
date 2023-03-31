<?php


namespace app\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $date
 */
class File extends \yii\db\ActiveRecord
{

    public static function saveFile($file)
    {
        $filename = "$file->baseName.$file->extension";
        $model = new File();
        $model->name = $filename;
        $model->date = date("Y-m-d");
        $model->save();
        $model->name = "$model->id-$model->name";
        $model->save();
        $file->saveAs("uploads/$model->name");
        return $model;
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date' => 'Date',
        ];
    }
}
