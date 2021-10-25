<?php
$servername="localhost";
$port_no=3306;
$username="root";
$password="root";
$myDb="setplacement";
 try{
      $conn= new PDO("mysql:host=$servername; port=$port_no, dpname=$myDb",$username,$password);
      //PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      echo "<div style='width:10px; height:10px; background-color:green;border-radius: 50%;position: absolute;
            top:50px;
            left:50%;'></div>";
 }catch(PDOException $e){
      echo "Connection Faild :".$e->getMessage();
 }
?>