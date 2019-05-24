<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%answers}}`.
 */
class m190521_183716_create_answers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%answers}}', [
            'id' => $this->primaryKey(),
          'text' => $this->text()->notNull(),
          'question_id' => $this->integer()->notNull()
        ]);

      $this->addForeignKey('questions-answers', 'answers', 'question_id', 'questions', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropForeignKey('questions-answers', 'answers');
        $this->dropTable('{{%answers}}');
    }
}
