<?php

namespace app\controllers\api;

use yii\rest\ActiveController;
use app\models\TodoListItem;
use yii\web\Response;

class TodoListApiController extends ActiveController
{
    public $modelClass = TodoListItem::class;

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;
        return $behaviors;
    }


}