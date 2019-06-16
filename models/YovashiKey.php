<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yovashi_key".
 *
 * @property int $question_id
 * @property int $answer_id
 * @property string $field
 *
 * @property Questions $question
 */
class YovashiKey extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yovashi_key';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_id', 'answer_id', 'field'], 'required'],
            [['question_id', 'answer_id'], 'integer'],
            [['field'], 'string', 'max' => 45],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Questions::className(), 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'question_id' => 'Question ID',
            'answer_id' => 'Answer ID',
            'field' => 'Field',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Questions::className(), ['id' => 'question_id']);
    }
}
