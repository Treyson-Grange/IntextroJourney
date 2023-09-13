<?php
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
    ?>