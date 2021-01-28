<?php

namespace app\models;

use Yii;
use \app\models\base\Timelog as BaseTimelog;

/**
 * This is the model class for table "timelog".
 */
class Timelog extends BaseTimelog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['pid', 'task', 'timespent', 'cost', 'aid'], 'required'],
            [['pid', 'timespent', 'cost', 'aid'], 'integer'],
            [['task'], 'string', 'max' => 50]
        ]);
    }
	
}
