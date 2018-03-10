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
<script type="text/javascript">
        (function (global) { 

    if(typeof (global) === "undefined") {
        throw new Error("window is undefined");
    }

    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";

        // making sure we have the fruit available for juice (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };

    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };

    global.onload = function () {            
        noBackPlease();

        // disables backspace on page except on input fields and textarea..
        document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };          
    }

})(window);
    </script>

</head>
<body>
<?php
session_start();
// define variables and set to empty values

 $usermail = $upassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $usermail = $_POST["eid"];
    // check if e-mail address is well-formed
    $upassword = $_POST["pass"];
 
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

$sql = "SELECT * FROM users WHERE email = '$usermail' and password = '$upassword'";
      $result = mysqli_query($conn, $sql);
	  while($row = mysqli_fetch_assoc($result))
	  {
		  $_SESSION['user']=$row['name'];
	  }
      $count = mysqli_num_rows($result);
	  //$row = mysqli_fetch_assoc($post_results);
        //$post_numbers = $row['name'];
if($count == 1)
{
    
	$_SESSION['uname'] = $usermail;
	echo"<script>document.location = 'http://127.0.0.1/final/userhome.php';</script>";
}
else
{
	echo"<script>alert('Invalid Login');</script>";
}
   }
  
?>

<div id="header">


<h1 style="color:white">Advanced Homomorphic Encryption Using CRT for Cloud Data Security</h1></font>
<p><b>Project Guide</b>   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<b>K.Varun Kumar</b><br>   
D.Chandaravathi &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  MCA 3rd Year <br>
Sr.Assistant Professor &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  PG141502015</p>

</div>

<div id="navg">

<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="problemstatement.php" target="content">Problem Statement</a></li>
  <li><a href="algorithm.php" target="content">Algorithm</a></li>
<li><a href="uml.php" target="content">UML Diagrams</a></li>
<li><a href="time.php" target="content">Time Complexity & Graphs</a></li>
<li><a href="faq.php" target="content">FAQ</a></li>
  <ul style="float:right;list-style-type:none;">
    <li><a href="newuser.php" target="content">New User</a></li>
    <li><a href="" target="content">Login</a></li>
  </ul>
</ul></div>
<div id="nav">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset border-color="#6699FF">
<legend style="color:white;"> Login  Quickly</legend>
<table width="280" height="240" border="0" bgcolor="tan" cellpadding="2">
<tr><td> Email ID: </td><td><input type="text" class="input" name="eid" required="true"></td></tr>
<tr><td> Password: </td><td><input type="password" class="input" name="pass" required="true"></td></tr>
<tr><<td></td><td><input type="submit"class="btn" value="login">&nbsp&nbsp<input type="reset" class="btn" value="reset">  </td></tr>
</form>
</table>
</fieldset>

</div>

<div id="navr">
<font color="white"><marquee direction="down" behavior="alternate" style="background:black;height:300px;"> LATEST NOTIFICATIONS DISPLAYED HERE</marquee></font>
<br>

<a href="https://www.facebook.com/varunkmr120" target="https://www.facebook.com/varunkmr120"><img src="fbbadge.png"></a><br>
<b>Developer K.Varun Kumar</b>



</div>

</div>
<div id="section" class="scroll">
<br> 
<br>
<p>This Project "Advanced Homomorphic Encryption Using CRT for Cloud Data Security" aims to provide security of data in the Cloud using Multiplicative Homomorphic Approach and also Shor's algorithm which is used for generating Public key Component. Plain Text Message is encrypted with Public Key to generate Cipher Text and for decryption Chinese Remainder Theorem (CRT) is used to speed up the computations. By doing so, it shows how the CRT representation of numbers in Zn can be used to perform modular exponentiation about much more efficiently using three extra values pre-computed from the prime factors of n, and how Garner's formula is used to retrieve the Plain Text. Hence security is enhanced in the cloud provider. </p>

<br><h2 align="center"><b>What is Homomorphic Encryption ?</b></h2>
<p>Homomorphic Encryption systems are used to perform operations on encrypted data without knowing the private key (without decryption), the client is the only holder of the secret key. When we decrypt the result of any operation, it is the same as if we had carried out the calculation on the raw data.</p>
<strong>Eg:</strong><p>3 * 2 = ?<br>
Encrypt 3 to get =10<br>
Encrypt 2  to get =20<br>
10 * 20 =  200<br>
Decrypt 200 with private key to get original value 6

</p>
</div>

<div id="footer">
Copyright © <a href="http://vrnkmr.blogspot.com">vrn pvt.Ltd</a>
</div>

</body>
</html>
