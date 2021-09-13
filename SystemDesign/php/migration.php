<?php
    require 'mysql.php';
    
    // sql for program table done
    $program = "CREATE TABLE tblprogram2(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        programID VARCHAR(10) NOT NULL UNIQUE,
        programName VARCHAR(100) NOT NULL,
        school VARCHAR(100) NOT NULL
    )";
    if($mysql->query($program) == FALSE){
        echo $mysql->error.'<br>';
    }

    // sql for PLO table done
    $plo = "CREATE TABLE tblplo(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        programID INT NOT NULL,
        ploNO INT NOT NULL,        
        ploName VARCHAR(200) NOT NULL,
        FOREIGN KEY (programID) REFERENCES program(programID)
    )";
    if($mysql->query($plo) == FALSE){
        echo $mysql->error.'<br>';
    }

    // sql for user table done
    $user = "CREATE TABLE tbluser(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        userID VARCHAR(10) NOT NULL UNIQUE,
        firstName VARCHAR(100) NOT NULL,
        lastName VARCHAR(100) NOT NULL,
        programID VARCHAR(20) NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(20) NOT NULL,
        role VARCHAR(10) NOT NULL
    )";
    if($mysql->query($user) == FALSE){
        echo $mysql->error.'<br>';
    }

    // sql for course table done
    $course = "CREATE TABLE tblcourse(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        courseID VARCHAR(10) NOT NULL UNIQUE,
        courseTitle VARCHAR(100) NOT NULL UNIQUE,
        programID INT NOT NULL,
        credit INT NOT NULL,
        totalCO INT NOT NULL,
        FOREIGN KEY (programID) REFERENCES tblprogram2(programID)
    )";
    if($mysql->query($course) == FALSE){
        echo $mysql->error.'<br>';
    }

    // sql for co table  done
    $co = "CREATE TABLE tblco(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        courseID VARCHAR(10) NOT NULL,
        ploID INT NOT NULL,
        co1 BOOLEAN DEFAULT 0 NOT NULL,
        co2 BOOLEAN DEFAULT 0 NOT NULL,
        co3 BOOLEAN DEFAULT 0 NOT NULL,
        co4 BOOLEAN DEFAULT 0 NOT NULL,
        co5 BOOLEAN DEFAULT 0 NOT NULL,
        co6 BOOLEAN DEFAULT 0 NOT NULL,
        co7 BOOLEAN DEFAULT 0 NOT NULL,
        co8 BOOLEAN DEFAULT 0 NOT NULL,
        co9 BOOLEAN DEFAULT 0 NOT NULL,
        co10 BOOLEAN DEFAULT 0 NOT NULL,
        FOREIGN  KEY (courseID) REFERENCES tblcourse(courseID),
        FOREIGN  KEY (ploID) REFERENCES tblplo(sl)
    )";
    if($mysql->query($co) == FALSE){
        echo $mysql->error.'<br>';
    }

    $marks = "CREATE TABLE tblmarks(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        studentID VARCHAR(10) NOT NULL,
        courseID VARCHAR(10) NOT NULL,
        examName VARCHAR(100) NOT NULL,
        semester VARCHAR(10) NOT NULL,
        section VARCHAR(5) NOT NULL,
        q1_mark INT NULL, 
        q1_co INT NULL,
        q1_max INT NULL,
        q2_mark INT NULL, 
        q2_co INT NULL,
        q2_max INT NULL,
        q3_mark INT NULL, 
        q3_co INT NULL,
        q3_max INT NULL,
        q4_mark INT NULL, 
        q4_co INT NULL,
        q4_max INT NULL,
        q5_mark INT NULL, 
        q5_co INT NULL,
        q5_max INT NULL,
        q6_mark INT NULL, 
        q6_co INT NULL,
        q6_max INT NULL,
        q7_mark INT NULL, 
        q7_co INT NULL,
        q7_max INT NULL,
        q8_mark INT NULL, 
        q8_co INT NULL,
        q8_max INT NULL,
        q9_mark INT NULL, 
        q9_co INT NULL,
        q9_max INT NULL,
        q10_mark INT NULL, 
        q10_co INT NULL,
        q10_max INT NULL,
        FOREIGN KEY (studentID) REFERENCES tbluser(userID),
        FOREIGN KEY (courseID) REFERENCES tblcourse(courseID)
    )";
    if($mysql->query($marks) == FALSE){
        echo $mysql->error.'<br>';
    }
    
?>