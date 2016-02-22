<?php

namespace frontend\controllers;

use Yii;
use app\models\Log;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//For RBAC
use common\models\User;
use yii\filters\AccessControl;

use app\models\Guest;
use app\models\Attraction;
use app\models\Ticket;

/**
 * LogController implements the CRUD actions for Log model.
 */
class LogController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'update', 'create', 'delete', 'check-in-out'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update', 'create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action){
                            return User::userIsAdmin();
                        }
                    ],
                    [
                        'actions' => ['check-in-out'],
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
     * Lists all Log models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Log::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Log model.
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
     * Creates a new Log model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Log();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Log model.
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
     * Deletes an existing Log model.
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
     * Finds the Log model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Log the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Log::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionCheckInOut()
    {
        $error = "";
        $model = new Log();
        if ($model->load(Yii::$app->request->post())) 
        {
            $ticket = Ticket::findOne($model->ticket);
            if($ticket)
            {
                if($ticket->isRedeemed())
                {
                    //Get the guest for this ticket.
                    $guest = Guest::find()->where(['ticket' => $model->ticket])->one();
                    $model->guest = $guest->id;
                    $date = new \DateTime();
                    $model->timestamp = $date->getTimestamp();

                    //Modify attraction queue.
                    $attraction = Attraction::find()->where(['name' => $model->location])->one();
                    if($model->action == "checked in")
                    {
                        $attraction->incrementQueue();
                    }
                    else
                    {
                        $attraction->decrementQueue();
                    }
 
                    if($model->save())
                    {
                        //Refresh our create page.
                        $newModel = new Log();
                        $newModel->action = $model->action;
                        $newModel->location = $model->location;
                        return $this->render('create', ['model' => $newModel, 'error' => "success"]);
                        //return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
                else
                {
                    $error = "Ticket is not valid.";
                }
            }
            else
            {
                $error = "No Ticket exists with the given ID.";
            }
        }
        return $this->render('create', ['model' => $model, 'error' => $error]);
    }
}
