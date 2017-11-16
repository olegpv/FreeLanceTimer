<?php

namespace app\modules\timer\models;

/**
 * This is the ActiveQuery class for [[TaskTime]].
 *
 * @see TaskTime
 */
class TaskTimeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TaskTime[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TaskTime|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
