<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Timelog;

/**
 * app\models\TimelogSearch represents the model behind the search form about `app\models\Timelog`.
 */
 class TimelogSearch extends Timelog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'timespent', 'cost', 'aid'], 'integer'],
            [['task'], 'safe'],
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
        $query = Timelog::find();

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
            'pid' => $this->pid,
            'timespent' => $this->timespent,
            'cost' => $this->cost,
            'aid' => $this->aid,
        ]);

        $query->andFilterWhere(['like', 'task', $this->task]);

        return $dataProvider;
    }
}
