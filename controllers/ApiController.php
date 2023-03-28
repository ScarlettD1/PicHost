<?php

namespace app\controllers;

use yii\rest\Controller;
use yii\web\Response;
use app\models\Image;

class ApiController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    public function actionTotal()
    {
        $count = Image::find()->count();
        return ['total' => $count];
    }

    public function actionList($page = 1)
    {
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $images = Image::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit($limit)
            ->offset($offset)
            ->all();

        $list = [];
        foreach ($images as $image) {
            $list[] = [
                'id' => $image->id,
                'path' => 'uploads/' . $image->filename,
            ];
        }

        return ['page' => $page, 'list' => $list];
    }

    public function actionView($id)
    {
        $image = Image::findOne($id);
        if ($image) {
            return ['id' => $image->id, 'path' => $image->filename];
        } else {
            return ['error' => 'Изображение не найдено.'];
        }
    }
}