<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use app\models\Ingredient;

/**
 * This is the model class for table "recipe_ingredient".
 *
 * @property integer $id
 * @property integer $recipe_id
 * @property integer $ingredient_id
 */
class RecipeIngredient extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'recipe_ingredient';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['recipe_id', 'ingredient_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'recipe_id' => 'Recipe ID',
            'ingredient_id' => 'Ingredient ID',
        ];
    }

    public function getNotRecipt() {
        
        return ArrayHelper::getColumn(RecipeIngredient::find()
               ->leftJoin('ingredient', 'ingredient.id = ingredient_id')
               ->where('ingredient.visible = :visible', [':visible' => Ingredient::VISIBLE_NOT])
               ->select('recipe_id')
               ->distinct()
               ->all(),'recipe_id');
    }
    
    public function search($params = null) {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if ($params) {            
            $query->where(['in', 'ingredient_id', $params]);
        }
        if ($this->notRecipt) {
            $query->andWhere(['not in', 'recipe_id', $this->notRecipt]);
        }
        $query->select('recipe_id, COUNT(ingredient_id) AS cnt');        
        $query->groupBy('recipe_id');
        $query->orderBy('cnt DESC');
        $query->having('cnt > 2');

        return $dataProvider;
    }    
}
