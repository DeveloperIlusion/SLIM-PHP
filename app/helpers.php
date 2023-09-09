<?php

function base_url(string $path = "") {
    $root = __DIR__ . "/.." . $path;

    return $root;
}

function theme_url(string $path = "") {
    $destiny =  base_url() . "/templates" . $path;

    return $destiny;
}

function theme_croche_assets(string $path = "") {
    $destiny =  base_url() . "/templates/Croche/Assets" . $path;

    return $destiny;
}