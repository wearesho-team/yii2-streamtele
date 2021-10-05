<?php

namespace Wearesho\Streamtele\Migrations;

use yii\db\Migration;

class M210410333333CreateCallVerificationResponseTable extends Migration
{
    private const TABLE_NAME = 'call_verification_response';
    private const STATE_TYPE_NAME = self::TABLE_NAME . '_state_type';

    public function safeUp(): void
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                'id' => $this->primaryKey(),
                "task_id" => $this->text()->notNull(),
                "state" => $this->enum(self::STATE_TYPE_NAME, [
                    'new',
                    'in_processing',
                    'rejected',
                    'no_pickup',
                    'done',
                    'error',
                    'congestion',
                ]),
                "ivr_answer" => $this->integer()->notNull(),
                'at' => $this->dateTime()->notNull(),
            ]
        );
    }

    public function safeDown(): void
    {
        $this->dropTable(self::TABLE_NAME);
        $this->execute("DROP TYPE " . self::STATE_TYPE_NAME);
    }
}
