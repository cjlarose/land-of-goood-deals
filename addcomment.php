<?php
include "helpers/blog.php";
include "helpers/db_connection.php";

$datID = $_POST["blog_id"];
$datEmail = $_POST["email"];
$datComment = $_POST["content"];
$error = FALSE;

$blog = new Blog($db_connection);
try {
	$blog->add_comment($datID, $datEmail, $datComment);
	echo '[{"status":"good"}]';
} catch (Exception $e) {
	echo '[{"status":"bad"}]';
}
