<?php

declare(strict_types=1);

namespace Wearesho\Streamtele;

use Horat1us\Yii\CarbonBehavior;
use Horat1us\Yii\ConstRange;
use yii\db;

class CallVerificationResponse extends db\ActiveRecord
{
    public const STATE_NEW = 'new';
    public const STATE_IN_PROCESSING = 'in_processing';
    public const STATE_REJECTED = 'rejected';
    public const STATE_NO_PICKUP = 'no_pickup';
    public const STATE_DONE = 'done';
    public const STATE_ERROR = 'error';
    public const STATE_CONGESTION = 'congestion';

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
            [['task_id', 'state', 'ivr_answer'], 'required'],
            ['state', ConstRange\Validator::class],
        ];
    }

    public function formName(): string
    {
        return '';
    }

}
