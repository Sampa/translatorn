<?php

use yii\db\Migration;
use yii\db\Schema;

class m170511_100714_add_new_field_to_user extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m170511_100714_add_new_field_to_user cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->addColumn('{{%user}}', 'is_boss', Schema::TYPE_BOOLEAN);
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'is_boss');
    }
}
