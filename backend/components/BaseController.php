<?php
namespace backend\components;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class BaseController extends Controller
{
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update','delete'],
                'rules' => [
                    // 允许认证用户
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // 默认禁止其他用户
                ]
            ],
            'verbs' => [
                'class' => VerbFilter:: className(),
                'actions' => [
             //           'index'  => [ 'get'],          //只允许get方式访问</span>
           // 'create' => [ 'post'],         //只允许用post方式访问</span>
           // 'update' => [ 'post']
             ],
        ],
    ];
}
}