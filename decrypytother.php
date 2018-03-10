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
<?php 
session_start();
$uname = $_SESSION['uname'];
echo "<h3 align='center'>Welcome " . $uname."</h3>"."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type='button'  value='LogOut' onclick='logout()' style='font-size:10pt;width:100px;hight:120px;color:white;background-color:green;border:2px solid #336600;padding:3px'>";
echo"<script>function logout(){document.location = 'http://127.0.0.1/final/index.php';}</script>";

?>
<hr>
</div>

<div id="navr">
<font color="white"><marquee direction="down" behavior="alternate" style="background:black;height:400px;"> LATEST NOTIFICATIONS DISPLAYED HERE</marquee></font>
<br>
<a href="https://www.facebook.com/varunkmr120" target="https://www.facebook.com/varunkmr120"><img src="fbbadge.png"></a>



</div>

</div>
<div id="section" class="scroll">

</div>

<div id="footer">
Copyright © <a href="http://vrnkmr.blogspot.com">vrn pvt.Ltd</a>
</div>

</body>
</html>
