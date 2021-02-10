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
     * TODO endpoint to create a todo
     */
    public function actionCreate()
    {

        $params = Yii::$app->request->post(); //to receive all input including that of json

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
            array_push($this->todo_array, $params);

            $data = Yii::$app->apiConfig->returnedData(200, false, $this->todo_array);

        }else{
            $message = 'Only POST Method is allowed';
            $data = Yii::$app->apiConfig->returnedData(401, true, $message); 
        }

        return $data;
    }

    /**
     * TODO endpoint to fetch new todos
     */
    public function actionRead()
    {
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $data = Yii::$app->apiConfig->returnedData(200, false, $this->todo_array);
        }else{
            $message = 'Only GET Method is allowed';
            $data = Yii::$app->apiConfig->returnedData(401, true, $message); 
        }

        return $data;
    }

    /**
     * TODO endpoint to update an existing todo
     */
    public function actionUpdate()
    {
        $params = Yii::$app->request; //to receive all input including that of json

        if($_SERVER['REQUEST_METHOD'] == "PUT"){
           foreach($this->todo_array as $key => $value){
                if($value['id'] == $params->getBodyParam('id')){
                    $this->todo_array[$key]['title'] = $params->getBodyParam('title');
                    $this->todo_array[$key]['status'] = $params->getBodyParam('status');
                }
            }

            $data = Yii::$app->apiConfig->returnedData(200, false, $this->todo_array);
        }else{
            $message = 'Only PUT Method is allowed';
            $data = Yii::$app->apiConfig->returnedData(401, true, $message); 
        }

        return $data;
    }

    /**
     * TODO endpoint to delete todo
     */
    public function actionDelete()
    {
        $params = Yii::$app->request->post(); //to receive all input including that of json
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            foreach($this->todo_array as $key => $value){
                if($value['id'] == $params['id']){
                    unset($this->todo_array[$key]);
                }
            }

            $data = Yii::$app->apiConfig->returnedData(200, false, $this->todo_array);
        }else{
            $message = 'Only POST Method is allowed';
            $data = Yii::$app->apiConfig->returnedData(401, true, $message); 
        }

        return $data;
    }
}
