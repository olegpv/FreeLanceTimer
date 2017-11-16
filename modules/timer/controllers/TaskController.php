<?php

namespace app\modules\timer\controllers;

use app\modules\timer\models\VerbCustom;
use yii\data\ActiveDataProvider;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use app\modules\timer\models\Task;


class TaskController extends ActiveController {
    public $modelClass = 'app\modules\timer\models\Task';


    public function behaviors() {
        $behaviors = parent::behaviors();

        $behaviors['verbFilter'] = [
            'class' => VerbCustom::className(),
            'actions' => [
                'index' => ['get'],
                'view' => ['get'],
                'create' => ['post'],
                'update' => ['put'],
                'delete' => ['delete'],
                'start' => ['post'],
            ],
        ];

        // add CORS filter
        $behaviors=array_merge(['corsFilter' => [
            'class' => Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
            ],
        ]], $behaviors);



        return $behaviors;
    }

    public function actionIndex() {
        return new ActiveDataProvider([
            'query' => Task::find()->where([

            ])
        ]);
    }

    public function actionView($id) {
        return $this->loadModel($id);
    }

    public function actionCreate() {
        $model = new Task();

        $bodyParam = \Yii::$app->getRequest()->getBodyParams();

        $model->load($bodyParam, '');
        $model->user_id = \Yii::$app->user->id;
        if ($model->validate() && $model->save()) {
            $response = \Yii::$app->getResponse();
            $response->setStatusCode(201);
            $id = implode(',', array_values($model->getPrimaryKey(true)));
            $response->getHeaders()->set('Location', Url::toRoute([$id], true));
        } else {
            // Validation error
            throw new HttpException(422, json_encode($model->errors));
        }


        return $model;
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $bodyParams = \Yii::$app->getRequest()->getBodyParams();

        $model->load($bodyParams, '');

        if ($model->validate() && $model->save()) {
            $response = \Yii::$app->getResponse();
            $response->setStatusCode(200);
        } else {
            // Validation error
            throw new HttpException(422, json_encode($model->errors));
        }

        return $model;
    }

    /**
     * @return string
     * @throws HttpException
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionStart() {
        $bodyParams = \Yii::$app->getRequest()->getBodyParams();
        $model = $this->loadModel($bodyParams['id']);
        if ($model->start()) {
            $response = \Yii::$app->getResponse();
            $response->setStatusCode(200);
        } else {
            // Validation error
            throw new HttpException(422, json_encode($model->errors));
        }

        return 'ok';
    }

    public function actionDelete($id) {
        $model = $this->loadModel($id);


        if ($model->delete() === false) {
            throw new ServerErrorHttpException('Failed to delete the object for unknown reason.');
        }

        $response = \Yii::$app->getResponse();
        $response->setStatusCode(204);
        return "ok";

    }

    /**
     * @param $id
     * @return Task
     * @throws NotFoundHttpException
     */
    protected function loadModel($id) {
        $task = Task::find()->where([
            'id' => $id,
        ])->one();
        if ($task) {
            return $task;
        } else {
            throw new NotFoundHttpException("Object not found: $id");
        }
    }

}
