<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // 添加 "createPost" 权限
        $createPost = $auth->createPermission('createPost');
        $createPost->description = '新增文章';
        $auth->add($createPost);

        // 添加 "updatePost" 权限
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = '修改文章';
        $auth->add($updatePost);

        // 添加 "deletePost" 权限
        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description = '删除文章';
        $auth->add($deletePost);

        // 添加 "author" 角色并赋予 "createPost" 权限
       // $author = $auth->createRole('author');
       // $auth->add($author);
       // $auth->addChild($author, $createPost);

        // 添加 "admin" 角色并赋予 "updatePost" 
        // 和 "author" 权限
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createPost);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $deletePost);
       // $auth->addChild($admin, $author);

        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id （译者注：user表的id）
        // 通常在你的 User 模型中实现这个函数。
       // $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
}