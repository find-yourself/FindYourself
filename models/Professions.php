<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "professions".
 *
 * @property int $id
 * @property string $name
 *
 * @property CategoriesBySubject[] $categoriesBySubjects
 * @property Courses[] $courses
 * @property SolominWorks[] $solominWorks
 * @property YovashiWorks[] $yovashiWorks
 */
class Professions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'professions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
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
    public function getCategoriesBySubjects()
    {
        return $this->hasMany(CategoriesBySubject::className(), ['profession_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Courses::className(), ['profession_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolominWorks()
    {
        return $this->hasMany(SolominWorks::className(), ['profession_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYovashiWorks()
    {
        return $this->hasMany(YovashiWorks::className(), ['profession_id' => 'id']);
    }
}
