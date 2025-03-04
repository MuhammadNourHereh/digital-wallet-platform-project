<?php

function path($file) {
    // considering /wallet-server as the base dirctory
    $base = __DIR__ . "/..";
    $paths = [
        "conn" => $base . "/database/conn.php",
        "cors-headers" => $base . "/utils/cors-headers.php"
    ];

    if (!isset($paths[$file])) {
        die("Error: Path '$file' not found.");
    }

    return $paths[$file];
}
