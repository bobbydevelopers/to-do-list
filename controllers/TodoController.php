<?php

namespace app\controllers;

use app\models\Todo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;


class TodoController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),

                ],
            ]
        );
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Todo::find(),

        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Todo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                if(\Yii::$app->request->isAjax) {
                    \Yii::$app->response->format = Response::FORMAT_JSON;

                    $dataProvider = new ActiveDataProvider([
                        'query' => Todo::find(),
            
                    ]);
            
                    return $this->renderAjax('../todo/index', [
                        'dataProvider' => $dataProvider,
                    ]);
                }
                return $this->redirect(['../site/index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $data['status'] = 'NOK';
        try {
            $this->findModel($id)->delete();
            return $this->redirect(['../site/index']);
            $data['status'] = 'OK';
        } catch (\Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }


    protected function findModel($id)
    {
        if (($model = Todo::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
