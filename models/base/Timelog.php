<?php

namespace app\models\base;
use app\models\Project;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "timelog".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $task
 * @property integer $timespent
 * @property integer $cost
 * @property integer $aid
 *
 * @property \app\models\Project $p
 */
class Timelog extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'p'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'task', 'timespent', 'cost', 'aid'], 'required'],
            [['pid', 'timespent', 'cost', 'aid'], 'integer'],
            [['task'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timelog';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Project Name',
            'task' => 'Task',
            'timespent' => 'Timespent',
            'cost' => 'Cost',
            'aid' => 'Assignee Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(\app\models\Project::className(), ['id' => 'pid']);
    }
   

    public function geta()
    {
        return $this->hasOne(\app\models\Assignee::className(), ['id' => 'aid']);
    }
    
   
    /**
     * @inheritdoc
     * @return array mixed
     */
    // public function behaviors()
    // {
    //     return [
    //         'timestamp' => [
    //             'class' => TimestampBehavior::className(),
    //             'createdAtAttribute' => 'created_at',
    //             'updatedAtAttribute' => 'updated_at',
    //             'value' => new \yii\db\Expression('NOW()'),
    //         ],
    //     ];
    // }


    /**
     * @inheritdoc
     * @return \app\models\TimelogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TimelogQuery(get_called_class());
    }
}
