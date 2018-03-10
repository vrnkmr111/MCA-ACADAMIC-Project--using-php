<?php
   /**
    * step 1: Include the `fusioncharts.php` file that contains functions to embed the charts.
    */
  
?>
<html>
<head>

</head>
<body>
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
$sql = "SELECT filesize,etime,dtime FROM user_ciphertext order by filesize";
$result = mysqli_query($conn, $sql);
$data = array();
if (mysqli_num_rows($result) >= 1) {
    // output data of each row	
	
    while($row = mysqli_fetch_assoc($result)) {
		
		
		$data[]=$row;
    }

	
}
 else {
    echo "0 results";
}
mysqli_close($conn);
$jsonencoded= json_encode($data);
print $jsonencoded;
 

?>
<div id="chart-1">

</div>
<body>
<html>