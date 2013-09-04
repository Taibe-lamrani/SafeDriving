<?php 
include 'connection.php';
        $sql = 'SELECT * FROM student ORDER BY student_name';
        $req = mysql_query($sql);
        while ($res = mysql_fetch_array($req)){
        }
?>