<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "pa_junction".
 *
 * @property integer $id
 * @property integer $pid
 * @property integer $aid
 *
 * @property \app\models\Assignee $a
 * @property \app\models\Project $p
 */
class PaJunction extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'a',
            'p'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'aid'], 'required'],
            [['pid', 'aid'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pa_junction';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Project Name',
            'aid' => 'Employee Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getA()
    {
        return $this->hasOne(\app\models\Assignee::className(), ['id' => 'aid']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(\app\models\Project::className(), ['id' => 'pid']);
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
     * @return \app\models\PaJunctionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PaJunctionQuery(get_called_class());
    }
}
