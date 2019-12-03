<?php
    require('require_login.php');
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>
<body class="container">
    <a href="index.php">Workshop</a>
    <a href="login.php">Logout</a>
    <h1>Your Profile</h1>
    <?php
        if(isset($user_name))
        {
            $sth = $pdo->prepare('SELECT name, email, hobby FROM user WHERE name = :user_name');
            $sth->bindValue(':user_name', $user_name, PDO::PARAM_STR);
            $sth->execute();
            $row = $sth->fetch();
        }
    ?>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>name: </td>
                <td><?= $row[0] ?></td>
            </tr>
            <tr>
                <td>email: </td>
                <td><?= $row[1] ?></td>
            </tr>
            <tr>
                <td>hobby: </td>
                <td><?= $row[2] ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
