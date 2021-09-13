<?php
    require 'mysql.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tbluser WHERE email = '$email' AND password = '$password'";
    
    $data = $mysql->query($query)->fetch_assoc();

    if($data){
        session_start();
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['role'] = $data['role'];
    }

    header("Location: ../login.php");
    
    
?>