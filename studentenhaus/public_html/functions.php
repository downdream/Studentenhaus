<?php

mysql_connect("localhost", "studentenhaus", "mango", "studentenhaus");

function getUsersData($student_id)
{
    $array = array();
    $q = mysql_query("SELECT * FROM 'Student' WHERE 'student_id'=".$student_id);
    while($r = mysql_fetch_assoc($q)){
        $array['student_id'] = $r['student_id'];
        $array['vorname'] = $r['vorname'];
        $array['nachname'] = $r['nachname'];
        $array['email'] = $r['email'];
        $array['username'] = $r['username'];
        $array['telefon'] = $r['telefon'];
    }
    return $array;
}

function getId($username)
{
    $q = mysql_query("SELECT 'student_id' FROM 'Student' WHERE 'username'=".$username);
    while($r = mysql_fetch_assoc($q)){
        return $r['student_id']
    }
}
?>    