<?php

declare(strict_types=1);

namespace Wearesho\Streamtele;

use Horat1us\Yii\CarbonBehavior;
use yii\db;

class CallVerificationResponse extends db\ActiveRecord
{
    public static function tableName(): string
    {
        return 'call_verification_response';
    }

    public function behaviors()
    {
        return [
            'ts' => [
                'class' => CarbonBehavior::class,
                'createdAtAttribute' => 'at',
                'updatedAtAttribute' => null,
            ]
        ];
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
