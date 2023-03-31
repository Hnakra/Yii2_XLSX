<?php
namespace app\models;

use yii\base\BaseObject;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public $file;

    public function rules()
    {
        return [
            [['file'], 'required'],
            [['file'], 'file', 'extensions' => 'xlsx'],
        ];
    }
    public function upload(){
        if ($this->validate()) {
            $fileModel = File::saveFile($this->file);

            $file = \PhpOffice\PhpSpreadsheet\IOFactory::load("uploads/$fileModel->name");
            $sheet = $file->getActiveSheet();
            $rows = $sheet->toArray(null, true, true, true);

            foreach ($rows as $row) {
                $data = array(
                    'id' => $row['A'],
                    'date' => date("Y-m-d", strtotime($row['B'])),
                    'value' => (int) $row['C']
                );
                Transaction::saveTransaction($data, $fileModel->id);
            }
            return true;
        } else {
            return false;
        }
    }
}