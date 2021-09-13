<?php
    require 'mysql.php';

    $id = $_POST['courseID'];
    $program_id = $_POST['programID'];
    $credit = $_POST['credit'];
    $total_co = $_POST['totalCO'];
    $title = $_POST['courseTitle'];

    $sql = "INSERT INTO tblcourse (courseID, programID, courseTitle, credit, totalCO) VALUES
            ('$id', '$program_id', '$title', $credit, $total_co)";
    if($mysql->query($sql) == FALSE){
        header("Location: ../admin/add-course.php?failed=1");
    }

    for($i=1; $i<=15; $i++){
        if(isset($_POST["plo-co".$i])){
            $sql = "SELECT sl FROM tblplo WHERE programID = '$program_id' AND ploNo = $i";
            $plo_id = $mysql->query($sql)->fetch_assoc()['sl'];
            $data = $_POST["plo-co".$i];
            $field = ""; $val ="";
            foreach($data as $co){
                $field .= 'co'. $co . ', ';
                $val .= '1, ';
            }
            $sql = "INSERT INTO tblco (courseID, ploID, ".substr($field, 0, -2).") VALUES ('$id', $plo_id, ".substr($val, 0, -2).")";
            if($mysql->query($sql) == FALSE){
                header("Location: ../admin/add-course.php?failed=1");
            }
        }
    }

    header("Location: ../admin/add-course.php?success=1");

?>