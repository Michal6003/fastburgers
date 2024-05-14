<?php
$hn = 'localhost';
$un = 'fast_burgers_admin';
$pw = 'tdCKpP38xXGQN]2T';
$db = 'fast_burgers';

$conn = mysqli_connect($hn, $un, $pw, $db);
if (!$conn){
    die('Connection Failed: ' . mysqli_connect_error());
}
else 
{
    echo('connection is successful');
}