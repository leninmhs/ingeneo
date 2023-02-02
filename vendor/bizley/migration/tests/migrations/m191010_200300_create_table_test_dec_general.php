<?php

declare(strict_types=1);

namespace bizley\tests\migrations;

use yii\db\Migration;

class m191010_200300_create_table_test_dec_general extends Migration
{
    public function up(): void
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%test_dec_general}}', [
            'col_dec' => $this->decimal(),
        ], $tableOptions);
    }

    public function down(): void
    {
        $this->dropTable('{{%test_dec_general}}');
    }
}
