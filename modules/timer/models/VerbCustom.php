<?php
/**
 * Created by PhpStorm.
 * User: ol
 * Date: 11.11.2017
 * Time: 20:06
 */

namespace app\modules\timer\models;

use Yii;
use yii\filters\Cors;
use yii\filters\VerbFilter;

class VerbCustom extends  VerbFilter

{
    public function beforeAction($action)
    {

        if (Yii::$app->getRequest()->getMethod() === 'OPTIONS') {
            Yii::$app->getResponse()->getHeaders()->set('Allow', 'POST GET PUT');
            Yii::$app->end();
        }
        return parent::beforeAction($action);


    }
}