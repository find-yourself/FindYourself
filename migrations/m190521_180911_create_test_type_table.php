<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_type}}`.
 */
class m190521_180911_create_test_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test_type}}', [
            'id' => $this->primaryKey(),
          'name' => $this->string(45)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test_type}}');
    }
}
