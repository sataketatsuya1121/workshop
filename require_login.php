<?php
    require_once('config.php');
    // login
    if(isset($_POST['login']) && isset($_POST['user_name']) && isset($_POST['user_password']))
    {
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
    }
    // already logged in
    elseif(isset($_COOKIE['user_name']) && isset($_COOKIE['user_password']))
    {
        $user_name = $_COOKIE['user_name'];
        $user_password = $_COOKIE['user_password'];
    }
    // check login
    if(isset($user_name) && isset($user_password))
    {
        $pdo = connectPdo();
        $sth = $pdo->prepare('SELECT password FROM user WHERE name = :user_name');
        $sth->bindValue(':user_name', $user_name, PDO::PARAM_STR);
        $sth->execute();
        $password = $sth->fetchColumn();
        if (!$password || strcmp($user_password, $password) != 0) {
            header('Location: login.php');
            exit;
        }
    }
    else 
    {
        header('Location: login.php');
        exit;
    }
    if(isset($_POST['content'])){
        // Add an Item
        $content = $_POST['content'];
        $sth = $pdo->query('INSERT INTO workshop SET user_name="'.$user_name.'", content="'.$content.'"' );
        // $sth = $pdo->query('INSERT INTO workshop (user_name, content) values("' . $user_name . '","' . $content . '")' );
    }
    setcookie('user_name', $user_name, time()+3600);
    setcookie('user_password', $user_password, time()+3600);
?>
