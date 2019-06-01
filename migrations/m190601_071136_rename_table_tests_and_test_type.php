<?php

use yii\db\Migration;

/**
 * Class m190601_071136_rename_table_tests_and_test_type
 */
class m190601_071136_rename_table_tests_and_test_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->renameTable('tests', 'quiz');
      $this->renameTable('test_type', 'quiz_type');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->renameTable('quiz_type', 'test_type');
      $this->renameTable('quiz', 'tests');


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190601_071136_rename_table_tests_and_test_type cannot be reverted.\n";

        return false;
    }
    */
}
