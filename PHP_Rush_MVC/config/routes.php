<?php

$router->use('GET', '/WebRoot/auth/register', new App\Controllers\AuthController(), 'register_view');
$router->use('POST', '/WebRoot/register', new App\Controllers\AuthController(), 'register');

$router->use('GET', '/WebRoot', new App\Controllers\AuthController(), 'register_view');

$router->use('GET', '/WebRoot/login', new App\Controllers\AuthController(), 'login_view');
$router->use('POST', '/WebRoot/login', new App\Controllers\AuthController(), 'login');

$router->use('POST', '/WebRoot/logout', new App\Controllers\AuthController(), 'logout');

$router->use('GET', '/WebRoot/admin/users', new App\Controllers\UserController(), 'user_view');

$router->use('GET', '/WebRoot/admin/users/editUser', new App\Controllers\UserController(), 'edit');
$router->use('POST', '/WebRoot/admin/users/deleteUser', new App\Controllers\UserController(), 'deleteUser');
$router->use('POST', '/WebRoot/admin/users/editUser', new App\Controllers\UserController(), 'updateUser');

$router->use('GET', '/WebRoot/admin/users/createUser', new App\Controllers\UserController(), 'addUser');
$router->use('POST', '/WebRoot/admin/users/createUser', new App\Controllers\UserController(), 'createUser');