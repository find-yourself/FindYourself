<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course_type}}`.
 */
class m190521_184000_create_course_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course_type}}', [
            'id' => $this->primaryKey(),
          'name' => $this->string(45)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%course_type}}');
    }
}
