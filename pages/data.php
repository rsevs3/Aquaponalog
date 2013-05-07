<?php

echo "<!DOCTYPE html>
<html>
    <head>
        <title>Aquaponalog</title>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../resources/css/aquastyle.css\">
        
        
        <script type=\"text/javascript\" src=\"../resources/javascript/canvasjs.min.js\"></script>
        
        <script type=\"text/javascript\">
            window.onload = function () {
    
   
            var chart = new CanvasJS.Chart(\"chartContainer\",
            {
            zoomEnabled: true,      
            title:{
             text: \"Zoom And Observe AxisX Labels\", 
            },
            axisX :{
            labelAngle: -30,
            },
            axisY :{
            includeZero: false,
            },
            legend: {
            horizontalAlign: \"right\",
            verticalAlign: \"center\",        
            },
            data: data,  // random generator below
      
            });

            chart.render();
            }
       
            var limit = 10000;    //increase number of dataPoints by increasing this
    
            var y = 0;
            var data = []; var dataSeries = { type: \"line\" };
            var dataPoints = [];
            for (var i = -limit/2; i <= limit/2; i++) {
             y += (Math.random() * 10 - 5);
             dateTime = new Date(1960, 08, 15);
        
             //dateTime.setMilliseconds(dateTime.getMilliseconds() + i);
             //dateTime.setSeconds(dateTime.getSeconds() + i);
             //dateTime.setMinutes(dateTime.getMinutes() + i);
             //dateTime.setHours(dateTime.getHours() + i);
             dateTime.setDate(dateTime.getDate() + i);
             //dateTime.setMonth(dateTime.getMonth() + i);
             //dateTime.setFullYear(dateTime.getFullYear() + i);

             dataPoints.push({
                 //x: (i+1) % 50 === 0 ? dateTime.getTime() : dateTime,
                 //x: i + 345345,
                 x: dateTime,
                 y: y
               });
            }
        
             dataSeries.dataPoints = dataPoints;
             data.push(dataSeries);               
  
        </script>
        <script type=\"text/javascript\" src=\"/assets/script/canvasjs.min.js\"></script>
        
        
        
        
        
        
    </head>
    <body>
        <div id=\"wrapper\">
            <header>
                <nav>
                    <ul>
                        <li><a href=\"../index.html\">Home</a>
                        <li><a href=\"../pages/data.php\">Data</a>
                        <li><a href=\"../pages/setup.php\">Setup</a>
                        <li><a href=\"../pages/about.html\">About</a>
                    </ul>
                </nav>
            </header>
            <article>
            
            
            
            <div id=\"chartContainer\" style=\"height: 300px; width: 100%;\">
    </div>
            
            
            
            
            
            
            

  </article>
            <div id=\"push\"></div>
        </div>
        <footer>

        </footer>
    </body>
</html>";
?>