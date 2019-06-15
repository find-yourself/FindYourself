<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solomin_works".
 *
 * @property int $profession_id
 * @property string $labor_object
 * @property string $work_nature
 *
 * @property Professions $profession
 */
class SolominWorks extends \yii\db\ActiveRecord
{
    const RELATION_PROFESSIONS = 'professions';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solomin_works';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profession_id', 'labor_object', 'work_nature'], 'required'],
            [['profession_id'], 'integer'],
            [['labor_object', 'work_nature'], 'string', 'max' => 45],
            [['profession_id'], 'exist', 'skipOnError' => true, 'targetClass' => Professions::className(), 'targetAttribute' => ['profession_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'profession_id' => 'Profession ID',
            'labor_object' => 'Labor Object',
            'work_nature' => 'Work Nature',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfession()
    {
        return $this->hasOne(Professions::className(), ['id' => 'profession_id']);
    }

    public function getProfessions()
    {
        return $this->hasMany(Professions::class, ['id' => 'profession_id'])
            ->via(self::RELATION_PROFESSIONS);
    }

}
