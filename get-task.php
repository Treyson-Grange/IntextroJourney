


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

    <?php
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
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
    echo "<br>";
    


    


    function fetchRandom(){
        $conn= mysqli_connect('localhost', 'root', '' ,'test1') or die("Connection failed");
        if($conn->connect_error) {
            die("Connection Failed");
        }
        $result = $conn->query("SELECT * FROM exercise1 ORDER BY RAND() LIMIT 1;");
        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
      
        
        return $data;
    }
    
    function getPoint() {
        return;
    }

    $rows = fetchRandom();
    
    foreach ($rows as $row) {
        $rowrow = $row["points"];
        $task = $row["task"];
    }
    ?>

    <form action="connect.php" method="POST">
    </br>
        <div class="container">
            <div class="row align-items-start">
                <div style="justify-content: right;" class="col-lg-6">
                    Task: <b><?php echo $task; ?></b>
                </div>
                |
                <div class="col">
                    Points: <b><?php echo $rowrow ?></b>
                </div>
                <div class="col">
                    <button type="submit" id="subm" name="taskcomplete" class="btn btn-secondary">Task Complete!</button>
                </div>
            </div>
        </div>
            
        
        <input type="hidden" id="points" name="points" value="<?php echo $rowrow ?>">
        
    </form>

</body>
</html>