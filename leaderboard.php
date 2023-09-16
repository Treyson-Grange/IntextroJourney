<?php
        $sql = "SELECT *
        FROM users
        ORDER BY points DESC
        LIMIT 10;";
        $conn= mysqli_connect('localhost', 'root', '' ,'test1') or die("Connection failed");
        $result = $conn->query($sql);
        $conn->close();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        h1{ 
            text-align: center; 
        }
    </style>
    <title>Leaderboard</title>
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
            <li><a href="leaderboard.php">LeaderBoard</a></li>
        </ul>
        
    </nav>' . $_SESSION['username'];
    }
?>
        <h1><br>LeaderBoard</h1>
    
    <?php
    $index = 1;
        while ($row = $result->fetch_assoc()) {
            
            // Access the columns of each row
            $userId = $row['id'];
            $username = $row['username'];
            $points = $row['points'];
            if($username == $_SESSION['username']) {
                echo '<div style="width:50%; margin:0 auto;" class="container"><h1 style="color: #fff;">' . $index . ')  '  . $username . ': '. $points . '</h1></div><br>';
            }
            else {
                echo '<div style="width:50%; margin:0 auto;" class="container"><h1>' . $index . ')  '  . $username . ': '. $points . '</h1></div><br>';
            }
            
        $index += 1;
        }
        $result->free();
    ?>
</body>
</html>