<?php
    session_start();
    function getDataByUsername($username) {
        $conn= mysqli_connect('localhost', 'root', '' ,'test1') or die("Connection failed");
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // Prepare the SQL query
        $sql = "SELECT * FROM users WHERE username = ?";
    
        // Create a prepared statement
        $stmt = $conn->prepare($sql);
    
        // Bind the username parameter
        $stmt->bind_param("s", $username);
    
        // Execute the query
        $stmt->execute();
    
        // Get the result
        $result = $stmt->get_result();
    
        // Fetch the data
        $data = $result->fetch_assoc();
    
        // Close the statement and connection
        $stmt->close();
        $conn->close();
    
        return $data;
    }
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $conn= mysqli_connect('localhost', 'root', '' ,'test1') or die("Connection failed");
            if(isset($_POST['points']) && isset($_POST['task']) && isset($_POST['test'])) {
                $points= $_POST['points'];
                $task= $_POST['task'];
                $test= $_POST['test'];
                
                $sql= "INSERT INTO `exercise1`(`task`, `points`, `test`) VALUES ('$task','$points','$test');";
                
                $query= mysqli_query($conn,$sql);
                if($query) {
                    echo "Entry Successful";
                }
                else {
                    echo "no";
                }
            }
        }
        else {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['taskcomplete'])) {
                // In this case we are posting a score change
                $conn= mysqli_connect('localhost', 'root', '' ,'test1') or die("Connection failed");
                $pointsFrom= $_POST['points'];
                $username = $_SESSION["username"];
                $data = getDataByUsername($username);
                $points = $data['points'] + $pointsFrom;
                echo $points;

                $sql = "UPDATE `users` SET `points` = '$points' WHERE `username` = '$username'";//WRite the SQL
//              SO WHATS HAPPEONING is that the points change is not being passed in.  
                $query= mysqli_query($conn,$sql);
                if($query) {
                    echo '<link rel="stylesheet" href="styles.css">
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
                    echo '
                        <nav class="nav-bar">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="get-task.php">Get Task</a></li>
                                <li><a href="add-tasks.php">Add Tasks</a></li>
                                <li><a href="leaderboard.php">LeaderBoard</a></li>
                            </ul>
                        </nav>
                    ';
                    echo '
                        <h1 class="my-5">Submission Complete!~</h1>
                        <h2>Return Home for more!</h2>
                        
                    ';
                }
                else {
                    echo "no";
                }

            }
            else {
                echo "asdfasdf";
                $conn= mysqli_connect('localhost', 'root', '' ,'test1') or die("Connection failed");
                if(mysqli_connect_errno()) {
                    echo "failed: " . mysqli_connect_error();
                    exit();
                }
                else {
                    echo "worked";
                }
            }
            
        }
    ?>