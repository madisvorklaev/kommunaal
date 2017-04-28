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
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart)
    </script>
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
echo 'JS ' .$js_array;
mysqli_close($conn);
?>
<script type="text/javascript">
    var obj = <?php echo json_encode($array); ?>;
for (i=0; i<obj.length; i++){
    console.log(obj[i]);
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
<script type="text/javascript">
function drawChart() {

// Create the data table.
var data = new google.visualization.DataTable();
data.addColumn('string', 'Topping');
data.addColumn('number', 'Slices');
data.addRows([
['Mushrooms', 3],
['Onions', 1],
['Olives', 1],
['Zucchini', 1],
['Pepperoni', 2]
]);

// Set chart options
var options = {'title':'How Much Pizza I Ate Last Night',
'width':400,
'height':300};

// Instantiate and draw our chart, passing in some options.
var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
chart.draw(data, options);
}
</script>
<body>
<div id="chart_div"/>
</body>
</html>