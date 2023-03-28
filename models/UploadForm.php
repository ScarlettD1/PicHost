<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 5],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $fileName = strtolower(Inflector::transliterate($file->baseName));
                $filePath = 'uploads/' . $fileName . '.' . $file->extension;
                if (!file_exists("uploads/")){
                    mkdir("uploads/", 0777);
                }
                $counter = 0;
                while (file_exists($filePath)){
                    $counter++;
                    $fileName = $fileName . 'uniq' . $counter;
                    $filePath = 'uploads/' . $fileName . '.' .$file->extension;
                }
                $file->saveAs($filePath);
                $model = new Image();
                $model->filename = $fileName;
                $model->created_at = date('Y-m-d H:i:s');
                $model->save();
            }
            return true;
        } else {
            return false;
        }
    }

}
