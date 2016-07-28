<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

/**
 * This is the model class for table "recipe".
 *
 * @property integer $id
 * @property string $name
 */
class Recipe extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'recipe';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
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
        ];
    }

    public function search($params = null) {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query->orderBy('name');

        return $dataProvider;
    }

    public function getIngredient()
    {
        return $this->hasMany(Ingredient::className(), ['id' => 'ingredient_id'])
            ->viaTable('recipe_ingredient', ['recipe_id' => 'id'])
            ->orderBy('ingredient.name');
    }    
    
    public function getRecipeIngredient() {
        
        return $dataProvider = new ArrayDataProvider([
            'allModels' => $this->ingredient,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
    }
}
