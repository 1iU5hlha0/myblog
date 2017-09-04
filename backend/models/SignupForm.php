<?php
namespace backend\models;

use yii\base\Model;
use common\models\Admin;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $nickname;
   // public $email;
    public $password;
    public $password_repeat;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Admin', 'message' => '用户名必须输入.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['nickname', 'required'],
            ['nickname', 'string', 'min' => 2, 'max' => 255],

/*            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],*/

            ['password', 'required'],
            ['password', 'unique', 'targetClass' => '\common\models\Admin', 'message' => '密码必须输入'],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码不一致'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'nickname' => '昵称',
            'password' => '密码',
            'password_repeat' => '重复密码',

        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        // if (!$this->validate()) {
          //  return null;
       // }

        $user = new Admin();
        $user->username = $this->username;
        $user->nickname = $this->nickname;
       // $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->password = $this->password;
        //$user->save();var_dump($user);exit(0);
        return $user->save() ? $user : null;
    }
}
