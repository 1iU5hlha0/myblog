<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $keyword
 * @property string $content
 * @property string $writer
 * @property integer $addtime
 *
 * @property Category $category
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title'], 'required'],
            [['id', 'category_id', 'addtime','uptime'], 'integer'],
            [['title', 'writer'], 'string', 'max' => 50],
            [['keyword'], 'string', 'max' => 200],
            [['content'], 'string'],
            [['label_img'], 'string'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => '所属分类',
            'title' => '标题',
            'keyword' => '关键字',
            'content' => '内容',
            'label_img' => '封面图片',
            'writer' => '作者',
            'addtime' => '添加时间',
            'uptime' => '修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if($insert){
                $this->addtime=time();
                $this->uptime=time();
            }else{
                $this->uptime=time();
            }
            return true;
        }else{
            return false;
        }
    }
    public function getUrl(){
        return Yii::$app->urlManager->createUrl(
            [
                'article/view',
                'id'=>$this->id,
                'title'=>$this->title,
            ]
        );
    }
    public function getBeginning($length=288){
        $str=strip_tags($this->content);
        $len=mb_strlen($str);
        $str=mb_substr($str,0,$length,'utf-8');
        return $str.($str>$length?'':'...');
    }
    /*
     * 获取上一篇
     */
    public function getPrev(){
        return self::find()->where(['and','id<'.$this->id])->orderBy(['id'=>SORT_DESC])->one();
        //return self::find()->where(['and','channelid='.$this->channelid,'id<'.$this->id,'status=1'])->one();
    }

    /*
     * 下一篇
     */
    public function getNext(){
        return self::find()->where(['and','id>'.$this->id])->one();
        //return self::find()->where(['and','channelid='.$this->channelid,'id>'.$this->id,'status=1'])->one();
    }

}
