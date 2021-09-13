<?php 
    require 'mysql.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT DISTINCT semester FROM tblmarks WHERE studentID = $id";
        $sems =  $mysql->query($sql);

        $ploProg = array();
        foreach($sems as $sem){
            $res = seeker($sem['semester'], $id);
            $ploProg[$sem['semester']]['total'] = $res['p'];
            $ploProg[$sem['semester']]['com'] = $res['t'];
        }

    }if(isset($_GET['c'])){
        $crs = $_GET['c'];
        $sql = "SELECT DISTINCT studentID FROM tblmarks WHERE courseID = '$crs'";
        $uList = $mysql->query($sql);
        $totalS = $uList->num_rows;
        $report = array();
        foreach($uList as $u){
            $usr = $u['studentID'];
            $ret = seeker2($crs, $usr);
            foreach($ret["co"] as $i => $j){
                if($j==1){
                    if(isset($report["co"][$i])){
                        $report["co"][$i]++;
                    }else{
                        $report["co"][$i] = 1;
                    }
                }
            }
            foreach($ret["plo"] as $i => $j){
                if($j==1){
                    if(isset($report["plo"][$i])){
                        $report["plo"][$i]++;
                    }else{
                        $report["plo"][$i] = 1;
                    }
                }
            }
        }
        ksort($report["co"]);
        ksort($report["plo"]);
    }

    function seeker($sem, $uid){
        require 'mysql.php';
        $sql;
        if($sem!="null"){
            $sql = "SELECT * FROM tblmarks WHERE studentID = $uid AND semester = '$sem'";
        }else{
            $sql = "SELECT * FROM tblmarks WHERE studentID = $uid";
        }
        
        $sMarks = $mysql->query($sql);

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
                $pId = $plo['plo_id'];
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

        $res = array();
        $res['t'] = 0;  
        

        $pTrack = array();
        
        foreach($pMarks as $c => $v){
            foreach($v as $i => $j){
                $pTrack[$i]=1;
                if($j * 100 / $pTotal[$c][$i]>=40){
                    $res['t']++;
                }
            }
        }
        $res['p'] = count($pTrack);
        return $res;
    }

    function seeker2($crs, $uid){
        require 'mysql.php';
        $sql = "SELECT * FROM tblmarks WHERE studentID = $uid AND courseID = '$crs'";
        
        $sMarks = $mysql->query($sql);

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
                $pId = $plo['plo_id'];
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

        $stats = array();
        foreach($cMarks as $c => $v){
            foreach($v as $i => $m){
                if(($m * 100 / $cTotal[$c][$i]) >=40 ){
                    $stats["co"][$i] = 1;
                }else{
                    $stats["co"][$i] = 0;
                }
            }
        }

        foreach($pMarks as $p => $v){
            foreach($v as $i => $m){
                if(($m * 100 / $pTotal[$p][$i]) >=40 ){
                    $stats["plo"][$i] = 1;
                }else{
                    $stats["plo"][$i] = 0;
                }
            }
        }

        return $stats;
    }

?>