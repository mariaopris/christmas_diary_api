<?php
$mysqli = new mysqli("172.17.0.4","christmas_user","asd123ASD!@#","christmas_diary");

// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
else
{
    echo "Caca Maria";
}
