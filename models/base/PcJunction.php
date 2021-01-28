<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "pc_junction".
 *
 * @property integer $id
 * @property integer $pid
 * @property integer $cid
 *
 * @property \app\models\Category $c
 * @property \app\models\Project $p
 */
class PcJunction extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'c',
            'p'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'cid'], 'required'],
            [['pid', 'cid'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pc_junction';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Project Name',
            'cid' => 'Category Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(\app\models\Category::className(), ['id' => 'cid']);
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
     * @return \app\models\PcJunctionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PcJunctionQuery(get_called_class());
    }
}
