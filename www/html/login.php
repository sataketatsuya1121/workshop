<?php
    // logout
    if(isset($_COOKIE['user_name']) || isset($_COOKIE['user_password']))
    {
        setcookie('user_name', '', time()-3600);
        setcookie('user_password', '', time()-3600);
    }
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>
<body class="container">
    <h1>Workshop login</h1>
    <form action="index.php" method="post">
        <label>user_name:</label>
        <input type="text" name="user_name" value="">
        <label>user_password:</label>
        <input type="text" name="user_password" value="">
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>
