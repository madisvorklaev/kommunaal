<?php
$dataQuery = $_POST['chartData'];
$asd = 'qwerty';
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
        echo($dataQuery[$i] . " ");
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

</head>

<?php
$host = "localhost";
$user = "test";
$pass = "t3st3r123";
$db = "test";
$conn = mysqli_connect($host, $user, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$getvalues = "SELECT cold_water FROM 10163348_madisvorklaev WHERE 1";
$result = mysqli_query($conn,$getvalues);
$array = array();
//if ($result->num_rows > 0) {
    // output data of each row
    //while($row = $result->fetch_assoc()) {
    while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
  //  $row = mysqli_fetch_array($result,MYSQLI_NUM);
//printf ("%s (%s)\n",$row[0],$row[1]);
        array_push($array, $row);
       // $array[] = $row['cold_water'];
      //  echo "<br>". $row["cold_water"] . "<br>";
   // }
//} else {
  //  echo "0 results";

}
$js_array = json_encode($array);
//print_r($array) ;
echo 'JS' .$js_array;
mysqli_close($conn);

?>
<script type="text/javascript">

    var obj = <?php echo json_encode($array); ?>;

for (i=0; i<obj.length; i++){
    console.log(obj[i]);
}

    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Element');
        data.addColumn('number', 'Percentage');
        for (i=0; i<obj.length; i++){
            myVal = parseFloat($.trim(obj[i][1]));
            data.addRows([(['a', {v: myVal, f: myVal.toFixed(6)}])
         //   data.addRows([
           // console.log(obj[i])

           // ['a', obj[i]]

        ]);
    }
        // Instantiate and draw the chart.
        var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
        chart.draw(data, null);
    }
</script>

<div id="myPieChart"/>
