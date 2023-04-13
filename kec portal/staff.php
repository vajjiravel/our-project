<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $con = new mysqli("localhost","root","","project");
    if($con->connect_error) {
        die("Failed to connect : ".$con->connect_error);
    } else {
        $stmt = $con->prepare("select * from staff where username = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                $_SESSION['password'] = $password_login;
                header('location: STAFF.html');
            }else {
                $_SESSION['password'] = $password_login;
                header('location: index.html');
            }
        } else {
            $_SESSION['password'] = $password_login;
            header('location: index.html');
        }
    }
















?>