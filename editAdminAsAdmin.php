<?php 

include('config.php');

$id = $_GET["admin_id"];
$admin_query = "Select * from adminTable where idAdmin=$id";
$admin_result = mysqli_query($con, $admin_query);
$admin_row = mysqli_fetch_assoc($admin_result);

$OName = $admin_row["Name"];
$OPassword = $admin_row["password"];

if(isset($_POST['but_submit']) && isset($_POST["txt_name"]) && isset($_POST["txt_password"])){
    $new_Name = $_POST["txt_name"];
    $new_Password = $_POST["txt_password"];
if(isset($new_Name) && isset($new_Password)){
  $query = "UPDATE adminTable SET Name = $new_Name,password = $new_Password WHERE idAdmin=$id";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                header('Location: inAdmin.php');
}
if((isset($_POST['but_Logout']))){
    header('Location: inAdmin.php');   
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EA - Immigrant Manager</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>  
<body>
<div class="container" style="background:lightblue; border:50px solid blue;
                            border-radius: 50px;
                            padding:30px; margin:auto;
                            display: flex; justify-content: center; 
                            align-items: center; height: 100vh">
    <form method="POST" action="">
                <div id="div_admininfo">
                    <h1>Edit Info</h1>
                    <div>
                        ID:<br>  
                        <input type="text" class="textbox" id="txt_aid" name="ID" readonly value="<?php echo $id; ?>"/>
                    </div>
                    <div>
                        Name:<br> 
                        <input type="text" class="textbox" id="txt_name" name="Name"  value="<?php echo $OName; ?>"/>
                    </div>
                    <div>
                        Password:<br> 
                        <input type="text" class="textbox" id="txt_password" name="Password"  value="<?php echo $OPassword; ?>" />
                    </div>
                </div>
                <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                    </div>
                </form>
                <form method="post" action="">
                        <input type="submit" value="Log Out" name="but_Logout" id="but_Logout" style="margin:10px" class="btn btn-dark"/> </div>
            </form>
            </div>
</body>
</html>