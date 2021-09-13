<?php
    require 'mysql.php';
    // geting post requests
    $id = $_POST['userID'];
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $prog = $_POST['programID'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = strtolower($_POST['role']);
    
    $store = "INSERT INTO tbluser (userID, firstName, lastName, programID, email, password, role) VALUES
                ('$id', '$fName', '$lName', '$prog', '$email', '$password' , '$role')";

    if($mysql->query($store)){
        header("Location: ../admin/add-user.php");
    }else{
        header("Location: ../admin/add-user.php");
    }

    
?>