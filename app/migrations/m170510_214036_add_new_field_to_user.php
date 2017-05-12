<?php

use yii\db\Migration;
use yii\db\Schema;
class m170510_214036_add_new_field_to_user extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m170510_214036_add_new_field_to_user cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->addColumn('{{%user}}', 'company_id', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'company_id');
    }
}
