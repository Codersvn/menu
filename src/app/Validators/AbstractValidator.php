<?php

namespace VCComponent\Laravel\Menu\Validators;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use VCComponent\Laravel\Menu\Validators\ValidatorInterface;

abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * Get rule for validation by action ValidatorInterface::RULE_CREATE or ValidatorInterface::RULE_UPDATE
     *
     * Default rule: ValidatorInterface::RULE_CREATE
     *
     * @param null $action
     * @return array
     */
    public function getRules($action = null)
    {

        $rules = $this->rules;

        if (isset($this->rules[$action])) {
            $rules = $this->rules[$action];
        }

        return $rules;
    }

    public function isValid($data, $action)
    {
        if ($data instanceof Request) {
            $data = $data->all();
        }
        $validator = Validator::make($data, $this->getRules($action));
        if ($validator->fails()) {
            throw new Exception($validator->errors(), 1000);
        }
        return true;
    }
}
