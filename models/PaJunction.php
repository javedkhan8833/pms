<?php

namespace app\models;

use Yii;
use \app\models\base\PaJunction as BasePaJunction;

/**
 * This is the model class for table "pa_junction".
 */
class PaJunction extends BasePaJunction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['pid', 'aid'], 'required'],
            [['pid', 'aid'], 'integer']
        ]);
    }
	
}
