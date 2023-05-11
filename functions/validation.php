<?php

function validate(array $fields, array $rules)
{
    $errors = [];
    if (!$rules) {
        return false;
    }
    $rulesArray = processingRules($rules);
    foreach ($rulesArray as $fieldName => $arrayRules) {
        foreach ($arrayRules as $rule) {
            preg_match("/\[(\d+)\]/", $rule, $matches);
            //required
            if ($rule === 'required') {
                if (!required($fields[$fieldName])) {
                    $errors[$fieldName][] = "is required";
                }
            }
            //min length
            if (mb_strpos($rule, 'min_length') !== false) {
                preg_match("/\[(\d+)\]/", $rule, $matches);
                $minLength = $matches[1];
                if (!minLength($fields[$fieldName], $minLength)) {
                    $errors[$fieldName][] = "must contain at least $minLength characters";
                }
            }
            //max length
            if (mb_strpos($rule, 'max_length') !== false) {
                preg_match("/\[(\d+)\]/", $rule, $matches);
                $maxLength = $matches[1];
                if (!maxLength($fields[$fieldName], $maxLength)) {
                    $errors[$fieldName][] = "must contain no more than $maxLength characters";
                }
            }
            //email
            if ($rule === 'email') {
                if (!emailValidator($fields[$fieldName])) {
                    $errors[$fieldName][] = "is not valid";
                }
            }
            //password
            if ($rule === 'password') {
                if (!passwordValidator($fields[$fieldName])) {
                    $errors[$fieldName][] = "is not valid";
                }
            }
            //password confirm
            if ($rule === 'password_confirm') {
                if (!fieldConfirmValidator($fields['password_confirm'], $fields['password'])) {
                    $errors[$fieldName][] = "Password mismatch!";
                }
            }
        }
    }
    return $errors;
}

function processingRules(array $rules): array
{
    $rulesArray = [];
    foreach ($rules as $fieldName => $rule) {
        $rulesArray[$fieldName] = explode('|', $rule);
    }
    return $rulesArray;
}

function required(string|null $value): bool
{
    return $value ?? false;
}

function minLength(string|null $string, int $length): bool
{
    return mb_strlen($string) > $length;
}

function maxLength(string|null $string, int $length): bool
{
    return mb_strlen($string) < $length;
}

function emailValidator(string|null $email): bool
{
    $re = '/^[\w]+@([\w]+\.)+[\w]{2,4}$/';
    preg_match($re, $email, $matches);
    return !!$matches;
}
function passwordValidator(string|null $email): bool
{
    $re = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
    preg_match($re, $email, $matches);
    return !!$matches;
}

function fieldConfirmValidator(string $fieldConfirm, string $field): bool
{
    return $fieldConfirm === $field;
}
