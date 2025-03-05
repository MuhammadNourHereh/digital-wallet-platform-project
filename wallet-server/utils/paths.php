<?php

function path($file)
{
    // considering /wallet-server as the base dirctory
    $base = __DIR__ . "/..";
    $paths = [
        "conn" => $base . "/database/conn.php",
        "cors-headers" => $base . "/utils/cors-headers.php",
        "register" => $base . "/connection/user/v1/api/register.php",
        "login" => $base . "/connection/user/v1/api/login.php",
    ];

    if (!isset($paths[$file])) {
        die("Error: Path '$file' not found.");
    }

    return $paths[$file];
}
