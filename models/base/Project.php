<?php

namespace app\models\base;
use app\models\PaJunction;
use app\models\Assignee;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "project".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $start_time
 * @property string $end_time
 * @property string $completion_time
 * @property string $assign_to
 * @property integer $budget
 * @property integer $cost
 * @property string $status
 * @property integer $completed
 * @property string $created_at
 * @property string $updated_at
 * @property integer $duration
 *
 * @property \app\models\PaJunction[] $paJunctions
 * @property \app\models\PcJunction[] $pcJunctions
 * @property \app\models\Timelog[] $timelogs
 */
class Project extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'paJunctions',
            'pcJunctions',
            'timelogs'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'start_time', 'end_time', 'assign_to', 'budget', 'cost'], 'required'],
            [['start_time', 'end_time', 'completion_time'], 'safe'],
            [['budget', 'cost'], 'integer'],
            [['name', 'assign_to'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            [['status'], 'string', 'max' => 20],
            [['completed'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Project Name',
            'description' => 'Description',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'completion_time' => 'Completion Time',
            'assign_to' => 'Assign To',
            'budget' => 'Budget',
            'cost' => 'Cost',
            'status' => 'Status',
            'completed' => 'Completed',
            'duration' => 'Duration',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaJunctions()
    {
        return $this->hasMany(\app\models\PaJunction::className(), ['pid' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPcJunctions()
    {
        return $this->hasMany(\app\models\PcJunction::className(), ['pid' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimelogs()
    {
        return $this->hasMany(\app\models\Timelog::className(), ['pid' => 'id']);
    }

    public function getAssignees()
    {
        return $this->hasMany(\app\models\Assignee::className(), ['id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ProjectQuery(get_called_class());
    }
}
