<?php
    require '../php/mysql.php';

    $color = ["", "#1FE7C4", "#E45C17", "#06B97B", "#8CE026", "#E1CCFF", "#5BA2CC", "#0A2E82", "#957107", "#80CF18"];
    // session_start();
    $id = $_SESSION['userID'];
    $sql = "SELECT * FROM tbluser WHERE userID = studentID";
    $uInfo = $mysql->query($sql);


    $sql = "SELECT * FROM tblplo WHERE programID = '".$uInfo['programID']."'";
    $totalPlo = $mysql->query($sql)->num_rows;

    $sql = "SELECT * FROM tblmarks WHERE studentID = $id";
    $sMarks = $mysql->query($sql);

        //course based total co marks
    $cMarks = array();
    $cTotal = array();
    foreach($sMarks as $marks){
        $course = $marks['courseID'];
        for($i=1; $i<=10; $i++){
            if(isset($marks["q".$i."_co"]) && $marks["q".$i."_co"]!=0){
                $co = $marks["q".$i."_co"];
                if(isset($cMarks[$course][$co])){
                    $cMarks[$course][$co] += $marks["q".$i."_mark"];
                    $cTotal[$course][$co] += $marks["q".$i."_max"];
                }else{
                    $cMarks[$course][$co] = $marks["q".$i."_mark"];
                    $cTotal[$course][$co] = $marks["q".$i."_max"];
                }
            }
        }
    }

    $pMarks = array();
    $pTotal = array();
    foreach($cMarks as $c => $v){

        $sql = "SELECT * FROM tblco WHERE courseID = '$c'";
        $plos = $mysql->query($sql);
        foreach($plos as $plo){
            $pId = $plo['ploID'];
            for($i=1; $i<=10; $i++){
                if(isset($plo["co".$i]) && $plo["co".$i]==1){
                    if(isset($pMakrs[$c][$pId])){
                        $pMarks[$c][$pId] += $cMarks[$c][$i];
                        $pTotal[$c][$pId] += $cTotal[$c][$i];
                    }else{
                        $pMarks[$c][$pId] = $cMarks[$c][$i];
                        $pTotal[$c][$pId] = $cTotal[$c][$i];
                    }
                }
            }
        }
    }

?>