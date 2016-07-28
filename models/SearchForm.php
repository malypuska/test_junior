<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Ingredient;

/**
 * Login form
 */
class SearchForm extends Model
{
    public $search;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['search'], 'required','message'=>'Выбирите ингридиенты для поиска!'],
            ['search', function($attribute, $params){
                if (count($this->$attribute) < 3 ) $this->addError($attribute,'Выберите больше ингредиентов');
                }
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username'   => 'Ингридиенты',
        ];
    }
    
    public function getIngredient() {
        return Ingredient::findAll(['visible'=>Ingredient::VISIBLE_YES]);
    }
}
