 <?php 
     require_once 'connect.php';

  ?>


<!DOCTYPE html>
<html>
<head>
 <style type="text/css">
    :root{
            --background:#45b6f7;
            --header:#4a555c;
            --footer: #131521;
            --head_font_color: white;
            --foot_font_color: whitesmoke;
          }
          *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins" , sans-serif;
          }
          html{
            background-image: linear-gradient(15deg,white,var(--background));
            width: 100%;
            background-repeat: no-repeat;
          }
 </style>
</head>
<body>

<?php
if(isset($_POST['uname']) && isset($_POST['upassword'])){
  $ok=0;
  $set=-1;
try{
  $stmt=$conn->query(" SELECT * FROM setplacement.log_in ");
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  if($row['email_id']===$_POST['uname'] && $row['passwords']===md5($_POST['upassword'])){
     echo 'register succesfully';
     print_r($row);
  if($row['levels']==1){

    //for student database chaeck.
  try{
    $stmt1=$conn->query(" SELECT * FROM setplacement.student");
    while($row=$stmt1->fetch(PDO::FETCH_ASSOC)){
      if($row['email']===$_POST['uname']){
          $ok=1;
          $set=$row['levels'];
         header('Location:student/std_dashboard.php');
         break;
       }
       }
       if($ok===0){
        echo "string";
        header('Location:student/std_from.php');
       }

    }catch(Exception $err){
      echo $err->getMessage();
    }
    }

    //for company data check
   if($row['levels']==2){

    $ok=0;
    try{
    $stmt2=$conn->query(" SELECT * FROM setplacement.company");
    while($row=$stmt2->fetch(PDO::FETCH_ASSOC)){
      if($row['email']===$_POST['uname']){
          $ok=1;
         header('Location:company/com_dashboard.php');
         break;
       }
       }
       if($ok===0){
        header('Location:company/comp_from.php');
       }

    }catch(Exception $err){
      echo $err->getMessage();
    }
    }

    //check for placement_rep
   if($row['levels']==3){

     $ok=0;
    try{
    $stmt3=$conn->query(" SELECT * FROM setplacement.placement_rep");
    while($row=$stmt3->fetch(PDO::FETCH_ASSOC)){
      if($row['email']===$_POST['uname']){
          $ok=1;
         header('Location:placement_rep/pr_dashboard.php');
         break;
       }
       }
       if($ok===0){
        header('Location:placement_rep/pr_from.php');
       }

    }catch(Exception $err){
      echo $err->getMessage();
    }
    }
  }
} 
echo '<script>alert("you are not register yet");</script>';
echo '<script>location.replace("log_in.php")</script>';

}
catch(Exception $err){
      echo $err->getMessage();
    }
  unset($_POST);
}
 ?>
</body>
</html>