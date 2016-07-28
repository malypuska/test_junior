<?php

namespace app\modules\recipe\controllers;

use Yii;
use yii\web\Controller;
use app\models\Ingredient;

/**
 * Default controller for the `recipe` module
 */
class IngredientController extends Controller
{
    public $layout = 'main';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        
        $model = new Ingredient();
        return $this->render('index', ['model' => $model]);
    }

    public function actionCreate() {
        
        $model = new Ingredient();

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
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
        if (($model = Ingredient::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    } 
}
