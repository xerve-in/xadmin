<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CategoryPathMaps]].
 *
 * @see CategoryPathMaps
 */
class CategoryPathMapsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CategoryPathMaps[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CategoryPathMaps|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
