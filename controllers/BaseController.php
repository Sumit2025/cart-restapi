<?php

namespace app\controllers;

use Yii;

class BaseController extends \yii\rest\Controller
{
    	public function baseUrl()
        {
            return \yii\helpers\Url::base(true);
        }
    	
        /**
         * Api Validate error response
         */
        public function apiValidate($errors, $message = false)
        {
            Yii::$app->response->statusCode = 422;
            return [
                'statusCode' => 422,
                'name' => 'ValidateErrorException',
                'message' => $message ? $message : 'Error validation',
                'errors' => $errors
            ];
        }

        /**
         * Api Created response
         */
        public function apiCreated($data, $message = false)
        {
            Yii::$app->response->statusCode = 201;
            return [
                'statusCode' => 201,
                'message' => $message ? $message : 'Created successfully',
                'data' => $data
            ];
        }

        /**
         * Api Updated response
         */
        public function apiUpdated($data, $message = false)
        {
            Yii::$app->response->statusCode = 202;
            return [
                'statusCode' => 202,
                'message' => $message ? $message : 'Updated successfully',
                'data' => $data
            ];
        }

        /**
         * Api Deleted response
         */
        public function apiDeleted($data, $message = false)
        {
            Yii::$app->response->statusCode = 202;
            return [
                'statusCode' => 202,
                'message' => $message ? $message : 'Deleted successfully',
                'data' => $data
            ];
        }

        /**
         * Api Item response
         */
        public function apiItem($data, $message = false)
        {
            Yii::$app->response->statusCode = 200;
            return [
                'statusCode' => 200,
                'message' => $message ? $message : 'Data retrieval successful',
                'data' => $data
            ];
        }

        /**
         * Api Collection response
         */
        public function apiCollection($data, $total = 0, $message = false)
        {
            Yii::$app->response->statusCode = 200;
            return [
                'statusCode' => 200,
                'message' => $message ? $message : 'Data retrieval successful',
                'data' => $data,
                'total' => $total
            ];
        }

        /**
         * Api Success response
         */
        public function apiSuccess($message = false)
        {
            Yii::$app->response->statusCode = 200;
            return [
                'statusCode' => 200,
                'message' => $message ? $message : 'Success',
            ];
        }
    	
    	/**
         * Api Success response
         */
        public function apiFalse($message = false)
        {
            Yii::$app->response->statusCode = 402;
            return [
                'statusCode' => 402,
                'message' => $message ? $message : 'Wrong Credentials',
            ];
        }

}
