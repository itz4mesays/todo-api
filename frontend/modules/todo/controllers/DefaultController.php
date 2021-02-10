<?php

namespace frontend\modules\todo\controllers;

use Yii;

use yii\web\Controller;
use yii\web\Response;

/**
 * TODO Module to handle CRUD api request
 */
class DefaultController extends Controller
{
    public $enableCsrfValidation  = false;

    public $todo_array = [
        [
            "id" => 1,
            'title' => 'Meeting',
            'status' => false
        ],

        [
            "id" => 2,
            'title' => 'Code Review',
            'status' => true
        ],
    ];

	public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Yii::$app->response->format = Response::FORMAT_JSON; //Whatever output that comes out from this controller has to be in JSON
            return true;
        }
        return false;
       
    }

    
    /**
     * Create a todo
     */
    public function actionCreate()
    {

        $params = Yii::$app->request->post(); //to receive all input including that of json

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
            $dataa = [
                "id" => 3,
                'title' => 'Meeting',
                'status' => false
            ];

            array_push($this->todo_array, $dataa);

            $data = Yii::$app->apiConfig->returnedData(200, false, $this->todo_array);

        }else{
            $message = 'Only POST Method is allowed';
            $data = Yii::$app->apiConfig->returnedData(401, true, $message); 
        }

        return $data;
    }

    public function actionRead()
    {
         $params = Yii::$app->request->post(); //to receive all input including that of json

        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $data = Yii::$app->apiConfig->returnedData(200, false, $this->todo_array);
        }else{
            $message = 'Only GET Method is allowed';
            $data = Yii::$app->apiConfig->returnedData(401, true, $message); 
        }

        return $data;
    }

    public function actionUpdate()
    {

    }

    public function actionDelete()
    {

    }
}
