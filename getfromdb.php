<?php
generateSqlString(); //võetakse POST väärtused getform.php-st ja luuakse $sqlString
echo $dateStart .'   '. $dateEnd;
?>
<div id="wrap">

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['Kuu', 'Kulu'],
                <?php
                $sqlquery = "SELECT date, $sqlString FROM 10163348_madisvorklaev WHERE date >= $dateStart AND date <= $dateEnd GROUP BY date ORDER BY date";

                $exec = mysqli_query($connection,$sqlquery);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['date']."',".$row[$sqlString]."],";
                }
                ?>

            ]);

            var options = {
                title: 'Tarbimine kuude lõikes'
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
            chart.draw(data, options);
        }
    </script>
<div id="columnchart" style="width: 900px; height: 500px;"></div>
   <?php echo $sqlquery; ?>
</div>
