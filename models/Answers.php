<?php


namespace app\models;

use Yii;


class Answers extends yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'answers';
    }

    public function rules()
    {
        return [
            [['text', 'question_id'], 'required'],
            [['text'], 'string'],
            [['question_id'], 'integer'],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tests::className(), 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'question_id' => 'question ID',
        ];
    }

    public function getAnswers()
    {
        return $this->hasMany(Answers::className(), ['question_id' => 'id']);
    }
}