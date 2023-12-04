<?php

namespace app\controllers;

use app\models\TodoListItem;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class TodoListController extends Controller
{
    public function actionIndex(): string
    {
        $todos = TodoListItem::find()->all();

        return $this->render('index', [
            'todos' => $todos,
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new TodoListItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = TodoListItem::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = TodoListItem::findOne($id)->delete();

        return $this->redirect('index');
    }
}