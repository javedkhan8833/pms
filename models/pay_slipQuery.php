<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[pay_slip]].
 *
 * @see pay_slip
 */
class pay_slipQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return pay_slip[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return pay_slip|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
