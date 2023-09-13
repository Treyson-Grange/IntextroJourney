
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>TITLE</title>
</head>
<body>
<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        echo '<nav class="nav-bar"><ul><li><a href="index.php">Home</a></li><li><a href="get-task.php">Get Task</a></li><li><a href="add-tasks.php">Add Tasks</a></li><li><a href=leaderboard.php>LeaderBoard</a></li></ul><ul class="register"><li><a href="register.php">Register</a></li><li><a href="login.php">Login</a></li></ul></nav>';
    }
    else {
        echo '<nav class="nav-bar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="get-task.php">Get Task</a></li>
            <li><a href="add-tasks.php">Add Tasks</a></li>
            <li><a href=leaderboard.php>LeaderBoard</a></li>
        </ul>
        
    </nav>' . $_SESSION['username'];
    }
?>
<!-- <nav class="nav-bar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="get-task.php">Get Task</a></li>
                <li><a href="add-tasks.php">Add Tasks</a></li>
            </ul>
            
        </nav> -->
</body>
</html>