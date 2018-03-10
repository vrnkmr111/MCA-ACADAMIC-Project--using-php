<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="style.css">
<style>


</style>
</head>
<body>
<?php
session_start();
{
// define variables and set to empty values
$ptext=$p=$q=$n=$phi=$r=$y=$e1=$e2=$gcd1=$gcd2=$cipher=$d=$fsize=$alert="";

$x=0;
$mcipher="";// cipher text muliplication variable
$mcipher1=1;
$mplain=1;//plaintext multiplication value
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
 $ptext = (string)$_POST['ptext'];
 $p = (string)$_POST['p'];//required p
 $q = (string)$_POST['q'];//required q
 if(gmp_prob_prime($p)==2 && gmp_prob_prime($q)==2)
 {
 $n = gmp_strval(gmp_mul($p,$q));// required n
 $phi=gmp_strval(gmp_mul(($p-1),($q-1)));// required phi
 $fbits=strlen($ptext);
 $fsize=$fbits/8;
 }
 else
 {
	$alert="Please Choose Correct Prime Numbers(Prime Number:A number which is divsible by itself except 1)";
 }
}
}

?>
<div id="header">


<h1 style="color:white"><img src="logo.png" width="60" height="60">Advanced Homomorphic Encryption Using CRT for Cloud Data Security</h1></font>

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
<font color="white"><marquee direction="down" behavior="alternate" style="background:black;height:240px;"> LATEST NOTIFICATIONS DISPLAYED HERE</marquee></font>
<br>
<a href="https://www.facebook.com/varunkmr120" target="https://www.facebook.com/varunkmr120"><img src="fbbadge.png"></a>



</div>

</div>
<div id="section" class="scroll">
<a href="userhome.php"><img src="back.png" width="50px" hight="50px"></a>
<?php 

$uname = $_SESSION['uname'];
$user=$_SESSION['user'];
echo "<h3 align='center'>Welcome " .$user."</h3>"."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type='button'  value='LogOut' onclick='logout()' style='font-size:10pt;width:100px;hight:120px;color:white;background-color:green;border:2px solid #336600;padding:3px'>";
echo"<script>function logout(){document.location = 'index.php';}</script>";

?>
<hr>
<script>
function onFileSelected(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var result = document.getElementById("result");

  reader.onload = function(event) {
    result.innerHTML = event.target.result;
  };

  reader.readAsText(selectedFile);
}
</script>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<p><strong>Enter Plain Text:</strong></p><p> <textarea type="text" name="ptext" required="true" id ="result" onkeydown="this.form.txt1.value=this.value.length" onkeyup=="this.form.txt1.value=this.value.length" 
onchange=="this.form.txt1.value=this.value.length" onkeypress=="this.form.txt1.value=this.value.length" style="width:300px;height:100px;overflow:scroll;"><?php echo $ptext ?></textarea><input type="file" onchange="onFileSelected(event)"></p>
 <center>BitCount:&nbsp &nbsp <input type="text" disabled name="txt1" value=0 style="width=10px;height=20px"/> </center><br><center><?php echo"File Size: ".$fsize." Bytes" ?></center><p align="center"> Enter two Large Prime Number P and Q</p>
<p align="center"> <input type="number" name="p" placeholder"prime number 1" required="true" value="<?php echo $p;?>" style="width:150px;height:30px"> &nbsp <input type="number" name="q" value="<?php echo $q;?>" required="true" placeholder"prime number 1"  style="width:150px;height:30px"> </p>
 <p align="center"><input type="submit"  value="Click Here"  style="font-size:10pt;width:100px;hight:120px;color:white;background-color:green;"></p>
<form>


<?php


echo "<p style='color:red;'>".$alert."</p>";
echo "<p> N = ".$n." <br> PHI = ".$phi."</p>";
echo "<p> Choose an Even random number</p>";

?>
<p><form method="POST" action="encrypt.php"> <input type="number" required="true" name="r" value="<?php echo $x ?>"> <input type="submit" name="gcdform"value="ok" style="font-size:10pt;width:100px;hight:120px;color:white;background-color:green;"></form></p>
<?php

if(!empty($_POST["gcdform"]))
{
$x = $_POST['r'];
$r =  gmp_strval(gmp_mod($x,$phi));
$y =  gmp_strval(gmp_mod(gmp_pow(($x),($r/2)),$phi));
$a = $y+1;
$b = $y-1;
$gcd1 = gmp_strval(gmp_gcd($a,$phi));
$gcd2 = gmp_strval(gmp_gcd($b,$phi));
if($a==1 && $b==1)
{
	echo"Please choose another Random Number";
}
else
{

$words = array($ptext);
$ascii = 1;
$mul="";
$array_cipher=array();
$start=microtime(true);
foreach($words as $word)
{
	$index = 0;
	while($index < strlen($word))
{
		$scipher=gmp_strval(ord($word[$index]));
		
		

 if ($gcd1 == 1 && $gcd2 != 1)
{
	$e1 = $y+1;
	      
		 $cipher = gmp_strval(gmp_mod(gmp_pow(($scipher),$e1),$n));
		 $array_cipher[$index]= $cipher;
		 $cipher.= gmp_strval($cipher);
		 $mcipher = gmp_strval(gmp_mod(gmp_pow(($scipher),$e1),$n));
		 $mcipher1= gmp_strval(gmp_mul($mcipher1,$mcipher));
		 $mplain=gmp_strval(gmp_mul($mplain,$scipher));
		 $mplain=gmp_strval(gmp_mod($mplain,$n));
		 $d=gmp_strval(gmp_invert($e1,$phi));
		 
	
}
else if ($gcd1 != 1 && $gcd2 == 1)
{
	$e2 = $y-1;
	
	 $cipher = gmp_strval(gmp_mod(gmp_pow(($scipher),$e2),$n));
		 $array_cipher[$index]= $cipher;
		 $cipher.= gmp_strval($cipher);
	 $mcipher = gmp_strval(gmp_mod(gmp_pow(($scipher),$e2),$n));
		 $mcipher1= gmp_strval(gmp_mul($mcipher1,$mcipher));
	 $mplain=gmp_strval(gmp_mul($mplain,$scipher));
	 $mplain=gmp_strval(gmp_mod($mplain,$n));
	 $d=gmp_strval(gmp_invert($e2,$phi));
	 
	
}
if ($gcd1 == 1 && $gcd2 == 1)
{
	
	$e1 = $y+1;
	 //echo "<h2 align='center'> Choose public key e1= ".$e1."</h2>";
	 $cipher = gmp_strval(gmp_mod(gmp_pow(($scipher),$e1),$n));
		 $array_cipher[$index]= $cipher;
		 $cipher.= gmp_strval($cipher);
	 $mcipher = gmp_strval(gmp_mod(gmp_pow(($scipher),$e1),$n));
		 $mcipher1= gmp_strval(gmp_mul($mcipher1,$mcipher));
	 $mplain=gmp_strval(gmp_mul($mplain,$scipher));
	 $mplain=gmp_strval(gmp_mod($mplain,$n));
	 $d=gmp_strval(gmp_invert($e1,$phi));
	
//echo"<h2 align='center'> ".$cipher."</h2>";
//echo "<p> Choose public key ".$e1."<input type='radio' name='e1'>or ".$e2."<input type='radio' name='e2'></p>"; 
 }
 

		$index++;
		
	}
$end=microtime(true);	//print_r($array_cipher);
}
if ($gcd1 != 1 && $gcd2 != 1 && $e1 ==1 & $e2==1)
{
	echo"<p style='color:red;'>Please choose another random number</p>";
}
else{
 	
	
	$t=$end-$start;
	
    $z=implode("",$array_cipher);
	echo"<h2> Cipher Text </h2><br><textarea type='text' id='ct' style='width:400px;height:100px;align:left'>".$z."</textarea><br>";//required original cipher
	$array_string=mysql_escape_string(serialize($array_cipher));
	
//	echo $mcipher1."<br>";//required  ciphermultiplication
	
	//echo $mplain."<br>";//required plaintext multiplication
	//echo "Note Private key: ".$d."<br>";// required private key

        $servername = "127.0.0.1";
        $username = "root";
        $pass = "";
        $db="finalproject";
		$a=1;
// Create connection
$conn = mysqli_connect($servername, $username, $pass,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO user_ciphertext(umail,p,q,n,phi,e1,e2,d,cipher,mcipher,mplain,array_cipher,filesize,etime) VALUES ('$uname','$p','$q','$n','$phi','$e1','$e2','$d','$z','$mcipher1','$mplain','$array_string','$fsize','$t');";
if (mysqli_query($conn, $sql)) {
    //echo"<script>if(confirm('Sucessfully Stored in Cloud')){ document.location = 'http://127.0.0.1/final/userhome.php';}</script>";
	echo"<b>Encrpted Time:".$t."</b>";
	echo"<p style='size:34px;color:green;'> Successfully Cipher Text Stored in Cloud </p><p style='size:34px;color:red;'>you will be Redirected to homepage in 10 seconds</p>";
	
	header("refresh:13;url=userhome.php" );

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}	

	
}

}

?>


</div>

<div id="footer">
Copyright © <a href="http://vrnkmr.blogspot.com">vrn pvt.Ltd</a>
</div>

</body>
</html>
