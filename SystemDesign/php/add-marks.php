<?php
    require 'mysql.php';

    $student_id = $_POST['studentID'];
    $course_id = $_POST['courseID'];
    $exam_name = $_POST['examName'];
    $semester = $_POST['semester'];
    $section = $_POST['section'];
    
    $field = "";
    $val = "";
    $i=1;

    while(isset($_POST['co'.$i])){
        $field .= 'q'.$i.'_mark, ' . 'q'.$i.'_co, ' . 'q'.$i.'_max, ';
        $val .= $_POST['mark'.$i].', '.$_POST['co'.$i].', '.$_POST['max'.$i].', ';
        $i++;
    }

    $sql = "INSERT INTO tblmarks(studentID, courseID, examName, semester, section, ".substr($field, 0, -2).") VALUES
            ('$student_id', '$course_id', '$exam_name', '$semester', '$section', ".substr($val, 0, -2).")";

    echo $sql . '<br>';
    $mysql->query($sql);


    header("Location: ../faculty/entry-marks.php?success=1");

?>