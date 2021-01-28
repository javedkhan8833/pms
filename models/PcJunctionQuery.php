<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PcJunction]].
 *
 * @see PcJunction
 */
class PcJunctionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PcJunction[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PcJunction|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
