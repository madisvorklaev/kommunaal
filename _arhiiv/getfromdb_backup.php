<?php
$dataQuery = $_POST['chartData'];
$sqlString = '';
if(empty($dataQuery))
{
    echo("Vali vähemalt üks element.");
}
else
{
    $N = count($dataQuery);
    echo("Valisid $N elementi: ");
    for($i=0; $i < $N; $i++)
    {
        // echo($dataQuery[$i] . " ");
        if($i == $N-1){
            $sqlString .= $dataQuery[$i];
        }
        else{
            $sqlString .= $dataQuery[$i] .',';
        }
    }
}
print_r($sqlString);
?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="drawchart.js"></script>
</head>

<?php
$host = "localhost";
$user = "test";
$pass = "t3st3r123";
$db = "test";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sqlQuery = "SELECT $sqlString FROM 10163348_madisvorklaev WHERE 1";
$result = mysqli_query($conn,$sqlQuery);
$array = array();
while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
    array_push($array, $row);
}
$js_array = json_encode($array);
file_put_contents('test.txt', $js_array);
echo 'JS ' .$js_array;
mysqli_close($conn);
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([

            ['Date', 'Visits'],
            <?php
            echo "BLAVLAVLA";
            $query = "SELECT count(date) AS count, $sqlString FROM 10163348_madisvorklaev GROUP BY date ORDER BY date";

            $exec = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($exec)){

                echo "['".$row['cold_water']."',".$row['count']."],";
            }
            ?>

        ]);

        var options = {
            title: 'Date wise visits'
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
        chart.draw(data, options);
    }
</script>


<body>
<div id="columnchart" style="width: 900px; height: 500px;"></div>
</body>
</html>