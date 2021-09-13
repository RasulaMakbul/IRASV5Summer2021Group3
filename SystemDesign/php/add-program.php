<?php
    require 'mysql.php';

    $id = $_POST['programID'];
    $programName = $_POST['programName'];
    $school = $_POST['school'];
    $sql = "INSERT INTO tblprogram2(programID, programName, school) VALUES ('$id', '$programName', '$school')";
    //echo $sql;
    if($mysql->query($sql) == FALSE){
        header("Location: ../admin/add-program.php?failed=1");
    }
    
    $i = 1;

    while(isset($_POST['title'.$i])){
        $name = $_POST['title'.$i];       
        $sql = "INSERT INTO tblplo(programID, ploNo, ploName) VALUES
            ('$id', $i, '$name')";
        if($mysql->query($sql) == FALSE){
            header("Location: ../admin/add-program.php?failed=1");
        }
        $i++;
    }

    header("Location: ../admin/add-program.php?success=1");

?>