<?php

namespace app\modules\recipe\controllers;

use yii\web\Controller;
use app\models\Recipe;
use app\models\Ingredient;
use app\models\RecipeIngredient;

use Yii;
use yii\base\Request;

/**
 * Default controller for the `recipe` module
 */
class RecipeController extends Controller
{
    public $layout = 'main';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        
        $model = new Recipe();
        return $this->render('index', ['model' => $model]);
    }

    public function actionCreate() {
        
        $model = new Recipe();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        $model = $this->findModel(Yii::$app->request->get('id'));
        $ingredient = new Ingredient();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'ingredient' => $ingredient,
        ]);
    }    
    
    public function actionView()
    {
        return $this->render('view', [
            'model' => $this->findModel(Yii::$app->request->get('id')),
        ]);
    }   
    
    public function actionDelete()
    {
         $this->findModel(Yii::$app->request->get('id'))->delete();
         return $this->redirect(['index']);
    }    
    
    protected function findModel($id)
    {
        if (($model = Recipe::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    } 
    
    public function actionAddIngredient() {
        
        if (Yii::$app->request->isAjax) {
        
            $RecipeIngredient = new RecipeIngredient;
            $RecipeIngredient->recipe_id = Yii::$app->request->post('rid');
            $RecipeIngredient->ingredient_id = Yii::$app->request->post('id');
            $RecipeIngredient->save();        
        }
        $this->redirect('/recipe/recipe/update?id='.Yii::$app->request->post('rid'));
    }    
    
    public function actionDeleteIngredient() {
        
        $RecipeIngredient = RecipeIngredient::findOne(['recipe_id' => Yii::$app->request->post('rid'),'ingredient_id' => Yii::$app->request->post('id')]);
        $RecipeIngredient->delete(); 
        $this->redirect('/recipe/recipe/update?id='.Yii::$app->request->post('rid'));
    }    
    
}
