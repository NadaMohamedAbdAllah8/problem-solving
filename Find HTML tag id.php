<?php
/*
Write PHP function that takes an HTML tag as string and returns its ID value if
existed or false if it has no ID
example: When calling
getTagID('<div id="container">');
    it will return the string:
    "container"
    */

function getTagID(string $htmlTag): string|false
{
    if (preg_match('/id="([^"]+)"/', $htmlTag, $matches)) {
        return $matches[1];
    }
    return false;
}