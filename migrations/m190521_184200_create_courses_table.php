<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%courses}}`.
 */
class m190521_184200_create_courses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%courses}}', [
            'id' => $this->primaryKey(),
          'name' => $this->string(45)->notNull(),
          'type_course_id' => $this->integer()->notNull(),
          'profession_id' => $this->integer()->notNull()
        ]);

      $this->addForeignKey('course_type-courses', 'courses', 'type_course_id', 'course_type', 'id');
      $this->addForeignKey('professions-courses', 'courses', 'profession_id', 'professions', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropForeignKey('professions-courses', 'courses');
      $this->dropForeignKey('course_type-courses', 'courses');
        $this->dropTable('{{%courses}}');
    }
}
