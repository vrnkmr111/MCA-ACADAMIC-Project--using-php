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
<li><a href=""  target="content">UML Diagrams</a></li>
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
<a href="userhome.php"><img src="back.png" width="50px" hight="50px"></a>
<?php 
session_start();
$user=$_SESSION['user'];
$uname = $_SESSION['uname'];
$secret =$_SESSION['secrettext'];
$k=$_SESSION['key'];
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
$sql = "SELECT id,p,q,n,d,cipher,array_cipher FROM user_ciphertext where umail='$uname' and mcipher='$secret' and d='$k'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >= 1) {
    // output data of each row	
	echo "<table border=1 background='green.jpg' style='width:400;height:200;'><tr><td>Cipher</td></tr><tr>";
    while($row = mysqli_fetch_assoc($result)) {
		
		
		echo "<td><textarea type='text'>".$row["cipher"]."</textarea></td></tr>";
    }

	echo"</table>";
}
 else {
    echo "0 results";
}
echo"<hr>";


mysqli_close($conn);

?>
<form method="POST" action="laststep.php">
<p align="center"><input type="submit" name="final" value="Generate ORIGINAL Plain Text" class="active" style="width:500px;height:35px;"></p>
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
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
$arr=array();
$sql = "SELECT id,p,q,d,array_cipher FROM user_ciphertext where umail='$uname' and mcipher='$secret' and d='$k'";
$result = mysqli_query($conn, $sql);
//$i=0;

while($row = mysqli_fetch_array($result)) {
$arr=array_values(unserialize($row['array_cipher']));
$co = count(unserialize($row['array_cipher']));
$id=$row['id'];
$p=$row['p'];
$q=$row['q'];
$d=$row['d'];
$dp=gmp_strval(gmp_mod($d,$p-1));
$dq=gmp_strval(gmp_mod($d,$q-1));
$qinv=gmp_strval(gmp_invert($q,$p));	
//echo "p=".$p."q=".$q."d=".$d."dp=".$dp."dq=".$dq."<br>";
$start=microtime(true);
for($i=0;$i<$co;$i++)
{
	$c = $arr[$i];
	$m1=gmp_strval(gmp_mod(gmp_pow($c,$dp),$p));
	$m2=gmp_strval(gmp_mod(gmp_pow($c,$dq),$q));
	//echo "m1=".$m1."m2=".$m2."<br>";
	$dif = $m1-$m2;
	if($dif > 0)
	{
		$h1=$qinv * $dif ;
		$h =gmp_strval(gmp_mod($h1,$p));
		//echo "h=".$h."<br>";
		$m = gmp_strval(gmp_add($m2,(gmp_mul($h,$q))));
	    //echo "m=".$m."<br>";
		echo chr($m);
	}
	else if($dif < 0)
	{
		$h1=$qinv * ($dif + $p);
		$h =gmp_strval(gmp_mod($h1,$p));
		//echo "h=".$h."<br>";
		$m = gmp_strval(gmp_add($m2,(gmp_mul($h,$q))));
		//echo "m=".$m."<br>";
		echo chr($m);
	}
	else
	{
		$h1=$qinv * ($dif + $p);
		$h =gmp_strval(gmp_mod($h1,$p));
		//echo "h=".$h."<br>";
		$m = gmp_strval(gmp_add($m2,(gmp_mul($h,$q))));
		//echo "m=".$m."<br>";	
		echo chr($m);
	}
	$end=microtime(true);
	}
	
}
$t=($end-$start);
$sql1 =" update user_ciphertext SET dtime='$t' WHERE id='$id'";
try
{ 
if (mysqli_query($conn, $sql1)) {
    echo "<br><br><p class='active' align='center'>Decryption Time:".$t."</p>";
} }catch(Exception $ex) {
    echo "Error updating record: " . mysqli_error($conn);
}

header("refresh:10;url=userhome.php" );


mysqli_close($conn);
}
?>

</div>

<div id="footer">
Copyright © <a href="http://vrnkmr.blogspot.com">vrn pvt.Ltd</a>
</div>

</body>
</html>
