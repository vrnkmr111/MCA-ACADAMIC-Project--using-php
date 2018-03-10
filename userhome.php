<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="style.css">

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

<div id="header">


<h1 style="color:white"><img src="logo.png" width="180" hight="180"><br>Advanced Homomorphic Encryption Using CRT for Cloud Data Security</h1></font>

</div>

<div id="navg">

<ul>
  <li><a href="" class="active">Home</a></li>
  <li><a href=""  target="content">Problem Statement</a></li>
  <li><a href="" target="content">Algorithm</a></li>
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
<font color="white"><marquee direction="down" behavior="alternate" style="background:black;height:240px;">you must LogOut to see navigation menu</marquee></font>
<br>
<a href="https://www.facebook.com/varunkmr120" target="https://www.facebook.com/varunkmr120"><img src="fbbadge.png"></a>



</div>

</div>
<div id="section" class="scroll">
<?php 
session_start();
$uname = $_SESSION['uname'];
$user=$_SESSION['user'];
echo "<h3 align='center'>Welcome " . $user."</h3>"."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type='button'  value='LogOut' onclick='logout()' style='font-size:10pt;width:100px;hight:120px;color:white;background-color:green;border:2px solid #336600;padding:3px'>";
?><script>function logout(){document.location = 'http://127.0.0.1/final/index.php';}</script> 
 


<hr>
<table border=0 align="center" cellpadding="20ems" background="green.jpg">
<tr><td><a href="encrypt.php"><img src="encrypt.jpg"/></a></td><td><a href="decrypt.php"><img src="decrypt.png"/></a> </td></tr>
</table>
<p><strong>What is Encryption?</strong><br><br>Encryption is the conversion of electronic data into another form, called ciphertext, which cannot be easily understood by anyone except authorized parties.</p>
<p><strong>What is Decryption?</strong><br><br>Decryption is the process of converting encrypted data back into its original form, so it can be understood.</p>
</div>

<div id="footer">
Copyright © <a href="http://vrnkmr.blogspot.com">vrn pvt.Ltd</a>
</div>

</body>
</html>
