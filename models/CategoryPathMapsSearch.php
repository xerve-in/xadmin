<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CategoryPathMaps;

/**
 * CategoryPathMapsSearch represents the model behind the search form about `app\models\CategoryPathMaps`.
 */
class CategoryPathMapsSearch extends CategoryPathMaps
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seller', 's_cat_path', 'u_seller', 'x_cat', 'x_subcat', 'x_type', 'updated_dt'], 'safe'],
            [['x_cat_id', 'x_subcat_id', 'x_type_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CategoryPathMaps::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'updated_dt' => $this->updated_dt,
            'x_cat_id' => $this->x_cat_id,
            'x_subcat_id' => $this->x_subcat_id,
            'x_type_id' => $this->x_type_id,
        ]);

        $query->andFilterWhere(['like', 'seller', $this->seller])
            ->andFilterWhere(['like', 's_cat_path', $this->s_cat_path])
            ->andFilterWhere(['like', 'u_seller', $this->u_seller])
            ->andFilterWhere(['like', 'x_cat', $this->x_cat])
            ->andFilterWhere(['like', 'x_subcat', $this->x_subcat])
            ->andFilterWhere(['like', 'x_type', $this->x_type]);

        return $dataProvider;
    }
}
