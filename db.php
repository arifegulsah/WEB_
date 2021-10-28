<?php

/*
$POSTGRE_HOST='localhost';
$POSTGRE_USER='postgres';
$POSTGRE_PASS='1234';
$POSTGRE_DB='ticket';
$POSTGRE_PORT='8080';
$CHARSET='UTF8';
$COLLATION='uft8_general_ci';


$dbconn = pg_connect("host=localhost port=5432 dbname=ticket password=1234 ");
*/


$servername="localhost";
$username="root";
$pass="";
$dbname="ticket";

$link=mysqli_connect($servername, $username, $pass, $dbname);


?>


