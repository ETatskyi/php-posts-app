<?php

require_once __DIR__ . '/../functions/functions.php';
require_once __DIR__ . '/CONSTANTS.php';

try {
    $connect = new PDO(DB_DSN, DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $errors) {
    debug($errors);
}

function isEmailExists($dbconnect, $email)
{
    $query = "SELECT COUNT(`email`) as `count` FROM `users` WHERE `email`=:email";
    $prepared = $dbconnect->prepare($query);    
    $prepared->execute(['email'=>$email]);

    return $prepared->fetch()['count'];
}

function registerUser($dbconnect, array $user){
    $query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES (:name, :email, :password)";
    $prepared = $dbconnect->prepare($query);        
    $prepared->execute($user);
}
function usersMultipleInsert($dbconnect, array $users)
{
    if (count($users) == 0) return;

    $query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ";
    $list = [];

    foreach ($users as $user) {
        $name = $user['name'];
        $email = $user['email'];
        $password = password_hash($user['password'], PASSWORD_BCRYPT);

        $list[] = "('$name', '$email', '$password')";
    }

    $dbconnect->query($query . implode(', ', $list));
}

function userAuth($dbconnect, $email, $password)
{
    $hash = $dbconnect->query("SELECT `password` FROM `users` WHERE `email`='$email'")->fetch()['password'];
    return password_verify($password, $hash);
}
