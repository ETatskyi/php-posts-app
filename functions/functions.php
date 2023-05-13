<?php

function setSessionMessage(string|array $message, string $type = 'alerts')
{
    if (!isset($_SESSION['messages'])) {
        $_SESSION['messages'] = [];
    }

    if (gettype($message) === 'string') {
        $_SESSION['messages'][$type][] = $message;
    };

    if (gettype($message) === 'array') {

        foreach ($message as $field => $fieldErrors) {
            foreach ($fieldErrors as $error)
                $_SESSION['messages'][$field][] =  $error;
        }
    };
}

function getSessionMessageList()
{
    if (isset($_SESSION['messages'])) {
        $messages = $_SESSION['messages'];
        return $messages;
    }
    return [];
}

function printAlerts()
{
    $messages = getSessionMessageList();
    foreach ($messages as $type => $message) {
        $msg = gettype($message) === 'array' ? implode(';', $message) : $message;
        echo "<div class='alert'>$type: $msg</div>";
    }
}

function debug($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    exit;
}

function hasErrors(string $name): bool
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return isset($_SESSION['messages'][$name]);
    }
    return false;
}

function removeMessage(string $name): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        unset($_SESSION['messages'][$name]);
    }
}

function showFormError(string $field)
{
    if (hasErrors($field)) {
        $message = 'The field ' . str_replace('_', ' ', $field) . ' ' . implode(', ', getSessionMessageList()[$field]);
        echo "<span class='field-error'>" . $message . "</span>";

        removeMessage($field);
    }
}

function checkAuth()
{
    return $_COOKIE['auth'] ?? false;
}

function setAuth($value, $days = 7)
{

    $cookieLifetime = 60 * 60 * 24 * $days;

    // setcookie('session-key', string $value, int $expire, string $path, string $domain, bool $secure, bool $httponly);
    setcookie("auth", $value, time() + $cookieLifetime, '/');
    header("Location: " . '../blogs.php');
}
