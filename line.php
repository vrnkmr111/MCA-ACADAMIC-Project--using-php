
  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['FileSize', 'Encryption Time(ms)', 'Decryption Time(ms)'],
          <?php
		  $servername = "127.0.0.1";
        $username = "root";
        $pass = "";
        $db="finalproject";
       // Create connection

       $conn = mysqli_connect($servername, $username, $pass,$db);

       // Check connection
       if(!$conn) {
       die("Connection failed: " . mysqli_connect_error());
       }
        $sql = "SELECT filesize,etime,dtime FROM user_ciphertext order by filesize";
        $result = mysqli_query($conn, $sql);
		  while($row = mysqli_fetch_array($result)){

           echo "['".$row['filesize']."',".$row['etime'].",".$row['dtime']."],";
                  }
		  
		  ?>
        ]);


        var options = {
          title: 'Time Complexity For Encryption and Decryption',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  <h1 align="center">  Line Chart By Using Google API</h1>
  <center><b>X-Axis = FileSize in Bytes </b><br><br><b> Y-axis = Time in Milli Seconds</b></center>
    <div id="curve_chart" style="width:900px; height:600px;margin:0 auto;"></div>
  </body>
</html>