<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProyectoResponsableTecnico;

/**
 * ProyectoResponsableTecnicoSearch represents the model behind the search form about `app\models\ProyectoResponsableTecnico`.
 */
class ProyectoResponsableTecnicoSearch extends ProyectoResponsableTecnico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_proyecto'], 'integer'],
            [['nombre', 'cedula', 'email', 'telefono', 'unidad_tecnica'], 'safe'],
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
        $query = ProyectoResponsableTecnico::find();

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
            'id_proyecto' => $this->id_proyecto,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'cedula', $this->cedula])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'unidad_tecnica', $this->unidad_tecnica]);

        return $dataProvider;
    }
}
