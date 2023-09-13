<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ 
            font: 14px sans-serif; text-align: center; 
        }
        a {
            text-align: right;
        }
    </style>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
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
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
    <h2 class="my-5">You have</h2>
    <?php
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
        $username = $_SESSION["username"];
        $data = getDataByUsername($username);

        echo "<h2>" . $data['points'] . " Points" . "</h3>"
    ?>
</body>
</html>