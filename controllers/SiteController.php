<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\RecipeIngredient;
use app\models\SearchForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionSearch()
    {
        $SearchForm = new SearchForm();
        $RecipeIngredient = new RecipeIngredient();
        
        if ($SearchForm->load(Yii::$app->request->post())) {
            $SearchForm->validate();
        }
        
        return $this->render('search',['SearchForm'=>$SearchForm,'RecipeIngredient'=>$RecipeIngredient]);
    }
}
