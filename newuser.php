<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
.input
{
  -moz-border-radius: 15px;
 border-radius: 15px;
    border:solid 1px black;
    padding:5px;
}
.btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 18;
  -moz-border-radius: 18;
  border-radius: 18px;
  font-family: Arial;
  color: #ffffff;
  font-size: 14px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
</style>
</head>
<body>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $cpasswordErr = "";
$name = $email = $password = $cpassword = "";
$count=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["pass"])) {
    $passwordErr = "Password required";
  } else {
    $password = $_POST["pass"];
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    
    }
  
if (empty($_POST["cpassword"])) {
    $cpasswordErr = "confirm password required";
  } else {
    $cpassword = $_POST["cpassword"];
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if ($password!=$cpassword) {
      $cpasswordErr = "password not match"; 
	 
	}
  
  

else { 
		$servername = "127.0.0.1";
        $username = "root";
        $pass = "";
        $db="finalproject";
// Create connection
        $conn = mysqli_connect($servername, $username, $pass,$db);

// Check connection
      if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
                  }
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password');";
	if (mysqli_query($conn, $sql)) {
	
    echo"<script>if(confirm('Sucessfully Registerd Please note emailid and password')){ document.location = 'http://127.0.0.1/final/index.php';}</script>";
} 
else {
	$count=$count + 1;
	
	if($count =1)
	{
    //echo "<script>window.alert('Email Already Exists');</script>";
  $emailErr="Email Already Registerd";
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
	}
}

mysqli_close($conn);
	 
		  
  }
  }
}
 
?>
<div id="header">


<h1 style="color:white"><img src="logo.png" width="60" height="60"><br>Advanced Homomorphic Encryption Using CRT for Cloud Data Security</h1></font>

</div>

<div id="navg">

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="problemstatement.php" target="content">Problem Statement</a></li>
  <li><a href="algorithm.php" target="content">Algorithm</a></li>
  <li><a href="uml.php" target="content">UML Diagrams</a></li>
  <li><a href="faq.php" target="content">FAQ</a></li>
  <ul style="float:right;list-style-type:none;">
    <li><a class="active" href="newuser.php" target="content">New User</a></li>
    <li><a href="index.php" target="content">Login</a></li>
  </ul>
</ul></div>
<div id="nav">

</div>

<div id="navr">
<font color="white"><marquee direction="down" behavior="alternate" style="background:black;height:400px;"> LATEST NOTIFICATIONS DISPLAYED HERE</marquee></font>
<br>
<a href="https://www.facebook.com/varunkmr120" target="https://www.facebook.com/varunkmr120"><img src="fbbadge.png"></a>



</div>

</div>
<div id="section" class="scroll">

<h2 align="center">New User Registration</h2>
<hr>

<p align="center"><span class="error">* required field.</span></p>
<br> 

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<table border="0" align="center" class="td" cellpadding="20ems" background="DORM.jpg"> 
 <tr><td> Name:</td><td> <input type="text" class="input" name="name" value="<?php echo $name;?>">
  <span class="error">*<?php echo $nameErr;?></span></td></tr>
  
 <tr><td> E-mail: </td><td><input type="text" name="email" class="input" value="<?php echo $email ?>">
  <span class="error">*<?php echo $emailErr;?> </span></td></tr>
 
  <tr><td>Password:</td><td> <input type="password" name="pass" class="input" value="<?php echo $password ?>">
  <span class="error">*<?php echo $passwordErr;?></span></td></tr>
 
  <tr><td>ConformPassword:</td><td> <input type="password" name="cpassword" class="input" value="<?php echo $cpassword ?>">
  <span class="error">*<?php echo $cpasswordErr;?></span></td></tr>
  
  <tr><td></td><td><input type="submit" class="btn" name="submit" style="height:40px; width:80" value="Submit"> &nbsp <input type="reset" class="btn" class="input"name="reset" style="height:40px; width:80" value="reset"></td></tr> 
  </table>
</form>
</div>

<div id="footer">
Copyright © <a href="http://vrnkmr.blogspot.com">vrn pvt.Ltd</a>
</div>

</body>
</html>
