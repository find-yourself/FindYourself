<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tests}}`.
 */
class m190521_181413_create_tests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tests}}', [
            'id' => $this->primaryKey(),
          'name' => $this->string(50)->notNull(),
          'type_id' => $this->integer()->notNull()
        ]);

      $this->addForeignKey('test_type-tests', 'tests', 'type_id', 'test_type', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropForeignKey('test_type-tests', 'tests');
        $this->dropTable('{{%tests}}');
    }
}
