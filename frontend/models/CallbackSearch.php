<?php

namespace frontend\models;

use common\models\Callback;
use common\models\Section;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class CallbackSearch extends Callback
{
    public $searchType;
    public $searchActivities;
    public $searchElements;
    public $searchSection;
    public function rules()
    {
        return [
            [['searchType', 'searchSection', 'searchActivities', 'searchElements'], 'safe'],
        ];
    }

    public static function getAllActivities()
    {
        $result = [];
        $callbacks = Callback::find()->all();

        foreach ($callbacks as $callback) {
            foreach ($callback->activities as $activity) {
                $result[] = $activity;
            }
        }

        return ArrayHelper::map($result, 'id', 'title');
    }

    public static function getAllElements()
    {
        $result = [];
        $callbacks = Callback::find()->all();
        foreach ($callbacks as $callback) {
            foreach ($callback->elements as $element) {
                $section = Section::findOne($element->section_id);
                if ($section->parent_id) {
                    $parent = Section::findOne($section->parent_id);
                    $result[] = $parent;
                } else {
                    $result[] = $section;
                }
            }
        }
        return ArrayHelper::map($result, 'id', 'name');
    }

    public function search($params)
    {
        $query = Callback::find()->joinWith(['elements', 'activities']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        if ($this->searchType !== null) {
            $query->andFilterWhere(['callback.type' => $this->searchType]);
        }

        if ($this->searchActivities !== null) {
            $query->andFilterWhere(['in', 'activity.id', $this->searchActivities]);
        }

        if ($this->searchSection !== null) {
            $query->andFilterWhere(['in', 'element.section_id', $this->searchSection]);
        }

        return $dataProvider;
    }
}