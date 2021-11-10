<?php
//print_r($_POST);
session_start();
print_r($_SESSION);
require_once'../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?

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
  
  }catch(Exception $err){
        echo $err->getMessage();
  }

 try {
    $stmt=$conn->query("SELECT * FROM setplacement.maintains_apply p WHERE p.job_id=$job_id AND p.rollNo=$roll_no ");
      if($stmt->rowcount() > 0){
      while ($set=$stmt->fetch()) {
      $message=$set['comments'];
       echo "<script> alert( ' ".$message." ');</script>";
      }
    }
  } catch(Exception $err){
    echo $err->getMessage();
  }
 //header('Location:std_dashboard.php');
echo '<script>location.replace("std_dashboard.php")</script>';

  ?>
  </body>
</html>