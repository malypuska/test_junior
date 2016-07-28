<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
/**
 * This is the model class for table "ingredient".
 *
 * @property integer $id
 * @property string $name
 * @property integer $visible
 */
class Ingredient extends \yii\db\ActiveRecord {
    
    const VISIBLE_NOT = 0;
    const VISIBLE_YES = 1;


    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ingredient';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['visible'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'visible' => 'Видемый',
        ];
    }

    /**
     * @inheritdoc
     * @return IngredientQuery the active query used by this AR class.
     */

    public function search($params = null) {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query->orderBy('name');
        
        return $dataProvider;
    }
    
    public function search_not($params = null) {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query->orderBy('name');

        if ($params) $query->where(['not in','id',$params]);
        
        return $dataProvider;
    }
    

}
