<?php

namespace app\models;

use Yii;
use \app\models\base\PcJunction as BasePcJunction;

/**
 * This is the model class for table "pc_junction".
 */
class PcJunction extends BasePcJunction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['pid', 'cid'], 'required'],
            [['pid', 'cid'], 'integer']
        ]);
    }
	
}
