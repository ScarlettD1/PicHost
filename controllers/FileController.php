<?php

namespace app\controllers;

use app\models\Image;
use app\models\UploadForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class FileController extends Controller {

    public function actionIndex()
    {
        $query = Image::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionView($id)
    {
        $image = Image::findOne($id);
        if (!$image) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view', ['src' => '/uploads/' . $image->filename]);
    }

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