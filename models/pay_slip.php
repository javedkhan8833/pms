<?php

namespace app\models;

use Yii;
use \app\models\base\pay_slip as Basepay_slip;

/**
 * This is the model class for table "pay_slip".
 */
class pay_slip extends Basepay_slip
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['emp_id', 'pay_mongth', 'basic', 'ot_payment', 'total_payment', 'deduction_advance', 'deduction_other', 'net_pay'], 'required'],
            [['emp_id', 'basic', 'ot_hours', 'ot_rate', 'ot_payment', 'total_payment', 'deduction_advance', 'deduction_other', 'net_pay'], 'integer'],
            [['pay_mongth'], 'string', 'max' => 20]
        ]);
    }
	
}
