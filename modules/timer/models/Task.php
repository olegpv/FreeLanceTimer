<?php

namespace app\modules\timer\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $name
 * @property integer $start_time
 * @property integer $user_id
 * @property integer $project_id
 * @property integer $lenght
 *
 * @property Project $project
 * @property User $user
 * @property TaskTime[] $taskTimes
 */
class Task extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'user_id'], 'required'],
            [['start_time', 'user_id', 'project_id', 'lenght'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'start_time' => 'Start Time',
            'user_id' => 'User ID',
            'project_id' => 'Project ID',
            'lenght' => 'Lenght',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject() {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskTimes() {
        return $this->hasMany(TaskTime::className(), ['task_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TaskQuery the active query used by this AR class.
     */
    public static function find() {
        return new TaskQuery(get_called_class());
    }

    public function isStarted() {
        $taskTimes = $this->taskTimes;

        foreach ($taskTimes as $taskTime) {
            if ($taskTime->lenght === null) {
                return true;
            }
        }
        return false;
    }

    public function start() {
        if ($this->isStarted()) {
            return false;
        }
        $taskTime = new TaskTime();
        $taskTime->task_id = $this->id;
        $taskTime->start = time();
        $taskTime->save(false);
        return true;
    }

    public function getTime() {
        return 10;
    }
    public function getStarted() {
        return true;
    }

    public function fields() {
        $fields = ['time', 'started'];
        return array_merge(parent::fields(), array_combine($fields, $fields));
    }
}
