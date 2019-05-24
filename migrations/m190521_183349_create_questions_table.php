<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%questions}}`.
 */
class m190521_183349_create_questions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%questions}}', [
            'id' => $this->primaryKey(),
          'text' => $this->text()->notNull(),
          'test_id' => $this->integer()->notNull()
        ]);

      $this->addForeignKey('tests-questions', 'questions', 'test_id', 'tests', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropForeignKey('tests-questions', 'questions');
        $this->dropTable('{{%questions}}');
    }
}
