<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SolominWorks]].
 *
 * @see SolominWorks
 */
class SolominWorksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SolominWorks[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SolominWorks|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
