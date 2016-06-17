<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_path_maps".
 *
 * @property string $seller
 * @property string $s_cat_path
 * @property string $u_seller
 * @property string $x_cat
 * @property string $x_subcat
 * @property string $x_type
 * @property string $updated_dt
 * @property integer $x_cat_id
 * @property integer $x_subcat_id
 * @property integer $x_type_id
 *
 * @property MasterCategories $xCat
 * @property MasterCategories $xSubcat
 * @property MasterCategories $xType
 */
class CategoryPathMaps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_path_maps';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seller', 's_cat_path'], 'required'],
            [['x_cat_id'], 'required'],
            [['updated_dt'], 'safe'],
            //[['x_cat_id', 'x_subcat_id', 'x_type_id'], 'integer'],
            //[['x_cat_id', 'x_subcat_id', 'x_type_id'], 'filter', 'filter'=>'empty2null'],
            [['seller', 'u_seller'], 'string', 'max' => 300],
            [['s_cat_path', 'x_cat', 'x_subcat', 'x_type'], 'string', 'max' => 750],
            [['x_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterCategories::className(), 'targetAttribute' => ['x_cat_id' => 'id']],
            [['x_subcat_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterCategories::className(), 'targetAttribute' => ['x_subcat_id' => 'id']],
            [['x_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterCategories::className(), 'targetAttribute' => ['x_type_id' => 'id']],
        ];
    }

    function empty2null($value) {
        return $value === '' ? null : $value;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'seller' => 'Seller',
            's_cat_path' => 'Seller Category Path',
            //'u_seller' => 'U Seller',
            'x_cat' => 'X Cat',
            'x_subcat' => 'X Subcat',
            'x_type' => 'X Type',
            'updated_dt' => 'Updated Dt',
            'x_cat_id' => 'Xerve Category',
            'x_subcat_id' => 'Xerve Subcategory',
            'x_type_id' => 'Xerve Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getXCat()
    {
        return  $this->hasOne(MasterCategories::className(), ['id' => 'x_cat_id']);
        
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getXSubcat()
    {
        return $this->hasOne(MasterCategories::className(), ['id' => 'x_subcat_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getXType()
    {
        return $this->hasOne(MasterCategories::className(), ['id' => 'x_type_id']);
    }

    /**
     * @inheritdoc
     * @return CategoryPathMapsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryPathMapsQuery(get_called_class());
    }
}
