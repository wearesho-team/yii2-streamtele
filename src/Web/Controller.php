<?php

declare(strict_types=1);

namespace Wearesho\Streamtele\Web;

use yii\web;
use Wearesho\Yii\Http;

class Controller extends web\Controller
{
    public function actions(): array
    {
        return [
            'callback' => [
                'class' => Http\Rest\PostForm::class,
                'modelClass' => \Wearesho\Streamtele\CallVerificationResponse::class,
            ],

        ];
    }
}