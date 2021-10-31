<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="Author" content="Abhijit Gayen" >
     <meta name="description" content="Abhijit Gayen SetPlacement website for placement and zeroencode.web42.io">
     
        <!-- =====BOX ICONS===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link href='https://unpkg.com/boxicons@2.0.8/css/boxicons.min.css' rel='stylesheet'>
        <style type="text/css">
            :root{
                --background:#45b6f7;
                --header:#4a555c;
                --footer: #131521;
                --head_font_color: white;
                --foot_font_color: whitesmoke;
                --head_font: 1.3rem;
                --body-font: 'Open Sans', sans-serif;
            }
            html{
                font-family: var(--body-font);
            }
            *{
            padding: 0;
            margin: 0;
            }

            .header{
                z-index: 10;
                width: 100%;
                position: fixed;
                padding: 15px 0px 15px 20px;
                font-size: var(--head_font);
                color: var(--head_font_color);
                background-color: var(--header);
                display: flex;
                justify-content: space-between;
            }
            .header .head_icon , .footer .head_icon{
                font-variant: small-caps;
                font-family: Times;
            }
            .header .head_icon b,.footer .head_icon b{
                color: var(--background);
            }
            .nav_head{
                color: var(--head_font_color);
                width: 70%;
                display: flex;
                justify-content: space-around;
                height: 25px;
            }
            .nav_head div a{
                text-decoration: none;
                color: var(--head_font_color);
            }
            .nav_head div:hover a::after {
                background-color: var(--background);
                content: "";
                display: block;
                width: 100%;
                text-align: center;
                height: 3px;
            }
            /*footer data start*/
            .footer{
                z-index:10;
                background-color: var(--footer);
                width: 100%;
            }
            .footer .footer__social{
                font-size: 1.5rem;
                color: var(--body-font);
            }
            .footer__container{
                color: var(--foot_font_color);
                width: 100%;
                display: flex;
                justify-content: space-around;
            }
            .footer__container li a{
                text-decoration: none;
                color: var(--foot_font_color);
            }
            .footer .head_icon {
                font-size: 21px;
            }
            .footer__copy{
                color: var(--foot_font_color);
                font-variant: small-caps;
                font-size: 15px;
                text-align: right;
                padding: 10px;
            }
            .footer__copy a{
                color: var(--background);
            }
            /*footer end data*/
            @media screen and (min-width:860px) {
                .nav__toggle{
                    display: none;
                }
            }

            @media screen and (max-width: 860px){
                .show{
                    background-color:var(--header);
                    padding: 85px 0px 20px 0px;
                    flex-direction: column;
                    height: 40vh;
                    justify-content: space-around;
                    transition: 5ms;
                    position: relative;
                    right: 0%;
                }
                .nav_head{
                    position: absolute;
                    right:0%;top:-40%;
                }
                .nav_head div {
                    font-variant: small-caps;
                    overflow: hidden;
                    text-align: center;
                    height: 25px;
                    width: 50%;
                }
                .nav__toggle{
                    position: absolute;
                    right: 45px;
                    color: var(--head_font);
                    font-size: 1.9rem;
                    cursor: pointer;
                }
                .nav_head div:hover  {
                background-color: var(--background);
                display: block;
                width: 100%;
                transition: 2s;
            }
            }
            @media screen and (max-width: 720px){
                    .footer__container{
                    flex-direction: column;
                    justify-content: space-around;
                    height: 456px;
                    text-align: center;

                }
            }
            .home_all{
                     background-image: linear-gradient(white,var(--background));
                /*background-color:var(--background) ;*/
                z-index: 1;
                height: 100vh;
            }



        </style>
     <title>SetPlacement</title>
</head>
<body>
     <section class="header">
          <div class="head_icon"><b>S</b>et<b>P</b>lacement<b>.</b></div>
          <div class="nav_head" id="nav_head" >
               <div class="jobs"><a href="#">Jobs</a> </div>
               <div class="candidates"><a href="#">Candidates</a> </div>
               <div class="company"><a href="#">Company</a> </div>
               <div class="about_us"><a href="#">About Us</a></div>

               <?php
               if(isset($_SESSION['user_name'] )|| isset($_SESSION['email_id'])){
               echo'<div class="logt_out"><a href="log_out.php"><i class="bx bx-log-out" id="log_out" ></i> Log Out</a></div>';
                }
                else{
                 echo'<div class="login"><a href="log_in.php"><i class="bx bx-log-in"></i> Log in</a></div>';

                }

               ?>

                              
          </div>
          <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
        </div>
     </section>
     <div class="home_all">
          <div class="home_title">IITG Placement Protal
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
<?php
print_r($_SESSION);
?>
          </div>
     </div>






     
     <section class="footer">
            <div class="footer__container bd-grid">
                <div class="footer__content">
                <div class="head_icon"><b>S</b>et<b>P</b>lacement<b>.</b></div>
                    <span class="footer__description">placement <br>Protal</span>
                    <div>
                        <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                    </div>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Services</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Offers</a></li>
                        <li><a href="#" class="footer__link">Companies</a></li>
                        <li><a href="#" class="footer__link">About Us</a></li>
                        <li><a href="#" class="footer__link">Reserve your spot</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Information</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Event</a></li>
                        <li><a href="#" class="footer__link">Contact us</a></li>
                        <li><a href="#" class="footer__link">Privacy policy</a></li>
                        <li><a href="#" class="footer__link">Terms of services</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Address</h3>
                    <ul>
                        <li>Rahara</li>
                        <li>kolkata-70015</li>
                        <li>4897916654</li>
                        <li>setplacement@email.com</li>
                    </ul>
                </div>
            </div>

            <p class="footer__copy">&#169; 2021 <a href="https://agayen.github.io/" >Abhijit Gayen
            </a> . All right reserved</p>

     </section>
     <script type="text/javascript">
         
         /*===== MENU SHOW =====*/ 
        const showMenu = (toggleId, navId) =>{
             const toggle = document.getElementById(toggleId),
             nav = document.getElementById(navId)
         
             if(toggle && nav){
                 toggle.addEventListener('click', ()=>{
                     nav.classList.toggle('show')
                 })
             }
         }
         showMenu('nav-toggle','nav_head')
     </script>
     
</body>
</html>