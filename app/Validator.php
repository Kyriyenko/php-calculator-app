<?php

namespace App;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Validator
{
    public function __construct(public string $rules) {}

    public static function validate($class, array $params = [])
    {
        $validator = new Validator('');

        $reflection = new \ReflectionClass($class);
        $attributes = $reflection->getProperties();
        $errors = [];

        foreach ($attributes as $attribute) {
            $propertyName = $attribute->getName();
            $rules = $attribute->getAttributes(Validator::class);

            if (!empty($rules)) {
                $validationRules = $rules[0]->newInstance()->rules;
                $errors = array_merge($errors, $validator->validateProperty($params, $propertyName, $validationRules));
            }
        }

        return $errors;
    }

    private function validateProperty(array $params, string $propertyName, string $validationRules): array
    {
        $errors = [];

        foreach (explode('|', $validationRules) as $rule) {
            $ruleParts = explode(':', $rule);
            $ruleName = $ruleParts[0];

            if ($ruleName === 'required' && empty($params[$propertyName])) {
                $errors[] = "Поле '{$propertyName}' є обов'язковим <br>";
            } elseif ($ruleName === 'min') {
                $minLength = $ruleParts[1];
                if (isset($params[$propertyName]) && strlen($params[$propertyName]) < $minLength) {
                    $errors[] = "Поле '{$propertyName}' повинне мати мінімум {$minLength} символів <br>";
                }
            } elseif ($ruleName === 'email' && isset($params[$propertyName]) && !filter_var($params[$propertyName], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Поле '{$propertyName}' має бути валідним емейлом <br>";
            }
        }

        return $errors;
    }
}