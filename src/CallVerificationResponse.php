<?php

declare(strict_types=1);

namespace Wearesho\Streamtele;

use yii\db;

class CallVerificationResponse extends db\ActiveRecord
{
    public static function tableName(): string
    {
        return 'call_verification_response';
    }

    public function rules(): array
    {
        return [
            ['data', 'required'],
        ];
    }

    public function formName(): string
    {
        return '';
    }

}