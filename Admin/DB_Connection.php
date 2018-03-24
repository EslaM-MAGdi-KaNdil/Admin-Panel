<?php


$dsn = 'mysql:host=localhost;dbname=learn';

$user = 'root';

$password = '00005555aa';

$option = array(
    
   PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES UTF8 '

);


try
{

    $DB_Connect = new PDO($dsn,$user,$password,$option);
    $DB_Connect -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}

catch (PDOException $e) 
{
    echo 'Faild Connect To DB ' . $e;
}



