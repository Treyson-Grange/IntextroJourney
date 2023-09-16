<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
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
<br></br>
<br></br>
    <div class="page">
        <div class="container form-box">
            <h1 class="test">Reccomend Tasks</h1>
            <form action="connect.php" method="POST">
                <label for="task">Task:<br></label>
                <input type="text" name="task" id="task"><br></br>
                <label for="points">Points:<br></label>
                <input type="number" name="points" id="points"><br></br>
                
                <input type="hidden" name="test" id="test"><br></br>
                <input type="submit" name="submit" id="submit">
            </form>
        </div>
        <div class="container">
            <h1>About</h1>
            <p>TITLE was created using PHP HTML CSS and XAMPP for serving.<br> This project is a side project made in the summer of 2023 to learn php, mySQL and servers.</p>
        </div>
        <div class="container">
            <h1>Rules</h1>
            <ul>
                <li>All entries will be tried and looked at by me before sent to the database</li>
                <li>Points need to be under 50</li>
                <li>rar</li>
            </ul>
        </div>
    </div>
    
        


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>