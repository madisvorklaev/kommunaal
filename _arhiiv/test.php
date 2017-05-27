<?php
//$con = mysqli_connect('hostname','username','password','database');
?>


<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Visits'],
            ['2015-09-01','100'],
            ['2015-09-02','80'],
            ['2015-09-03','210'],
        ]);

        var options = {
            title: 'Date wise visits'
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
        chart.draw(data, options);
    }
</script>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>
        Create Google Charts
    </title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>
<body>
<div id="columnchart" style="width: 900px; height: 500px;"></div>
</body>
</html>