<?php

// get config params
function getEnvValues() {
    $env = file_get_contents(__DIR__ . '/../env.json');
    $env = json_decode($env, true);

    return $env;
}