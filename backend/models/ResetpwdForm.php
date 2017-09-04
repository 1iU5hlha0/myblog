<?php
namespace backend\models;

use yii\base\Model;
use common\models\Admin;

/**
 * Signup form
 */
class ResetpwdForm extends Model
{
    public $password;
    public $password_repeat;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             ['password', 'required'],
            ['password', 'unique', 'targetClass' => '\common\models\Admin', 'message' => '密码必须输入'],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码不一致'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'password' => '密码',
            'password_repeat' => '重复密码',

        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function resetPassword($id)
    {
/*        if (!$this->validate()) {
            return null;
        }*/

        $admin =Admin::findOne($id);

        $admin->setPassword($this->password);
        $admin->removePasswordResetToken();
        //$user->save();var_dump($user);exit(0);
        return $admin->save() ? true : false;
    }
}
