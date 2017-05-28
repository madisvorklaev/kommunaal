<?php
    generateSqlString(); //võetakse POST väärtused getform.php-st ja luuakse $sqlString
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
    $sqlquery = "SELECT date, $sqlString FROM 10163348_madisvorklaev WHERE date >= $dateStart - INTERVAL  '1'
MONTH AND date <= $dateEnd GROUP BY date ORDER BY date";
    $exec = mysqli_query($connection,$sqlquery);
    $sqlValues = array(); //saame iga kuu sisestatud näidu
    $dates = array(); //iga näiduga kokkukäiv kuupäev
    while($row = mysqli_fetch_array($exec)) { //kuni DB pritsib, lükka massiivi
        array_push($sqlValues, $row[$sqlString]);
        array_push($dates, $row['date']);
    }
    $tableValues = array(); //kulunud hulk (vaadeldava kuu näit - eelmise kuu näit)
    for ($i = 1; $i < count($sqlValues); $i++){
        $singleValue = $sqlValues[$i]-$sqlValues[$i-1];
        array_push($tableValues, $singleValue);
    }
    for ($i = 0; $i < count($tableValues); $i++){
        echo "['".$dates[$i+1]."',".$tableValues[$i]."],"; //loob graafiku jaoks tabeli KUU | KULU
        }
    ?>
            ]);
            var options = {
                title: 'Tarbimine kuude lõikes'
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart2"));
            chart.draw(data, options);
        }
    </script>


<div id="columnchart2" style="width: 900px; height: 500px;"></div>
</div>
