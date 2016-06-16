<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MasterCategories]].
 *
 * @see MasterCategories
 */
class MasterCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MasterCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MasterCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
