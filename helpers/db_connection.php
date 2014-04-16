<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'hw4';

$db_connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
