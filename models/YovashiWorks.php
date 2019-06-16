<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yovashi_works".
 *
 * @property int $profession_id
 * @property string $field
 *
 * @property Professions $profession
 */
class YovashiWorks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yovashi_works';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profession_id'], 'required'],
            [['profession_id'], 'integer'],
            [['field'], 'string', 'max' => 45],
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
            'field' => 'Field',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfession()
    {
        return $this->hasOne(Professions::className(), ['id' => 'profession_id']);
    }
}
