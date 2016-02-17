<?php

namespace frontend\controllers;

use Yii;
use app\models\Package;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//For RBAC
use common\models\User;
use yii\filters\AccessControl;

/**
 * PackageController implements the CRUD actions for Package model.
 */
class PackageController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'update', 'create', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update', 'create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action){
                            return User::userIsAdmin();
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Package models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Package::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Package model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Package model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Package();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Package model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Package model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Package model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Package the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Package::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    //PACKAGE FUNCTIONS/////////////////////////////////////////////////////////
    public function actionViewPackage($id)
    {
        $model = Package::findOne($id);
        if($model)
        {
            return $this->render('view_package', ['model' => $model]);
        }
        else {
            throw new NotFoundHttpException();
        }
    }
    
    public function actionViewAllPackages()
    {
        return $this->render('view_all_packages');
    }
    
    //SHOPPING FUNCTIONS////////////////////////////////////////////////////////
    public function actionAddToCart($id, $adultCount, $childCount)
    {
        $model = Package::findOne($id);
        if($model)
        {
            Yii::$app->cart->put($model, $adultCount + $childCount);
            return $this->redirect(['cart-view']);
        }
        else
            throw new NotFoundHttpException();
    }
    
    public function actionRemoveFromCart($id)
    {
        $model = Package::findOne($id);
        if($model)
        {
            Yii::$app->cart->remove($model);
            return $this->redirect(['cart-view']);
        }
        else
            throw new NotFoundHttpException();
    }
    
    public function actionCartView()
    {
        return $this->render('cart-view');
        //redirect to a view file. we were just testing here.
        //a position holds a single TYPE of item. It holds a quantity if multiple are added.
        $cart = Yii::$app->cart;
        $items = $cart->getPositions();
        echo $cart->getCost();
        foreach($items as $item)
        {
            echo $cart->getCount();
            echo $item->getId() . "<br/>";
        }
    }
}
