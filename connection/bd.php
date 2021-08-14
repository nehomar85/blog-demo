<?php
  $host_name = 'localhost';
  $database = 'blog';
  $user_name = 'root';
  $password = '';

  $blog_conn = new mysqli($host_name, $user_name, $password, $database);

  if ($blog_conn->connect_error) {
    die('Failed to connect to MySQL: '. $Portal->connect_error);
  }
?>