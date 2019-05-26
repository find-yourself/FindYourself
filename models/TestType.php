<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property Tests[] $tests
 */
class TestType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_type';
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
    public function getTests()
    {
        return $this->hasMany(Tests::className(), ['type_id' => 'id']);
    }


public function extraFields()
{
  return ['tests'];
}
}
