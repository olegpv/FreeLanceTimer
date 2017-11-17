<?php

namespace app\modules\timer\models;

use Yii;

/**
 * This is the model class for table "task_time".
 *
 * @property integer $id
 * @property integer $task_id
 * @property integer $start
 * @property integer $lenght
 * @property integer $manual
 *
 * @property Task $task
 */
class TaskTime extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'task_time';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['task_id', 'start',], 'required'],
            [['task_id', 'start', 'length', 'manual'], 'integer'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'task_id' => 'Task ID',
            'start' => 'Start',
            'length' => 'length',
            'manual' => 'Manual',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask() {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    /**
     * @inheritdoc
     * @return TaskTimeQuery the active query used by this AR class.
     */
    public static function find() {
        return new TaskTimeQuery(get_called_class());
    }

    public function calcLength() {
        if ($this->length) {
            return $this->length;
        } else {
            return time() - $this->start;
        }
    }
}
