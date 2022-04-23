<?php
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '123456';
const DB_NAME = 'Net2Hw';
function connect()
{
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($connection->connect_error) {
        die("Database connection failed: " . $connection->connect_error);
    }
    return $connection;
}