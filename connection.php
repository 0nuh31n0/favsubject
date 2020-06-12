<?php

$mysqli = new mysqli(
    "*",
    "*",
    "*",
    "*"
);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}