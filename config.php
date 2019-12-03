<?php
    define('DSN', 'mysql:host=localhost;dbname=mydb;charset=utf8');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'tatsuya11214');

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
