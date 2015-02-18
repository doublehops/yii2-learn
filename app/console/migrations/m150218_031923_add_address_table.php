<?php

use yii\db\Schema;
use yii\db\Migration;

class m150218_031923_add_address_table extends Migration
{
    public function up()
    {
        $this->createTable('address', [
                'id' => 'INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT "Index"',
                'user_id' => 'INT(11) NOT NULL',
                'street_address' => 'VARCHAR(100)',
                'city' => 'VARCHAR(100)',
                'country' => 'VARCHAR(100)',
                'status' => 'SMALLINT(6)',
                'created_at' => 'INT(11)',
                'updated_at' => 'INT(11)',
            ],  'ENGINE=InnoDB CHARSET utf8 COMMENT "Table of markets"'
        );

        $this->addForeignKey('fk_user_address', 'address', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('address');
    }
}
