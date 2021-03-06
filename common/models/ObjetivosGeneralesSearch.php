<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ObjetivosGenerales;

/**
 * ObjetivosGeneralesSearch represents the model behind the search form about `common\models\ObjetivosGenerales`.
 */
class ObjetivosGeneralesSearch extends ObjetivosGenerales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'objetivo_estrategico'], 'integer'],
            [['objetivo_general'], 'safe'],
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
        $query = ObjetivosGenerales::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'objetivo_estrategico' => $this->objetivo_estrategico,
        ]);

        $query->andFilterWhere(['like', 'objetivo_general', $this->objetivo_general]);

        return $dataProvider;
    }
}
