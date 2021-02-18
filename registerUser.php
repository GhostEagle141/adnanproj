<?php
    include('config.php'); 
      
   if(isset($_POST['but_submit'])){
    $uid = $_POST['txt_uid'];
       $name = $_POST['txt_name'];
       $pwd = $_POST['txt_pwd'];
       $hn = $_POST['txt_hn'];
       $por = $_POST['txt_por'];
       $rawdob = htmlentities($_POST['dob']);
       $dob = date('Y-m-d', strtotime($rawdob));
       $rawdoa = htmlentities($_POST['doa']);
       $doa = date('Y-m-d', strtotime($rawdoa));
       $dol = date('Y-m-d', strtotime($doa. ' + 1 year'));
       $pn = $_POST['txt_pn'];
       $payed = (isset($_POST['payed'])) ? '1' : '0';
    if($name != "" &&
    $uid != "" &&
    $pwd != "" &&
    $hn != "" &&
    $por != "" 
    $rawdob != "" &&
    $dob != "" &&
    $rawdoa != "" &&
    $doa != "" &&
    $rawdol != "" &&
    $dol != "" &&
    $pn != "" &&
    $payed != "" ){

     $query = "INSERT INTO userTable
     (idUser,
     `Name`,
     `Password`,
     NameOfHost,
     DateOfBirth,
     DateOfArrival,
     DateOfLeave,
     PlaceOfResidence,
     PhoneNumber,
     payed)
     VALUES('$uid',
     '$name',
     '$pwd',
     '$hn',
     $dob,
     $doa,
     $dol,
     '$por',
     '$pn',
     '$payed')";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
   }
   else $result = "empty fields";
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
    <title>RU - Immigrant Manager</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>  
<body><div class="container"class="container" style="background:lightblue; border:50px solid blue;
                            border-radius: 50px;
                            padding:30px; margin:auto;
                            display: flex; justify-content: center; 
                            align-items: center; height: 100vh">

    <form method="post" action="">
                <div id="div_register">
                    <h1>register user</h1>
                    <?php if(isset($result)){echo $result;}
                            if(mysqli_error($con)!= null){echo mysqli_error($con);}?>
                    <div>
                        uid<br>
                        <input type="number" class="textbox" id="txt_uid" name="txt_uid" placeholder="User Id" />
                    </div>
                    <div>
                        name<br>
                        <input type="text" class="textbox" id="txt_name" name="txt_name" placeholder="Name" />
                    </div>
                    <div>
                        password<br>
                        <input type="password" class="textbox" id="txt_pwd" name="txt_pwd" placeholder="Password" />
                    </div>
                    <div>
                        phone number<br>
                        <input type="number" class="textbox" id="txt_pn" name="txt_pn" placeholder="phone number" />
                    </div>
                    <div>
                        host name<br>
                        <input type="text" class="textbox" id="txt_hn" name="txt_hn" placeholder="Host Name" />
                    </div>
                    <div>
                        place of residence<br>
                        <input type="text" class="textbox" id="txt_por" name="txt_por" placeholder="Place Of Residence" />
                    </div>
                    <div>
                        date of birth<br>
                    <input type="date" id="dob" name="dob" >
                    </div>
                    <div>
                        date of arrival<br>
                    <input type="date" id="doa" name="doa" >
                    </div>
                    <div>
                        date of leave<br>
                    <input type="date" id="dol"  readonly name="dol" value="<?php date('Y-m-d', strtotime($doa. ' + 1 year'));?>" >
                    </div>
                    <div>
                        payed
                    <input type="checkbox" id="payed" name="payed" >
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                    </div>
                </div>
            </form>
            <form method="post" action="">
                    <div>
                        <input type="submit" value="Log Out" name="but_Logout" id="but_Logout" style="margin:10px" class="btn btn-dark"/> </div>
            </form>
            <form method="post" action="">
                    <div>
                        <input type="submit" value="Go back" name="but_gb" id="but_gb" style="margin:10px" class="btn btn-dark"/> </div>
            </form>
</body>
</html>