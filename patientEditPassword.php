<?php
session_start();
if(!isset($_SESSION['patient_active'])){
    header("location: index.php");
    exit;
}
require 'php/patientActivelogin.php';
require 'php/generic.php';
$row_g = mysqli_fetch_array($search_general);
$rowName = explode(" ",$row_g['g_Sitename']);
$rowNameFirst = $rowName[0];
array_shift($rowName);
$rowSecondName = implode(" ",$rowName);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title><?php echo $row_g['g_Sitename']; ?></title>

     <link rel="stylesheet" href="css/Desktop/Admin-adminGlobal.css">
     <link rel="stylesheet" href="css/Desktop/Patient-patientEditPassword.css">

  
     <link rel="shortcut icon" type="image/png" href="upload_img_generic/<?php echo $row_g['g_LogoDark']; ?>"> 

     <link rel="stylesheet" href="AnimBackend/jquery.css">
     <script src="AnimBackend/jquery.js"></script>
     <script src="AnimBackend/jquery1.js"></script>

  </head>

<body>

<div class="for_desktop"><!--For Descktop div-->

<div id="left" class="side_navbar"><!-- Left part-->
            <div id="left_bar">
                    <div id="logo_bar" class="left_bar1">
                    <img src="upload_img_generic/<?php echo $row_g['g_LogoLight']; ?>" id="logo_img">
                        <img src="images/icons/dashboard/hamburger_dashboard.png" id="burger_img" title="Maximize" onclick="maximize_navbar()">
                    </div>

                    <div id="icons_navbar" class="left_bar2"><!-- icons navbar container -->
                        <div id="icons_container" class="dash_navbar" onmouseover="hover_navbar('dash_navbar')" onmouseout="mouseout_navbar('dash_navbar')" ><img src="images/icons/dashboard/dashboard.png" title="Dashboard"></div>
                        <div id="icons_container" class="profile_navbar" style="background-color: #5B8DFF;"><img src="images/icons/dashboard/profile.png" title="Profile"></div>
                        <div id="icons_container" class="staff_navbar" onmouseover="hover_navbar('staff_navbar')" onmouseout="mouseout_navbar('staff_navbar')"><img src="images/icons/dashboard/staff.png" title="Staff"></div>
                        <div id="icons_container" class="appointment_navbar" onmouseover="hover_navbar('appointment_navbar')" onmouseout="mouseout_navbar('appointment_navbar')"><img src="images/icons/dashboard/appointment.png" title="Appointment"></div>
                  
                        <div id="icons_container" style="visibility:hidden;"></div>
                        <div id="icons_container" style="visibility:hidden;"></div>
                    </div><!-- End icons navbar container -->

                    <div id="profile_navbar" class="left_bar3"><!-- profile navbar container -->
                        <div id="profile_container" title="Sign out" onclick="logoutPatient()">
                            <img src="images/icons/dashboard/logout.png">
                        </div>
                    </div><!-- End profile navbar container -->


            </div>
            <div id="right_bar">

                    <div id="logo_bar" class="right_navbar"><!-- Top Logo container -->
                        <div id="logo_text">
                            <p class="a">ROBLES</p>
                            <p class="b">Maternity Clinic</p>
                        </div>
                        <img src="images/icons/dashboard/largburger_dashboard.png" title="Minimize" onclick="minimize_navbar()">
                    </div><!-- End of for logo container -->

                    <div id="icons_navbar" class="right_navbar"><!-- icons navbar container -->
                        <div id="icons_container" class="dash_navbar" onmouseover="hover_navbar('dash_navbar')" onmouseout="mouseout_navbar('dash_navbar')">Dashboard</div>
                        <div id="icons_container" class="profile_navbar" style="background-color: #5B8DFF;">Profile</div>
                        <div id="icons_container" class="staff_navbar" onmouseover="hover_navbar('staff_navbar')" onmouseout="mouseout_navbar('staff_navbar')">Staff</div>
                        <div id="icons_container" class="appointment_navbar" onmouseover="hover_navbar('appointment_navbar')" onmouseout="mouseout_navbar('appointment_navbar')">Appointment</div>
                  
                        <div id="icons_container" style="visibility:hidden;"></div>
                        <div id="icons_container" style="visibility:hidden;"></div>
                    </div><!-- End icons navbar container -->

                    <div id="profile_navbar" class="right_navbar"><!-- profile navbar container -->
                        <div id="profile_container" class="profile_right_cont" onclick="logoutPatient()">
                                <div id="name_profile">
                                    <p id="name_text">Sign Out</p>
                                </div>
                                
                        </div>
                    </div><!-- End profile navbar container -->
            </div>
    </div><!-- End of Left part-->



    <div id="right" class="right_content_dashboard">
            <div id="dashboard_top">
                <div id="dash_left">Profile</div>
                <div id="dash_right">
                    <?php  //php for displaying the hover icon 
                        $row = mysqli_fetch_array($search_resulthover);   
                    ?>
                    <div id="profile_container" title="Visit Profile" onclick="profile()">
                        <img src="upload_img/<?php echo $row['profile_photo']; ?>" id="profile_img" onerror="this.src='upload_img/account.png'">
                        <div id="name_profile">
                            <p id="name_text"><?php echo $row['fname']; ?></p>
                            <p id="role_text">Patient Account</p>
                        </div>
                    </div><!-- End of profile container -->
                </div>
            </div><!-- End of dashboard top -->

            <div id="profile_content">
                <div id="left_profile">
                    <div id="layer1">
                        <div id="left_layer1">
                            <div id="img_container">
                                <img src="upload_img/<?php echo $row['profile_photo']; ?>" id="profile_photo" onerror="this.src='upload_img/account.png'">
                                <img src="images/icons/upload_file_icon.png" id="file_icon">
                            </div>
                        </div>
                        <div id="right_layer1">
                            <p id="name_text_profile"><?php echo $row['fname']." ".$row['lname'] ; ?></p>

                            <div id="txt_cont">
                            <div id="l_text">
                                <p class="label_text_profile">Patient id :</p>
                                <p class="label_text_profile">Username :</p>
                                <p class="label_text_profile">Email :</p>
                                <p class="label_text_profile">Contact No. :</p>
                            </div>
                            <div id="r_text">
                                <p><?php echo $row['id']; ?></p>
                                <p><?php echo $row['username']; ?></p>
                                <p><?php echo $row['email']; ?></p>
                                <p><?php echo $row['contact']; ?></p>
                            </div>
                            </div>

                        </div>
                    </div>

                    <div id="layer2">
                        <div id="edit_pass_header">
                            <img src="images/icons/edit_password.png">
                            Change Password
                        </div>
                        <form action="javascript:void(0)" method="post" id="ajax-form_patient_editpassword">
                            <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                        <!---------------------------->
                        <div id="inp_cont">
                            <div id="container">
                                Old Password 
                                <div class="old_password" onkeyup="remove_adminpassborder('old_password')">
                                    <input type="password" id="old_pass" placeholder="***********" name="old_pass">
                                    <img src="images/icons/show.gif" title="Show Password" id="hide_pass1" onclick="togglePassword1()">
                                    <img src="images/icons/hide.gif" title="Hide Password" id="show_pass1" onclick="togglePassword1()">
                                </div>
                            </div>
                        </div>
                        <!---------------------------->
                        <div id="inp_cont">
                            <div id="container">
                                New Password 
                                <div class="new_password" onkeyup="remove_adminpassborder('new_password')">
                                    <input type="password" id="new_pass" placeholder="***********" name="new_pass">
                                    <img src="images/icons/show.gif" title="Show Password" id="hide_pass2" onclick="togglePassword2()">
                                    <img src="images/icons/hide.gif" title="Hide Password" id="show_pass2" onclick="togglePassword2()">
                                </div>
                            </div>
                        </div>
                         <!---------------------------->
                        <div id="inp_cont">
                            <div id="container">
                                Confirm New Password 
                                <div class="confirm_password" onkeyup="remove_adminpassborder('confirm_password')">
                                    <input type="password" id="confirm_pass" placeholder="***********" name="confirm_pass">
                                    <img src="images/icons/show.gif" title="Show Password" id="hide_pass3" onclick="togglePassword3()">
                                    <img src="images/icons/hide.gif" title="Hide Password" id="show_pass3" onclick="togglePassword3()">
                                </div>
                            </div>
                        </div>
                        <!---------------------------->


                        <div id="validation_password">
                            <img src="images/icons/error_input.png">
                            <span id="validation_password_text">.</span>
                        </div>
                        
                        <center><Button>Save Changes</Button></center>
                        </form>
                    </div><!--End of layer2-->
                </div>
                <?php
                    $apiKey = "dadee94a86d93919d257e4735ca6aa92";
                    $cityId = "CITY ID";
                    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=1723066&lang=en&units=metric&APPID=" . $apiKey;

                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_VERBOSE, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $response = curl_exec($ch);

                    curl_close($ch);
                    $data = json_decode($response);
                    $currentTime = time();
                    $temp_current = round($data->main->temp);
                    date_default_timezone_set('Asia/Manila');
                ?>
                <div id="right_profile">
                        <div id="layer1" class="to_change_bg_layer1">
                            <div id="left">
                                <p><?php echo $temp_current; ?>&deg;</p>
                            </div>
                            <div id="right">
                                <p id="date"><?php echo date("F j, Y") ?></p>
                                <p id="time"><?php echo date("h:i A") ?></p>
                            </div>
                        </div>

                        <div id="layer1_night">
                            <div id="left">
                                <p><?php echo $temp_current; ?>&deg;</p>
                            </div>
                            <div id="right">
                                <p id="date"><?php echo date("F j, Y") ?></p>
                                <p id="time"><?php echo date("h:i A") ?></p>
                            </div>
                        </div>


                        <div id="layer2">
                            <div id="box_1" onclick="edit_profile()">
                                <div id="left">
                                    <img src="images/icons/edit_profile.png" alt="">
                                </div>
                                <div id="right">
                                    <p id="text1">Edit Profile</p>
                                    <p id="text2">Update Your Details</p>
                                </div>
                            </div>

                            <div id="box_1" onclick="edit_password()" style="background-color:#e8e8e8;">
                                <div id="left">
                                    <img src="images/icons/edit_password.png" alt="">
                                </div>
                                <div id="right">
                                    <p id="text1">Change Password</p>
                                    <p id="text2">Update Your Password</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

    </div><!-- right_content_dashboard -->

</div> <!-- End of for_desktop div -->

<!--Sweetalert-->
<div id="sweetalert_container">
    <div id="succes_alert">
        <div id="alert_div">
        <img src="images/gif/succes.gif" id="gif_alert">
        <p id="thankyou" class="header_text_validation_password">Success!</p>
        <p class="message_alert">Your password has been updated.</p>
        <button id="close_alert"  onclick="close_alertpassword()" class="close_btn_alert">OK</button>
        </div>
    </div>
</div>  


</body>

</html>


<!-- Jquery for tooltips-->
<script src="jquery/tooltip.js"></script>
<!-- Jquery for termsAndprivacy-->
<script src="jquery/termsAndprivacy.js"></script>
<!-- Jquery for adminAnim-->
<script src="jquery/adminAnim.js"></script>

<!-- Script for side navbar -->
<script src="js/sidenavbar_Patient.js"></script>

<!--ajax for logut-->
<script src="ajax/logoutAdmin.js"></script>
<!--ajax for admin edit password-->
<script src="ajax/patientEditPassword.js"></script>


<?php
date_default_timezone_set('Asia/Manila');
$hour = date('H', time());

    if($hour >= 18){
?>
        <style>
            .right_content_dashboard #profile_content #right_profile #layer1_night{
                display: flex;
            }
            .right_content_dashboard #profile_content #right_profile #layer1{
                display: none;
            }
        </style>
 <?php       
    }
    else if($hour <= 17){
 ?>       
         <style>
            .right_content_dashboard #profile_content #right_profile #layer1_night{
                display: none;
            }
            .right_content_dashboard #profile_content #right_profile #layer1{
                display: flex;
            }
        </style>
<?php 
    }
?>


<script>
function togglePassword1(){
    var x = document.getElementById("old_pass");
    if (x.type === "password") {
      document.getElementById("show_pass1").style.display = "block";
      document.getElementById("hide_pass1").style.display = "none";
      x.type = "text";
    } else {
      document.getElementById("show_pass1").style.display = "none";
      document.getElementById("hide_pass1").style.display = "block";
     x.type = "password";
     }
}
function togglePassword2(){
    var x = document.getElementById("new_pass");
    if (x.type === "password") {
      document.getElementById("show_pass2").style.display = "block";
      document.getElementById("hide_pass2").style.display = "none";
      x.type = "text";
    } else {
      document.getElementById("show_pass2").style.display = "none";
      document.getElementById("hide_pass2").style.display = "block";
     x.type = "password";
     }
}
function togglePassword3(){
    var x = document.getElementById("confirm_pass");
    if (x.type === "password") {
      document.getElementById("show_pass3").style.display = "block";
      document.getElementById("hide_pass3").style.display = "none";
      x.type = "text";
    } else {
      document.getElementById("show_pass3").style.display = "none";
      document.getElementById("hide_pass3").style.display = "block";
     x.type = "password";
     }
}
</script>