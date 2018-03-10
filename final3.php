<html>
 <head>
 
 </head>
 <body>
 
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script>
 google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['FileSize', 'Encryption Time(ms)', 'Decryption Time(ms)'],
          //[11, 0.00988102, 0.0079],
		  //[22,0.0197179,0.0148928],
          //[34, 0.027342, 0.0187359],
		  
          //[44, 0.0404251, 0.019181],
          //[55, 0.049721, 0.025008],
		  //[67,0.064147,0.0297918],
		  //[78,0.083112,0.0339961],
		  //[91,0.107205,0.034025]
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
          chart: {
            title: 'Time Complexity ',
            subtitle: 'Encryption Time(ms) Vs Decryption Time(ms)',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
 </script>
 <h1 align="center">  BarChart By Using Google API</h1>
 <center><b>X-Axis = FileSize in Bytes </b><br><br><b> Y-axis = Time in Milli Seconds</b></center>
 <br>
       <div id="chart_div" style="width:800px;height:650px; margin:0 auto;"</div>
    <br/>
    <div id="btn-group">

 <div>
 
 </body>
 <html>