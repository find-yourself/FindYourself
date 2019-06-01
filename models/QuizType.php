<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quiz_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property Quiz[] $quiz
 */
class QuizType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuiz()
    {
        return $this->hasMany(Quiz::className(), ['type_id' => 'id']);
    }


public function extraFields()
{
  return ['quiz'];
}
}
