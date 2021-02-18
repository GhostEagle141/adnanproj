<!DOCTYPE html>
<html>
<head>
<title>Immigrant Manager</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>  
<body>
<div class="container" style="background:lightblue; border:50px solid blue;
                            border-radius: 50px;
                            padding:30px; margin:auto;
                            display: flex; justify-content: center; 
                            align-items: center; height: 100vh">
<h1>Hello and welcome Admin<br>
    Choose One of these operations to continue:</h1>

<form action="registerUser.php" style="display:inline;">
    <input type="submit" value="Register a User" class="btn btn-primary" style="width:150px;height:150px;"/>
</form>
<form action="registerAdmin.php"style="display:inline;">
    <input type="submit" value="Register an Admin" class="btn btn-warning" style="width:150px;height:150px;"/>
</form>
<form action="inAdmin.php"style="display:inline;">
    <input type="submit" value="Admin Settings" class="btn btn-danger" style="width:150px;height:150px;"/>
</form>
<form action="loginAdmin.php"style="display:inline;">
    <input type="submit" value="Logout" class="btn btn-dark" />
</form>
</div>
</body>
</html>
