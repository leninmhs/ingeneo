<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Casos]].
 *
 * @see Casos
 */
class CasosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Casos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Casos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
