<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property Courses[] $courses
 */
class CourseType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_type';
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
    public function getCourse()
    {
        return $this->hasMany(Courses::className(), ['type_course_id' => 'id']);
    }

  public function extraFields()
  {
    return ['course'];
  }
}
