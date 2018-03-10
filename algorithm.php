<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="style.css">
<style>


</style>
</head>
<body>

<div id="header">


<h1 style="color:white"><img src="logo.png" width="60" height="60"><br>Advanced Homomorphic Encryption Using CRT for Cloud Data Security</h1></font>

</div>

<div id="navg">

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="problemstatement.php"  target="content">Problem Statement</a></li>
  <li><a href="algorithm.php" class="active" target="content">Algorithm</a></li>
<li><a href="uml.php" target="content">UML Diagrams</a></li>
<li><a href="faq.php" target="content">FAQ</a></li>
  <ul style="float:right;list-style-type:none;">
    <li><a  href="newuser.php" target="content">New User</a></li>
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
<p><Strong>Algorithm:<br></strong><br>Step 1. Choose random large prime integers p and q of roughly the same size, but not too close together.<br> 
Step 2. Calculate the product n= p * q.<br>
Step 3. Calculate phi(n)=(p-1)*(q-1).<br>
Step 4. Calculate e such that 1 < e < phi(n)<br>
    &nbsp &nbsp &nbsp(For Calculating ‘e’ using Shor’s Algorithm,<br>&nbsp &nbsp &nbsp &nbsp randomly choose
      ‘x’ between 1 and phi(n),<br>&nbsp &nbsp &nbsp &nbspthen find  r = x mod phi(n)  and  
       y = x^(r/2) mod phi(n).<br> &nbsp &nbsp &nbsp &nbspThen find GCD(y+1,phi(n)=1 and 
        GCD(y-1,phi(n)=1 )            <br>                                                                            
Step 5. Calculate ‘d’ such that e * d mod phi(n) = 1<br>
Step 6. Encryption:  C = M^e  %  n<br>
<strong>Decryption Process:</strong><br>
Step 9:Precompute the following values      given p, q with p > q<br>
                      dP = (1/e) mod (p-1)<br>
                      dQ = (1/e) mod (q-1)<br>
                      qInv = (1/q) mod p <br>
where the (1/e) notation means the modular inverse. The expression <br>
       x = (1/e) mod N is also written as x = e-1 mod N, and x is any integer that satisfies x.e ≡ 1 (mod N). In our case, where N = n = pq, we use the unique value x in Zn, the set of numbers {0, 1, 2, ..., n-1}.
<br>Step 10. To compute the Plain message m given c do<br>
m1 = cdP mod p m2 = cdQ mod q h = qInv.(m1 - m2) mod p m = m2 + h*q<br>
We store our private key as the quintuple (p, q, dP, dQ, qInv).<br>
We need two theorems from number theory here: a special case of the Chinese Remainder Theorem (CRT) and Euler's Theorem (also called the Euler-Fermat Theorem
<br><br>
<strong>Example</strong><br>
p = 137, q = 131, n = 137*131 = 17947, <br>
phi(n)=136 * 130 =17680<br>
1 < e < 17680 (using shor’s Algorithm) <br>
     choose random value x = 30 <br>
     then r = 30 mod 17680 = 30  <br>
    and  y = 30^15 mod 17680= 480<br>
GCD(481,17680) ≠ 1  GCD(479,17680) = 1<br>
     
                         Hence e = 479
						 <br>
						 e * d  % phi(n) =1 <br>
     Therefore, d= 2879<br>
M1 = 513 (Plain Text)  M2 = 171<br>
c1= 513479 mod 17947 = 5337 and c2 = 171479 mod 17947 = 13822<br>
c1 * c2 =  5337 * 13822 = 73768014 (Store this value in cloud for authentication)<br>
Decrypt  c1 * c2 with the private key ‘d’<br>
737680142879 mod 17947 = 15935(which is equal to the multiples of plain text message) <br>
513 * 171 = 36423 mod 17947 = 15935 (Authentication Successful)<br>
Hence Proceed to  Decryption.
<br>
To decrypt c we could compute cd mod n directly<br>
m1 = 53372879 mod 17947 = 513. m2 = 13822 2879  mod 17947= 171 <br>
Pretty difficult to do on your pocket calculator. Now let's use the CRT method - notice how the exponent and modulus values are much smaller and manageable. This simple (but obviously insecure) example should demonstrate how much easier it is to break down the RSA calculation into smaller ones.
<br>
dP = e-1 mod (p-1) = 479-1 mod 136 = 23 <br>
dQ = e-1 mod (q-1) = 479-1 mod 130 = 19<br>
 qInv = q-1 mod p = 131-1 mod 137 = 114 <br>
m1 = cdP mod p = 533723 mod 137 = 102 <br>
m2 = cdQ mod q = 533719 mod 131 = 120<br>
 h = qInv*(m1 - m2) mod p = 114.(102-120+137) mod 137 = 3 <br>
      [we add in an extra p here to keep the sum positive]<br>
 m = m2 + h*q = 120 + 3.131 = 513.<br>
simlarly <br>
m1 = cdP mod p = 13822 23 mod 137 = 34<br>
m2 = cdQ mod q = 13822 19 mod 131 = 40<br>
 h = qInv*(m1 - m2) mod p = 114.(34-40+137) mod 137 = 1<br> 
      [we add in an extra p here to keep the sum positive]<br>
 m = m2 + h.q = 40 + 1.131 = 171<br>
 <br>
 <br>
 <Strong>Conclusion:</strong><br>
 The Security of Data is a major concern in Cloud Computing . Homomorphic Encryption is a new concept of security which  enables to provide the results of calculations on encrypted data without knowing the raw entries on which the calculation was carried out respecting the confidentiality of data.Even though computing of two exponentiations instead of one and there are additional steps involved in doing CRT, overall, the decryption would be  much more faster. 
 

</p>
</div>

<div id="footer">
Copyright © <a href="http://vrnkmr.blogspot.com">vrn pvt.Ltd</a>
</div>

</body>
</html>
