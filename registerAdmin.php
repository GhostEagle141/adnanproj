<?php
include('config.php');
$_SESSION['error']="";
if(isset($_POST['but_submitAdmin'])){

    
    $idAdmin = $_POST['txt_idAdmin'];  
    $password = $_POST['txt_pwdAdmin'];  
    $passwordCheck = $_POST['txt_pwdCheckAdmin'];
    $name = $_POST['txt_aName'];    

if($password == $passwordCheck){
    if (($idAdmin != "" && $password != "") && ($name != "" && $passwordCheck != "") ){

        $sql_query = "INSERT INTO adminTable (`idAdmin`,`password`,`Name` )VALUES($idAdmin,`$password`,`$name`)";

        if (mysqli_query($con,$sql_query)) {
            $_SESSION['error'] = "Welcome home ".$name.", press go back home and log in";
        }else{
            $_SESSION['error'] = "Error: ".mysqli_error($con);;
        }

    }
    else{
        $_SESSION['error'] = "empty fields";
    }

}
else{
    $_SESSION['error'] = "Passwords do not match";
}
}
if((isset($_POST['but_Logout']))){
    session_destroy();
    header('Location: index.php');   
}

if((isset($_POST['but_gb']))){
    header('Location: adminSelection.php');   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RA - Immigrant Manager</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>  
<body><div class="container"class="container" style="background:lightblue; border:50px solid blue;
                            border-radius: 50px;
                            padding:30px; margin:auto;
                            display: flex; justify-content: center; 
                            align-items: center; height: 100vh">
    <form method="post" action="">
                <div id="div_register">
                    <h1>Register an Admin</h1>
                    <?php  echo $_SESSION['error'];?>
                    <form method="post" action="">
                    <div>
                        <input type="submit" value="Log Out" name="but_Logout" id="but_Logout" style="margin:10px" class="btn btn-dark"/> </div>
            </form>
                    <div>name<br>
                        <input type="text" class="textbox" id="txt_aName" name="txt_aName" placeholder="Name" />
                    </div>
                    <div>password<br>
                        <input type="password" class="textbox" id="txt_pwdAdmin" name="txt_pwdAdmin" placeholder="Password"/>
                    </div>
                    <div>password check<br>
                        <input type="password" class="textbox" id="txt_pwdCheckAdmin" name="txt_pwdCheckAdmin" placeholder="Password"/>
                    </div>
                    <div>id<br>
                        <input type="number" class="textbox" id="txt_idAdmin" name="txt_idAdmin" placeholder="ID"/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submitAdmin" id="but_submitAdmin" />
                    </div>
                </div>
            </form>
            <form method="post" action="">
                    <div>
                        <input type="submit" value="Go back" name="but_gb" id="but_gb" style="margin:10px" class="btn btn-dark"/> </div>
            </form>


</body>
</html>