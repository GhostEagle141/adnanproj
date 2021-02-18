
<?php
include('config.php');
$_SESSION['error'] = "";
if(isset($_POST['txt_uid'])&&isset($_POST['txt_pwd_user'])){
    $uid = $_POST['txt_uid'];  
    $password = $_POST['txt_pwd_user'];  
    $_SESSION['error']="";
        $uid = stripcslashes($uid);  
        $password = stripcslashes($password);  
        $uid = mysqli_real_escape_string($con, $uid);  
        $password = mysqli_real_escape_string($con, $password);  

    if ($uid != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from userTable where idUser='".$uid."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];
        if($count > 0){
            $_SESSION['uid'] = $uid;
            header('Location: inUser.php');
        }else{
            $_SESSION['error'] = "Invalid id or password";
        }

    }
    else $_SESSION['error'] = "Empty credentials" ;
}

if((isset($_POST['but_Logout']))){
    session_destroy();
    header('Location: index.php');   
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
<body><div class="container"class="container" style="background:lightblue; border:50px solid blue;
                            border-radius: 50px;
                            padding:30px; margin:auto;
                            display: flex; justify-content: center; 
                            align-items: center; height: 100vh">
    <form method="POST" action="">
                <div id="div_login">
                    <h1>Login as User</h1>
                    <?php  echo $_SESSION['error'];?>
                    <div>
                        <input type="text" class="textbox" id="txt_uid" name="txt_uid" placeholder="ID" />
                    </div>
                    <div>
                        <input type="password" class="textbox" id="txt_pwd_user" name="txt_pwd_user" placeholder="Password"/>
                    </div>
                    <div>                         
                    <input type="submit" value="Submit" name="but_submit" id="but_submit"  class="btn btn-success"/>                                            
                    <input type="submit" value="Log Out" name="but_Logout" id="but_Logout"  class="btn btn-dark"/>                     
                    </div>
                </div>
            </form>
</body>
</html>