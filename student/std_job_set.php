<?php
//print_r($_POST);
session_start();
print_r($_SESSION);
require_once'../connect.php';

$job_id=$_POST['job_id'];
$roll_no=$_SESSION['user_id'];
$cv_id=$_POST['cv_id'];
$curr=date("Y-m-d");
echo $job_id;
echo $roll_no;
echo $cv_id;
echo $curr;

try{
  $sql="INSERT INTO setplacement.apply ( rollNo, job_id,apply_time,cv_id) VALUES(:rollNo,:job_id,:apply_time,:cv_id)";
  $stmt=$conn->prepare($sql);
  echo "string";
  $stmt->execute(array(
      ':rollNo'=> $roll_no,
      ':job_id' => $job_id,
      ':apply_time'=> $curr,
      ':cv_id' => $cv_id
  ));
  //header('Location:std_dashboard.php');
  }catch(Exception $err){
        echo $err->getMessage();
  }
try{
  $comm="Ok ..you are able to apply.";
  $app="Y";
  $d_pr_id=-1;
  $sql="INSERT INTO setplacement.maintains_apply ( comments, job_id,pr_id,rollNo,approved) VALUES(:comments, :job_id,:pr_id,:rollNo,:approved)";
  $stmt=$conn->prepare($sql);
  echo "string";
  $stmt->execute(array(
      ':comments'=> $comm,
      ':job_id' => $job_id,
      ':rollNo'=>$roll_no,
      ':pr_id'=>$d_pr_id,
      ':approved' => $app
  ));
  header('Location:std_dashboard.php');
  }catch(Exception $err){
        echo $err->getMessage();
  }
  ?>