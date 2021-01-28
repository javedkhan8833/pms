<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "assignee".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $phone
 * @property string $gender
 * @property integer $hourly
 * @property integer $basic_pay
 * @property integer $completed_project
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\PaJunction[] $paJunctions
 */
class Assignee extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'paJunctions'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'gender', 'hourly', 'basic_pay', 'completed_project'], 'required'],
            [['phone', 'hourly', 'basic_pay', 'completed_project'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 60],
            [['gender'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assignee';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'gender' => 'Gender',
            'hourly' => 'Hourly',
            'basic_pay' => 'Basic Pay',
            'completed_project' => 'Completed Project',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaJunctions()
    {
        return $this->hasMany(\app\models\PaJunction::className(), ['aid' => 'id']);
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
     * @return \app\models\AssigneeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AssigneeQuery(get_called_class());
    }
}
