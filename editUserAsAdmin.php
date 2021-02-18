<?php 

include_once 'config.php';

$id = $_GET["user_id"];
$user_query = "Select * from userTable where idUser=$id";
$user_result = mysqli_query($con, $user_query);
$user_row = mysqli_fetch_assoc($user_result);

$Name = $user_row["Name"];
$Password = $user_row["Password"];
$Host = $user_row["NameOfHost"];
$Birth = $user_row["DateOfBirth"];
$Arrival = $user_row["DateOfArrival"];
$Leave = $user_row["DateOfLeave"];
$Residence = $user_row["PlaceOfResidence"];
$Phone = $user_row["PhoneNumber"];
$Pay = $user_row["payed"];

if(isset($_POST['but_submit'])){
$new_Name = $_POST["Name"];
$new_Password = $_POST["Password"];
$new_Host = $_POST["NameOfHost"];
$new_Birth  = $_POST["DateOfBirth"];
$new_Arrival = $_POST["DateOfArrival"];
$new_Leave = $_POST["DateOfLeave"];
$new_Residence = $_POST["PlaceOfResidence"];
$new_Phone = $_POST["PhoneNumber"];
$new_Pay = $_POST["payed"];


$user_query = "UPDATE userTable SET idUser=$id, Name='$new_Name', Password='$new_Password', NameOfHost='$new_Host', DateOfBirth='$new_Birth', DateOfArrival='$new_Arrival', DateOfLeave='$new_Leave', PlaceOfResidence='$new_Residence', PhoneNumber='$new_Phone', payed='$new_Pay' WHERE idUser=$id"; 
$user_result = mysqli_query($con, $user_query);
$user_row = mysqli_fetch_assoc($user_result);
header("Location: inAdmin.php");



}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LU - Immigrant Manager</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>  
<body>
<div class="container" style="background:lightblue; border:50px solid blue;
                            border-radius: 50px;
                            padding:30px; margin:auto;
                            display: flex; justify-content: center; 
                            align-items: center; height: 100vh">
    <form method="POST" action="">
                <div id="div_userinfo">
                    <h1>Edit Info</h1>
                    <div>
                        ID:<br>  
                        <input type="text" class="textbox" id="txt_uid" name="ID" value="<?php echo $id; ?>"/>
                    </div>
                    <div>
                        Name:<br> 
                        <input type="text" class="textbox" id="txt_pwd_user" name="Name"  value="<?php echo $Name; ?>"/>
                    </div>
                    <div>
                        Password:<br> 
                        <input type="text" class="textbox" id="txt_uid" name="Password"  value="<?php echo $Password; ?>" />
                    </div>
                    <div>
                        Host:<br> 
                        <input type="text" class="textbox" id="txt_pwd_user" name="NameOfHost"  value="<?php echo $Host; ?>"/>
                    </div>
                    <div>
                        Birth:<br> 
                        <input type="date" class="textbox" id="txt_uid" name="DateOfBirth"  value="<?php echo $Birth; ?>"/>
                    </div>
                    <div>
                       Arrival:<br> 
                       <input type="date" class="textbox" id="txt_pwd_user" name="DateOfArrival"  value="<?php echo $Arrival; ?>"/>
                    </div>
                    <div>
                       Departure:<br> 
                       <input type="date" class="textbox" id="txt_uid" name="DateOfLeave"  value="<?php echo $Leave; ?>"/>
                    </div>
                    <div>
                       Residence:<br> 
                       <input type="text" class="textbox" id="txt_pwd_user" name="PlaceOfResidence"  value="<?php echo $Residence; ?>"/>
                    </div>
                    <div>
                       Phone:<br> 
                       <input type="text" class="textbox" id="txt_uid" name="PhoneNumber"  value="<?php echo $Phone; ?>" />
                    </div>
                    <div>
                        Payment:<br> 
                        <input type="text" class="textbox" id="txt_pwd_user" name="payed"  value="<?php echo $Pay; ?>"/>
                    </div>
                    <div>                         <input type="submit" value="Submit" name="but_submit" id="but_submit"  class="btn btn-success"/>                     </div>
                </div>
            </form>
            </div>
</body>
</html>