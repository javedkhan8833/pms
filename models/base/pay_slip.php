<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "pay_slip".
 *
 * @property integer $id
 * @property integer $emp_id
 * @property string $pay_mongth
 * @property integer $basic
 * @property integer $ot_hours
 * @property integer $ot_rate
 * @property integer $ot_payment
 * @property integer $total_payment
 * @property integer $deduction_advance
 * @property integer $deduction_other
 * @property integer $net_pay
 */
class pay_slip extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    // public function relationNames()
    // {
    //     return [
    //         ''
    //     ];
    // }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_id', 'pay_mongth', 'basic', 'ot_payment', 'total_payment', 'deduction_advance', 'deduction_other', 'net_pay'], 'required'],
            [['emp_id', 'basic', 'ot_hours', 'ot_rate', 'ot_payment', 'total_payment', 'deduction_advance', 'deduction_other', 'net_pay'], 'integer'],
            [['pay_mongth'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pay_slip';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_id' => 'Emp ID',
            'pay_mongth' => 'Pay Mongth',
            'basic' => 'Basic',
            'ot_hours' => 'Overtime Hours',
            'ot_rate' => 'Overtime Rate',
            'ot_payment' => 'Overtime Payment',
            'total_payment' => 'Total Payment',
            'deduction_advance' => 'Deduction Advance',
            'deduction_other' => 'Deduction Other',
            'net_pay' => 'Net Pay',
        ];
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
     * @return \app\models\pay_slipQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\pay_slipQuery(get_called_class());
    }
}
