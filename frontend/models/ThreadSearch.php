<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Thread;

/**
 * ThreadSearch represents the model behind the search form about `app\models\Thread`.
 */
class ThreadSearch extends Thread
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thread_id', 'thread_starter', 'replies', 'views', 'locked'], 'integer'],
            [['title', 'created_at', 'updated_at', 'picture', 'content', 'description', 'release_date', 'genre', 'producers', 'developers', 'composers', 'designers'], 'safe'],
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
        $query = Thread::find();

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
            'thread_id' => $this->thread_id,
            'thread_starter' => $this->thread_starter,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'replies' => $this->replies,
            'views' => $this->views,
            'locked' => $this->locked,
            'release_date' => $this->release_date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'genre', $this->genre])
            ->andFilterWhere(['like', 'producers', $this->producers])
            ->andFilterWhere(['like', 'developers', $this->developers])
            ->andFilterWhere(['like', 'composers', $this->composers])
            ->andFilterWhere(['like', 'designers', $this->designers])

            ;

        return $dataProvider;
    }
}
