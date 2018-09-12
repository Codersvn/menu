<?php

namespace VCComponent\Laravel\Menu\Validators;

use VCComponent\Laravel\Menu\Validators\AbstractValidator;

class MenuValidator extends AbstractValidator
{
    protected $rules = [
        'RULE_CREATE' => [
            'name' => ['required'],
        ],
        'RULE_UPDATE' => [
            'name' => ['required'],
        ],
    ];
}
