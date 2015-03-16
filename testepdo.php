<?php

$dbh=new PDO("mysql:dbname=onlinemarket;host=172.17.0.32", "root", "root"); 
foreach($dbh->query('SELECT * from listings') as $row)
{
	print_r($row);
}
