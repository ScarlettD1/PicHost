<?php

namespace app\controllers;

use app\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class FileController extends Controller {
    public function actionUpload()
    {
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                Yii::$app->getSession()->setFlash('success', 'Изображения загружены!');
                return $this->redirect(['upload']);
            }
        }
        return $this->render('upload', ['model' => $model]);
    }
}