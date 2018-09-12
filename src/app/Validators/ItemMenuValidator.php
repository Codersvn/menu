<?php

namespace VCComponent\Laravel\Menu\Validators;

use VCComponent\Laravel\Menu\Validators\AbstractValidator;

class ItemMenuValidator extends AbstractValidator
{
    protected $rules = [
        'RULE_CREATE' => [
            'menu_id'   => ['required'],
            'label'     => ['required'],
            'link'      => ['required'],
            'type'      => ['required'],
            'parent_id' => ['required'],
        ],
        'RULE_UPDATE' => [
            'label'     => ['required'],
            'link'      => ['required'],
            'type'      => ['required'],
            'parent_id' => ['required'],
        ],
    ];
}
