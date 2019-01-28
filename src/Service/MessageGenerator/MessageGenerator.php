<?php

namespace App\Service\MessageGenerator;

class MessageGenerator
{
    public function getMessage()
    {
        $message = ['1', '2', '3', '4'];
        $index   = array_rand($message, 1);

        return $message[$index];
    }
}