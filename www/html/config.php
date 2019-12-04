<?php
    define('DSN', 'mysql:host=172.29.0.2;dbname=mydb;charset=utf8');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'secret');

    function connectPdo()
    {
        try {
            return new PDO(DSN, DB_USER, DB_PASSWORD);
        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }
?>
