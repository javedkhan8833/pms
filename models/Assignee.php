<?php

namespace app\models;

use Yii;
use \app\models\base\Assignee as BaseAssignee;

/**
 * This is the model class for table "assignee".
 */
class Assignee extends BaseAssignee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'gender', 'hourly', 'basic_pay', 'completed_project'], 'required'],
            [['phone', 'hourly', 'basic_pay', 'completed_project'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 60],
            [['gender'], 'string', 'max' => 10]
        ]);
    }
	
}
