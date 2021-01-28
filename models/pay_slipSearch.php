<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\pay_slip;

/**
 * app\models\pay_slipSearch represents the model behind the search form about `app\models\pay_slip`.
 */
 class pay_slipSearch extends pay_slip
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'emp_id', 'basic', 'ot_hours', 'ot_rate', 'ot_payment', 'total_payment', 'deduction_advance', 'deduction_other', 'net_pay'], 'integer'],
            [['pay_mongth'], 'safe'],
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
        $query = pay_slip::find();

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
            'emp_id' => $this->emp_id,
            'basic' => $this->basic,
            'ot_hours' => $this->ot_hours,
            'ot_rate' => $this->ot_rate,
            'ot_payment' => $this->ot_payment,
            'total_payment' => $this->total_payment,
            'deduction_advance' => $this->deduction_advance,
            'deduction_other' => $this->deduction_other,
            'net_pay' => $this->net_pay,
        ]);

        $query->andFilterWhere(['like', 'pay_mongth', $this->pay_mongth]);

        return $dataProvider;
    }
}
