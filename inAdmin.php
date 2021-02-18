<?php
include('config.php'); 

$today = date("Y-m-d");

$date1=date_create($today);


$rows =[];
 if(isset($_SESSION['aid'])) {
    $aid = $_SESSION['aid'];
   
   $query = "SELECT * FROM adminTable WHERE idAdmin = '".$aid ."'";
   if ( $result = mysqli_query($con, $query) ) {
    $result = mysqli_query($con, $query);
    $rows = mysqli_fetch_array ($result);
}

if(isset($_POST['but_submit'])){
    $name = $_POST['txt_name'];
    $pwd = $_POST['txt_pwd'];
    $aid = $_POST['txt_aid'];

  $query = "UPDATE adminTable
                  SET Name = '$name',
                  Password = '$pwd' WHERE idAdmin='$aid'";
                  $result = mysqli_query($con, $query) or die(mysqli_error($con));
                header('Location: inAdmin.php');
}
}
 
if((isset($_POST['but_Logout']))){
    session_destroy();
    header('Location: index.php');   
}
if((isset($_POST['but_gb']))){
    header('Location: adminSelection.php');   
}

if(isset($_POST['Delete'])){
    $ID = $_POST['userid'];
  $query = "Delete from userTable where idUser= '$ID' ";
                  $result = mysqli_query($con, $query) or die(mysqli_error($con));
                header('Location: inAdmin.php');
}
if(isset($_POST['deleteAdmin'])){
    $ID = $_POST['idAdmin'];
  $query = "Delete from adminTable where idAdmin= '$ID' ";
                  $result = mysqli_query($con, $query) or die(mysqli_error($con));
                header('Location: inAdmin.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="JS/admin_commands.js"></script>
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
                    <?php echo "Hello admin with admin ID:  ".$aid?>
                    <div>
                        ID:<br>
                        <input type="text" class="textbox" id="txt_aid" name="txt_aid"  readonly placeholder="id" value="<?php echo $rows['idAdmin'] ?>"/>
                    </div>
                    <div>
                        name<br>
                        <input type="text" class="textbox" id="txt_name" name="txt_name" placeholder="Name" value="<?php echo $rows['Name']?>"/>
                    </div>

                    <div>
                        password<br>
                        <input type="password" class="textbox" id="txt_pwd" name="txt_pwd" placeholder="Password" value="<?php echo $rows['password']?>"/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" class="btn btn-success" name="but_submit" id="but_submit"/>
                    </div>
                    <div>
                        <input type="submit" value="Show Admins" name="but_showAdmins" class="btn btn-warning" id="but_showAdmins"/>
                    </div>
                    <div>
                        <input type="submit" value="Show Users" name="but_showUsers" class="btn btn-danger" id="but_showUsers"/>
                    </div>
                    <div>
                        <input type="text" value="" name="search" id="search"/>
                        <input type="submit" value="Search" name="but_showSearch"class="btn btn-info" id="but_showSearch"/>
                    </div>
                </div>
                <input type="submit" value="Log Out" name="but_Logout" id="but_Logout"  class="btn btn-dark"/> 
                <input type="submit" value="Go back" name="but_gb" id="but_gb"  class="btn btn-dark"/>
            </form>
</body>
</html>

<?php
if(isset($_POST['but_showAdmins'])){
    $sql = "SELECT * FROM adminTable";
    $result = mysqli_query($con, $sql); 

    echo "<br>";
    echo "<form method='POST' action=''><table border='1'>";
    echo "<table  border='2'>";
    echo "<tr><td>ID</td><td>Name</td><td>Password</td><td>Admin Functions</td></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tbody id='table'><tr>";

        foreach ($row as $field => $value) { 
            
            echo "<td>" . $value . "</td>";
        }
        echo "<td><a href='editAdminAsAdmin.php?admin_id=".$row['idAdmin']."'><input type='button' id='". $row['idAdmin']  ."' value='Edit' class='Edit'/>
                </a><input type='Submit' class='Delete' name ='deleteAdmin' id='". 
                $row['idAdmin']  ."' value='deleteAdmin'/></td>";    }
    echo "</tbody></table><input type='text' id='hidden' name='idAdmin' value='' hidden/></form>";
   
   
}
if(isset($_POST['but_showUsers'])){
   
        $sql = "SELECT * FROM userTable";

    $result = mysqli_query($con, $sql); 

    echo "<br>";
    echo "<form method='POST' action=''><table border='1'>";
    echo "<table  border='2'>";
    echo "<tr><td>ID</td><td>Name</td><td>Password</td><td>Host</td><td>Birth</td><td>Arrival</td><td>Leave</td><td>Residence</td><td>Phone</td><td>Paid</td><td>Admin Functions</td></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tbody id='table'><tr>";

        foreach ($row as $field => $value) { 
            
            echo "<td>" . $value . "</td>";
        }
        echo "<td><a href='editUserAsAdmin.php?user_id=".$row['idUser']."'><input type='button' id='". $row['idUser']  ."' value='Edit' class='Edit'/></a>
        <input type='Submit' class='Delete' name ='Delete' id='". $row['idUser']  ."' value='Delete'/></td><td>";

    }
    echo "</tbody></table><input type='text' id='hidden' name='userid' value='' hidden/></form>";
   
}
if(isset($_POST['but_showSearch'])){
    if($_POST['search'] != ""){
    $ID = $_POST['search'];
   
        $sql = "SELECT * FROM userTable where idUser=$ID";

    $result = mysqli_query($con, $sql); 

    echo "<br>";
    echo "<form method='POST' action=''><table border='1'>";
    echo "<table  border='2'>";
    echo "<tr><td>ID</td><td>Name</td><td>Password</td><td>Host</td><td>Birth</td><td>Arrival</td><td>Leave</td><td>Residence</td><td>Phone</td><td>Paid</td><td>Admin Functions</td></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tbody id='table'><tr>";

        foreach ($row as $field => $value) { 
            
            echo "<td>" . $value . "</td>";
        }
        //insert the date and time after the last td in the line below
        echo "<td><a href='editUserAsAdmin.php?user_id=".$row['idUser']."'><input type='button' id='". $row['idUser']  ."' value='Edit' class='Edit'/></a><input type='Submit' class='Delete' name ='Delete' id='". $row['idUser']  ."' value='Delete'/></td></tr>";
      //echo "</tr><tr>hello</tr>";
    }
    echo "</tbody></table><input type='text' id='hidden' name='userid' value='' hidden/></form>";
   
}}
?>