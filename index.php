<?php
    require_once('require_login.php');
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Workshop</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>
<body class="container">
    <a href="profile.php">Profile</a>
    <a href="login.php">Logout</a>
    <h1>Workshop</h1>
    <form method="post">
        <input type="text" name="content" value="">
        <input type="submit" value="ADD">
    </form>
    <h2>Current Comment</h2>
    <form>
        <label>Search:</label>
        <input type="text" name="keyword" value="">
        <input type="submit">
    </form>
    
    <?php
        if (isset($_REQUEST['keyword']))
        {
            $keyword = $_REQUEST['keyword'];
        }else 
        {
            $keyword = '';
        }
        $query = 'SELECT id, content, user_name FROM workshop WHERE content like "%'.$keyword.'%"';
        $sth = $pdo->query($query);
    ?>

    <!-- <?= "[debug SQL]: " . $query ?> -->

    <table class="table table-striped">
        <thead>
            <th>content</th>
            <th>user_name</th>
        </thead>
        <tbody>
            <?php foreach($sth as $row){ ?>
            <tr>
                <td><?= htmlspecialchars($row[1]) ?></td>
                <td><?= htmlspecialchars($row[2]) ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
