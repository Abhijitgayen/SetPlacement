<?php
session_start();
require_once'../connect.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SetPlacement dashboard </title>
    <link rel="stylesheet" href="css/dashboard.css">
    <style type="text/css">
      /* Google Font Link */
          @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
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
          table{
           width:100%;
           background-color: var(--background);
           padding: 5px;
           margin: 10px;
           border-collapse: collapse;
          }
         td,th,tr{
          text-align: center;
           border: 1px solid white;
          }

          .logo_name b{
            color: var(--background);
          }
          .sidebar{
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 78px;
            background: var(--header);
            padding: 6px 14px;
            z-index: 99;
            transition: all 0.5s ease;
          }
          .sidebar.open{
            width: 250px;
          }
          .sidebar .logo-details{
            height: 60px;
            display: flex;
            align-items: center;
            position: relative;
          }
          .sidebar .logo-details .icon{
            opacity: 0;
            transition: all 0.5s ease;
          }
          .sidebar .logo-details .logo_name{
            color: var(--head_font_color);
            font-size: 20px;
            font-weight: 600;
            opacity: 0;
            transition: all 0.5s ease;
          }
          .sidebar.open .logo-details .icon,
          .sidebar.open .logo-details .logo_name{
            opacity: 1;
          }
          .sidebar .logo-details #btn{
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            font-size: 29px;
            transition: all 0.4s ease;
            font-size: 23px;
            text-align: center;
            cursor: pointer;
            transition: all 0.5s ease;
          }
          .sidebar.open .logo-details #btn{
            text-align: right;
          }
          .sidebar i{
            color: var(--head_font_color);
            height: 60px;
            min-width: 50px;
            font-size: 28px;
            text-align: center;
            line-height: 60px;
          }
          .sidebar .nav-list{
            margin-top: 20px;
            height: 100%;
          }
          .sidebar li{
            position: relative;
            margin: 8px 0;
            list-style: none;
          }
          .sidebar li .tooltip{
            position: absolute;
            top: -20px;
            left: calc(100% + 15px);
            z-index: 3;
            background: var(--head_font_color);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 15px;
            font-weight: 400;
            opacity: 0;
            white-space: nowrap;
            pointer-events: none;
            transition: 0s;
          }
          .sidebar li:hover .tooltip{
            opacity: 1;
            pointer-events: auto;
            transition: all 0.4s ease;
            top: 50%;
            transform: translateY(-50%);
          }
          .sidebar.open li .tooltip{
            display: none;
          }
          .sidebar input{
            font-size: 15px;
            color: var(--head_font_color);
            font-weight: 400;
            outline: none;
            height: 50px;
            width: 100%;
            width: 50px;
            border: none;
            border-radius: 12px;
            transition: all 0.5s ease;
            background: #1d1b31;
          }
          .sidebar.open input{
            padding: 0 20px 0 50px;
            width: 100%;
          }
          .sidebar .bx-search{
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            font-size: 22px;
            background: var(--background);
            color: var(--head_font_color);
          }
          .sidebar.open .bx-search:hover{
            background: #1d1b31;
            color: var(--head_font_color);
          }
          .sidebar .bx-search:hover{
            background: var(--head_font_color);
            color: var(--background);
          }
          .sidebar li a{
            display: flex;
            height: 100%;
            width: 100%;
            border-radius: 12px;
            align-items: center;
            text-decoration: none;
            transition: all 0.4s ease;
            background: var(--background);
          }
          .sidebar li a:hover{
            background: var(--head_font_color);
          }
          .sidebar li a .links_name{
            color: var(--head_font_color);
            font-size: 15px;
            font-weight: 400;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: 0.4s;
          }
          .sidebar.open li a .links_name{
            opacity: 1;
            pointer-events: auto;
          }
          .sidebar li a:hover .links_name,
          .sidebar li a:hover i{
            transition: all 0.5s ease;
            color: var(--background);
          }
          .sidebar li i{
            height: 50px;
            line-height: 50px;
            font-size: 18px;
            border-radius: 12px;
          }
          .sidebar li.profile{
            position: fixed;
            height: 60px;
            width: 78px;
            left: 0;
            bottom: -8px;
            padding: 10px 14px;
            background: var(--background);
            transition: all 0.5s ease;
            overflow: hidden;
          }
          .sidebar.open li.profile{
            width: 250px;
          }
          .sidebar li .profile-details{
            display: flex;
            align-items: center;
            flex-wrap: nowrap;
          }
          .sidebar li img{
            height: 45px;
            width: 45px;
            object-fit: cover;
            border-radius: 6px;
            margin-right: 10px;
          }
          .sidebar li.profile .name,
          .sidebar li.profile .job{
            font-size: 15px;
            font-weight: 400;
            color: var(--head_font_color);
            white-space: nowrap;
          }
          .sidebar li.profile .job{
            font-size: 12px;
          }
          .sidebar .profile #log_out{
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            background: var(--background);
            width: 100%;
            height: 60px;
            line-height: 60px;
            border-radius: 0px;
            transition: all 0.5s ease;
          }
          .sidebar.open .profile #log_out{
            width: 50px;
            background: none;
          }
          .home-section{
            width: 100%;
            position: relative;
            background-image: linear-gradient(25deg, white,whitesmoke,var(--background));
            min-height: 100vh;
            top: 0;
            left: 78px;
            width: calc(100% - 78px);
            transition: all 0.5s ease;
            z-index: 2;
          }
          .sidebar.open ~ .home-section{
            left: 78px;
            width: calc(100% - 78px);
          }
          .home-section .text{
            display: inline-block;
            color: #11101d;
            
            margin:5%;
           width: 97%;
          }
          .text h1{
            font-size: 2rem;
            font-weight: 500;
          }
          .profile_icon{
            width: 200px;
            height: 200px;
            background-color: var(--background);
            font-size: 149px;
            padding: 5px;
            text-align: center;
            border-radius: 50%;
            font-weight: bolder;
            font-family: times;
              box-shadow: 2px 35px 45px red;
          }
          .full_profile{
            margin-top: 25px;
            width: 100%;
            display: flex;
            padding: 20px;
            justify-content: space-around;
            background-image: linear-gradient(25deg,var(--background),whitesmoke,white);

          }
          .full_profile .from_get{
            padding: 5px 15px;
            font-size:1rem;
          
          }
          .left_part{
            width: 30%;

          }
          .right_part{
            width: 30%;

          }
          @media (max-width: 920px) {
            .sidebar li .tooltip{
              display: none;
            }
            .profile_icon{
              order:  1;
              margin: auto;
              box-shadow: 2px 35px 45px red;
            }
            .full_profile{
              font-size: 1.2rem;
              width: 100%;
              flex-direction: column;
            }
            .left_part{
              margin-top:25px; 
              order: 2;
              width: 100%;
            }
            .right_part{
              margin-top: 25px;
              order: 3;
              width: 100%;
            }
          }
          .btn{
            padding: 3px;
          }
           @media (max-width: 400px) {
          }
          .home-section .text{
            display: inline-block;
            color: #11101d;
            font-size: 12px;
            font-weight: 500;
            margin: 8px
          }
          }
    </style>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name"><b>S</b>et<b>P</b>lacement<b>.</b></div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="std_dashboard.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="std_update.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Update profile</span>
       </a>
       <span class="tooltip">update Profile</span>
     </li>
     <li>
       <a href="std_massage.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Messages</span>
       </a>
       <span class="tooltip">Messages</span>
     </li>
     <li>
       <a href="std_prv_job.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Applied Job</span>
       </a>
       <span class="tooltip">Applied Job</span>
     </li>
     <li>
       <a href="std_job_apply.php">
         <i class='bx bxs-shopping-bags'></i>
         <span class="links_name">Jobs for Apply </span>
       </a>
       <span class="tooltip">Jobs For Apply</span>
     </li>
     <li>
       <a href="std_offer.php">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Offers</span>
       </a>
       <span class="tooltip">Offer from company</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <i class='bx bxs-user-pin'></i>
           <div class="name_job">
             <div class="name"><?php echo $_SESSION['user_name'];?></div>
             <div class="job">Student</div>
           </div>
         </div>
         <a href="../log_out.php">
         <i class='bx bx-log-out' id="log_out" ></i></a>
     </li>
    </ul>
  </div>
  <section class="home-section">
      <div class="text"><h1>OFFER FOR YOU </h1><hr>    
<?php
   try {
     $rollNo=$_SESSION['user_id'];
    $stmt=$conn->query("SELECT * FROM setplacement.offers s WHERE s.rollNo=$rollNo ");
    if($stmt ->rowcount() > 0){
      while ($set=$stmt->fetch()) {
       // print_r($set);
        $job_id= $set['job_id'];
        $offerlastdate=$set['offerlastdate'];
        try{
        $stmt1=$conn->query("SELECT * FROM setplacement.job s WHERE s.job_id=$job_id");
          ?>
          <table>
            <tr>
              <th>Profile Name</th>
              <th>Company</th>
              <th>ctc</th>
              <th>type of job</th>
              <th>Last date to joining</th>
            </tr>
<?php
        if($stmt1->rowcount()>0){
          while($set1=$stmt1->fetch()){
            //print_r($set1);
            $cmp_id=$set1['cmp_id'];
            $rec_id=$set1['rec_id'];
            // rec_key to get rec_ deatils
          try {
              $stmt=$conn->query("SELECT * FROM SetPlacement.recomendation r WHERE r.rec_id=\"$rec_id\"  ");
            if($stmt->rowcount() > 0){
              while ($set2=$stmt->fetch()) {
                      $profile=$set2['recom_word'];
                    }
                  }                    
              } catch (Exception $err) {
                  echo $err->getMessage();
              }
              //comp details
            try {
                  $stmt2=$conn->query("SELECT * FROM setplacement.company c WHERE c.cmp_id=$cmp_id ");
                  if($stmt2->rowcount() > 0){
                    while ($set2=$stmt2->fetch()) {

                      $name=$set2['cmp_name'];
              
                    }
                  }                    
                } catch (Exception $err) {
                  echo $err->getMessage();
                }?>
            <tr>
                  <td><?php echo $profile ;?></td>
                  <td><?php echo $name;  ?></td>
                  <td><?php echo $set1['ctc'];?></td>
                  <td><?php echo $set1['typeJob']; ?></td>
                  <td><?php  echo $set['offerlastdate'];?></td>
              </tr>
<?php

          }
          echo "</table></div>";
        }

        }catch(Exception $err){
          echo $err->getMessage();
        }

      }
    }
    else{
    	echo "<div>No OFFER for You form companys</div>";
    }
    } catch (Exception $e) {
    echo $e->getMessage();
  }
  ?>


</div>
  </section>

  <script type="text/javascript">
    /*for side bar in dashboard*/
      let sidebar = document.querySelector(".sidebar");
      let closeBtn = document.querySelector("#btn");
      let searchBtn = document.querySelector(".bx-search");

      closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();//calling the function(optional)
      });

      searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
      });

      // following are the code to change sidebar button(optional)
      function menuBtnChange() {
       if(sidebar.classList.contains("open")){
         closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
       }else {
         closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
       }
      }
  </script>

</body>
</html>
