<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property int $id
 * @property string $name
 * @property int $type_course_id
 * @property int $profession_id
 *
 * @property CategoriesBySubject[] $categoriesBySubjects
 * @property CourseType $typeCourse
 * @property Professions $profession
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type_course_id', 'profession_id'], 'required'],
            [['type_course_id', 'profession_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['type_course_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseType::className(), 'targetAttribute' => ['type_course_id' => 'id']],
            [['profession_id'], 'exist', 'skipOnError' => true, 'targetClass' => Professions::className(), 'targetAttribute' => ['profession_id' => 'id']],
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
            'type_course_id' => 'Type Course ID',
            'profession_id' => 'Profession ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesBySubjects()
    {
        return $this->hasMany(CategoriesBySubject::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeCourse()
    {
        return $this->hasOne(CourseType::className(), ['id' => 'type_course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfession()
    {
        return $this->hasOne(Professions::className(), ['id' => 'profession_id']);
    }
}
