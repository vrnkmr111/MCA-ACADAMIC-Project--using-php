<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="style.css">
<style>


</style>
</head>
<body>

<div id="header">


<h1 style="color:white"><img src="logo.png" width="180" hight="180"><br>Advanced Homomorphic Encryption Using CRT for Cloud Data Security</h1></font>

</div>

<div id="navg">

<ul>
  <li><a href="">Home</a></li>
  <li><a href=""  target="content">Problem Statement</a></li>
  <li><a href=""  target="content">Algorithm</a></li>
<li><a href="" target="content">UML Diagrams</a></li>
<li><a href="" target="content">FAQ</a></li>
  <ul style="float:right;list-style-type:none;">
    <li><a  href="" target="content">New User</a></li>
    <li><a href="" target="content">Login</a></li>
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
<?php 
session_start();

$uname = $_SESSION['uname'];
$user =$_SESSION['user'];
echo "<h3 align='center'>Welcome " . $user."</h3>"."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type='button'  value='LogOut' onclick='logout()' style='font-size:10pt;width:100px;hight:120px;color:white;background-color:green;border:2px solid #336600;padding:3px'>";
echo"<script>function logout(){document.location = 'http://127.0.0.1/final/index.php';}</script>";

?>
<hr>
<?php
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
$sql = "SELECT id,n,d,mcipher FROM user_ciphertext where umail='$uname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "<table background='back.jpg' width=550px><tr><td>ID</td><td>N</td><td>Private Key</td><td>SECRET CIPHER</td></tr><tr>";
    while($row = mysqli_fetch_assoc($result)) {
		
        echo "<td> " . $row["id"]. "</td><td>".$row["n"]."<td>" . $row["d"]. "</td><td><textarea type='text' width='200px'>".$row["mcipher"]."</textarea></td></tr>";
    }
	echo"</table>";
} else {
    echo "0 results";
}
echo"<hr>";

mysqli_close($conn);



?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table background="back.jpg"><tr><td>
Copy and Paste Secret Cipher Text Here:</td><td><textarea type="text" name="secrettext" value="" style="width:300px;height:100px;"></textarea></td></tr>
<tr><td>Enter Private Key:</td><td><input type="text" name="key"></td></tr>
<tr><td>Enter N value:</td><td><input type="text" name="n"></td></tr>
<tr></tr>
<tr><td></td><td><input type="submit" value="Authenticate" class="active"></td></tr>
</table>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$secretcipher=$_POST['secrettext'];
	$key=$_POST['key'];
	$N=$_POST['n'];
	$auth=gmp_strval(gmp_mod(gmp_pow($secretcipher,$key),$N));
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
$sql = "SELECT * FROM user_ciphertext where umail='$uname' and mplain='$auth'";

$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);


	if($count >0)
	{
		$_SESSION['key'] = $key;
		$_SESSION['secrettext']=$secretcipher;
		echo"<script>if(confirm('You are Genuine,Authentication Successfull.')){ document.location = 'http://127.0.0.1/final/laststep.php';}</script>";
		}
	else
	{
		echo"<script>if(confirm('Sorry! Authentication is Failed!!!! Please Try Again!'))
		{
			document.location = 'http://127.0.0.1/final/decryptown.php';}
			</script>";
	}
	mysqli_close();
}
?>
<a href="userhome.php"><img src="back.png" width="50px" hight="50px"></a>
</div>

<div id="footer">
Copyright © <a href="http://vrnkmr.blogspot.com">vrn pvt.Ltd</a>
</div>

</body>
</html>
