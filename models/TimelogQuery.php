<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Timelog]].
 *
 * @see Timelog
 */
class TimelogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Timelog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Timelog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
