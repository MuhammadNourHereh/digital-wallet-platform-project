g<?php
require_once __DIR__ . '/../../utils/paths.php';

$users = [
    ['username' => 'abc', 'password' => '123'],
    ['username' => 'hassan_ali', 'password' => '12345'],
    ['username' => 'layla_jou', 'password' => 'pass1'],
    ['username' => 'noura_haddad', 'password' => 'abcd1'],
    ['username' => 'karim_mansour', 'password' => 'admin1'],
    ['username' => 'zeinab_omar', 'password' => 'qwert'],
    ['username' => 'samir_zaki', 'password' => 'xyz12'],
    ['username' => 'nadine_ghosn', 'password' => 'hello'],
    ['username' => 'mahmoud_saber', 'password' => '123qz'],
    ['username' => 'karim_abboud', 'password' => 'qazws'],
    ['username' => 'fatima_raad', 'password' => '1234a'],
];

foreach ($users as $user) {
    $_POST['username'] = $user['username'];
    $_POST['password'] = $user['password'];
    require path('login.php');
}
