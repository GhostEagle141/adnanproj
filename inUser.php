<?php
include('config.php'); 
 if(isset($_SESSION['uid'])) {
   $uid = $_SESSION['uid'];

   $query = "SELECT * FROM userTable WHERE idUser = '".$uid ."'";
   if ( $result = mysqli_query($con, $query) ) {
    $result = mysqli_query($con, $query);
    
    $row = mysqli_fetch_array ($result);

}

if(isset($_POST['but_submit'])){
    
    $name = $_POST['txt_name'];
    $pwd = $_POST['txt_pwd'];
    $hn = $_POST['txt_hn'];
    $por = $_POST['txt_por'];
    $pn = $_POST['txt_pn'];
    $rawdob = htmlentities($_POST['dob']);
    $dob = date('Y-m-d', strtotime($rawdob));
    $rawdoa = htmlentities($_POST['doa']);
    $doa = date('Y-m-d', strtotime($rawdoa));
    $rawdol = htmlentities($_POST['dol']);
    $dol = date('Y-m-d', strtotime($rawdol));
    $payed = (isset($_POST['payed'])) ? 1 : 0;

    if($name != "" &&
    $uid != "" &&
    $pwd != "" &&
    $hn != "" &&
    $por != "" &&
    $dob != "" &&
    $doa != "" &&
    $dol != "" &&
    $pn != "" &&
    $payed != "" ){

$query =         "UPDATE userTable
                  SET `Name` = '$name',
                  `Password` = '$pwd',
                  NameOfHost = '$hn',
                  PhoneNumber='$pn',
                  PlaceOfResidence = '$por',
                  DateOfBirth = '$dob',
                  DateOfArrival = '$doa',
                  DateOfLeave = $dol,
                  payed = '$payed'
                  WHERE idUser = '$uid' ";
                  
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                header('Location: inUser.php');
                $_SESSION['error'] ="Update Successful";
}
else echo "empty fields";
}
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
    <title>IU - Immigrant Manager</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>  
<body><div class="container"class="container" style="background:lightblue; border:50px solid blue;
                            border-radius: 50px;
                            padding:30px; margin:auto;
                            display: flex; justify-content: center; 
                            align-items: center; height: 100vh">
    
<form method="post" action="">
                <div id="div_login">
                    <h1>Login as user <?php echo $_SESSION['uid'];?></h1>
                    <?php if($row['payed']=='0') {echo "You haven't payed yet, please head to the nearest immigration office to pay";}?>
                    <?php echo $_SESSION['error'];?>
                   
                    <div>
                        name<br>
                        <input type="text" class="textbox" id="txt_name" name="txt_name" placeholder="Name" value="<?php echo $row['Name']?>"/>
                    </div>
                    <div>
                        password<br>
                        <input type="password" class="textbox" id="txt_pwd" name="txt_pwd" placeholder="Password" value="<?php echo $row['Password']?>"/>
                    </div>
                    <div>
                       phone number:<br> 
                       <input type="number" class="textbox" id="txt_pn" name="txt_pn"  value="<?php echo $row['PhoneNumber'] ?>" />
                    </div>
                    <div>
                        host name<br>
                        <input type="text" class="textbox" id="txt_hn" name="txt_hn" placeholder="Host Name" value="<?php echo $row['NameOfHost']?>"/>
                    </div>
                    <div>
                        place of residence<br>
                        <input type="text" class="textbox" id="txt_por" name="txt_por" placeholder="Place Of Residence" value="<?php echo $row['PlaceOfResidence']?>"/>
                    </div>
                    <div>
                        date of birth<br>
                    <input type="date" id="dob" name="dob" value="<?php echo $row['DateOfBirth']?>">
                    </div>
                    <div>
                        date of arrival<br>
                    <input type="date" id="doa" name="doa" value="<?php echo $row['DateOfArrival']?>">
                    </div>
                    <div>
                        date of leave<br>
                    <input type="date" id="dol" name="dol" readonly value="<?php echo $row['DateOfLeave']?>">
                    </div>
                    <div>
                        payed
                        
                    <input type="checkbox" id="payed" name="payed" <?php if($row['payed']=='1') {echo 'checked="checked"';}?> onclick="return false;">
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" 
                        />
                    </div>
                </div>
            </form>
            <form method="post" action="">
                    <div>
                        <input type="submit" value="Log Out" name="but_Logout" id="but_Logout" style="margin:10px" class="btn btn-dark"/> </div>
            </form>

</body>
</html>