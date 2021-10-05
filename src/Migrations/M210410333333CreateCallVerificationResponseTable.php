<?php

namespace Wearesho\BankId\Yii\Migrations;

use yii\db\Migration;

class M210410333333CreateCallVerificationResponseTable extends Migration
{
    private const TABLE_NAME = 'call_verification_response';

    public function safeUp(): void
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                'id' => $this->primaryKey(),
                'data' => $this->json()->notNull(),
            ]
        );
    }

    public function safeDown(): void
    {
        $this->dropTable(self::TABLE_NAME);
    }
}