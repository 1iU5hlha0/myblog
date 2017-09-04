<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 *
 * @property Article[] $articles
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent_id'], 'required'],
            [['id', 'parent_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '分类名称',
            'parent_id' => '父类 ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['category_id' => 'id']);
    }

    public static function getAllCategory(){
        $category=['0'=>'暂无分类'];
        $res=self::find()->asArray()->all();
        //var_dump($res);exit;
        foreach($res as $key=>$val){
            $category[$val['id']]=$val['name'];
        }
        return $category;
    }


    /**
     * 获取所有的分类
     */
    public function getCategories()
    {
        $data = self::find()->all();
        $data = ArrayHelper::toArray($data);
        return $data;
    }

    /**
     *遍历出各个子类 获得树状结构的数组
     */
    public static function getTree($data,$pid = 0,$lev = 1)
    {
        $tree = [];
        foreach($data as $value){
            if($value['parent_id'] == $pid){
                $value['name'] = str_repeat('|---',$lev).$value['name'];
                $tree[] = $value;
                $tree = array_merge($tree,self::getTree($data,$value['id'],$lev+1));
            }
        }
        return $tree;
    }
    /**
     * 得到相应  id  对应的  分类名  数组
     */
    public function getOptions()
    {
        $data = $this->getCategories();
        $tree = $this->getTree($data);
        $list = ['添加顶级分类'];
        foreach($tree as $value){
            $list[$value['id']] = $value['name'];
        }
        return $list;
    }

}
