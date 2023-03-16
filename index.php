<?php
    $password =$_POST['password'];
    $email = $_POST['email'];
    $con = new mysqli("localhost","root","","fashion");
    if($con->connect_error){
        die("Failed: " .$con->connect_error);
    } else {
        $stmt = $con->prepare("select * from users where email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                echo "<h2>login succesfull</h2>";
            } else
            {
                echo "<h2>invalid</h2>";
            }
        } else{
            echo "<h2>invalid</h2>";
        }
    }
?>