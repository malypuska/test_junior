<?php

namespace app\modules\recipe\controllers;

use yii\web\Controller;

/**
 * Default controller for the `recipe` module
 */
class DefaultController extends Controller
{
    public $layout = 'main';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
