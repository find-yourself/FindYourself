<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%professions}}`.
 */
class m190521_181236_create_professions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%professions}}', [
            'id' => $this->primaryKey(),
          'name' => $this->string(50)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%professions}}');
    }
}
