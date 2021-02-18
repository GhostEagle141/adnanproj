<?php
include('config.php');

if(isset($_POST['but_submitAdmin'])){

    
    $aid = $_POST['txt_aid'];  
    $password = $_POST['txt_pwdAdmin'];  
  
        $aid = stripcslashes($aid);  
        $password = stripcslashes($password);  
        $aid = mysqli_real_escape_string($con, $aid);  
        $password = mysqli_real_escape_string($con, $password);  

    if ($aid != "" && $password != ""){

        $sql_query = "select count(*) as cntAdmin from adminTable where idAdmin='".$aid."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntAdmin'];
        $_SESSION['error']="";
        if($count > 0){
            $_SESSION['aid'] = $aid;
            header('Location: adminSelection.php');
        }else{
            $_SESSION['error'] ="Wrong id or password, please try again";
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
    <title>LA - Immigrant Manager</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>  
<body><div class="container"class="container" style="background:lightblue; border:50px solid blue;
                            border-radius: 50px;
                            padding:30px; margin:auto;
                            display: flex; justify-content: center; 
                            align-items: center; height: 100vh">
    <form method="post" action="">
                <div id="div_login">
                    <h1>Login as Admin</h1>
                    <?php  if(isset($_SESSION['error'])){echo $_SESSION['error'];}?>
                    <div>
                        <input type="text" class="textbox" id="txt_aid" name="txt_aid" placeholder="ID" />
                    </div>
                    <div>
                        <input type="password" class="textbox" id="txt_pwdAdmin" name="txt_pwdAdmin" placeholder="Password"/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submitAdmin" id="but_submitAdmin" />
                    </div>
                </div>
            </form>
            <form method="post" action="">
                    <div>
                        <input type="submit" value="Log Out" name="but_Logout" id="but_Logout" style="margin:10px" class="btn btn-dark"/> </div>
            </form>
</body>
</html>