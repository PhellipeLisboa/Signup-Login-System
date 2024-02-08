<?php 

include '../Models/User.php';
include '../Core/Database.php';

$db = new Database();
$db_conn = $db->connect();
$user = new User($db_conn);