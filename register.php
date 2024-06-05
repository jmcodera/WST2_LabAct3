<!DOCTYPE html>
<html>
<head>
<title>My first PHP Website</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
body {
  background-image: url('image2.jpg');
  background-size: cover;
  font-family: Arial, sans-serif; /* Change font family here */
}

.btn-register {
  background-color: #28a745; /* Green */
  border-color: #28a745; /* Green */
  color: #fff; /* White */
}

.btn-cancel {
  background-color: #ffc107; /* Yellow */
  border-color: #ffc107; /* Yellow */
  color: #000; /* Black */
}

/* Custom shape */
.custom-shape {
  width: 0;
  height: 0;
  border-left: 20px solid transparent; /* Change the size of the triangle here */
  border-right: 20px solid transparent; /* Change the size of the triangle here */
  border-bottom: 20px solid #007bff; /* Change the color of the triangle here */
  position: relative;
  top: -20px;
}

</style>
</head>
<body>
    
<div class="container min-vh-100 d-flex justify-content-center align-items-center">
  <!-- Custom shape -->
  <div class="custom-shape"></div>
<form action="register.php" method="POST">

<h2>Registration</h2>
<!--NAME TEXTBOX-->
<div class="form-group">
    <label for="exampleInputEmail1">Name:</label>
    <input type="text" name="username" required="required" class="form-control" aria-describedby="emailHelp" placeholder="Enter Name" >
    </div><br/>
<!--PASSWORD TEXTBOX-->
    <div class="form-group">
 <label for="exampleInputEmail1">Password:</label>
    <input type="password" name="password" required="required" class="form-control" aria-describedby="emailHelp" placeholder="Enter Password" >
    </div><br/>

<!--SUBMIT BUTTON -->
    <input class="btn btn-register" type="submit" value="Register"></input> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <a href="index.php" class="btn btn-cancel" value="Cancel">Cancel</a>

</div>
</form>
</body>
</html>
<?php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$db_name = "first_db";
// Create connection
$conn = mysqli_connect($servername, $username_db, $password_db,
$db_name);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $bool=true;
    $query = mysqli_query($conn, "Select * from users_tbl"); //Query the userstable
    while($row=mysqli_fetch_array($query)) //Display all rows from query
    {
    $table_users=$row['username']; //the first username row is passed on to$table_users, and so on until the query is finished
    if($username==$table_users)//checks if there are any matching fields
    {
    $bool=false; //set bool to false
    Print '<script>alert("Username is not available!");</script>';
    //Prompt the user
    Print '<script>window.location.assign("login.php");</script>';
    //redirects to register.php
    }
    }
    if($bool){
    mysqli_query($conn,"INSERT INTO users_tbl (username, password) VALUES
    ('$username','$password')"); //Insert the value to the table users_tbl
    Print '<script>alert("Successfully Registered");</script>'; //Prompt theuser
    Print '<script>window.location.assign("login.php");</script>';
    //redirects to register.php
    }
    }?>
