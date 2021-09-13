<?php
    require 'mysql.php';
    $course_id = $_POST['courseID'];
    $exam_name = $_POST['examName'];
    $semester = $_POST['semester'];
    $section = $_POST['section'];

    $file = fopen($_FILES['file']['tmp_name'], "r");
    

    fgetcsv($file, 200); // dumping header
        
    $co = array();
    $f = 1; $i=1;
    foreach(fgetcsv($file, 200) as $c){
        if($f == 1){
            $f = 0;
            continue;
        }
        $co[$i] = $c;
        $i++;
    }
    $max = array();
    $f = 1; $i=1;
    foreach(fgetcsv($file, 200) as $m){
        if($f == 1){
            $f = 0;
            continue;
        }
        $max[$i] = $m;
        $i++;
    }

    while($marks = fgetcsv($file, 200)){

        $student_id; 
        $field = "";
        $val = "";
        $f = 1; $i=1;

        foreach($marks as $m){
            if($f==1){
                $student_id = $m;
                $f=0;
                continue;
            }
            $field .= 'q'.$i.'_mark, ' . 'q'.$i.'_co, ' . 'q'.$i.'_max, ';
            $val .= $m.', '.$co[$i].', '.$max[$i].', ';
            $i++;
        }

        $sql = "INSERT INTO tblmarks(studentID, courseID, examName, semester, section, ".substr($field, 0, -2).") VALUES
            ('$student_id', '$course_id', '$exam_name', '$semester', '$section', ".substr($val, 0, -2).")";

        $mysql->query($sql);
    }

    header("Location: ../faculty/entry-marks-mass.php?success=1");
?>