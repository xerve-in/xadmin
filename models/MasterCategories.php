<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_categories".
 *
 * @property integer $id
 * @property string $category_name
 * @property integer $parent_id
 * @property integer $cat_type
 * @property integer $deleted_flag
 * @property string $tags
 *
 * @property CategoryPathMaps[] $categoryPathMaps
 * @property CategoryPathMaps[] $categoryPathMaps0
 * @property CategoryPathMaps[] $categoryPathMaps1
 */
class MasterCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'parent_id', 'cat_type', 'deleted_flag'], 'integer'],
            [['tags'], 'string'],
            [['category_name'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'parent_id' => 'Parent ID',
            'cat_type' => 'Cat Type',
            'deleted_flag' => 'Deleted Flag',
            'tags' => 'Tags',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryPathMaps()
    {
        return $this->hasMany(CategoryPathMaps::className(), ['x_cat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryPathMaps0()
    {
        return $this->hasMany(CategoryPathMaps::className(), ['x_subcat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryPathMaps1()
    {
        return $this->hasMany(CategoryPathMaps::className(), ['x_type_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return MasterCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MasterCategoriesQuery(get_called_class());
    }
}
