<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PaJunction]].
 *
 * @see PaJunction
 */
class PaJunctionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PaJunction[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PaJunction|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
