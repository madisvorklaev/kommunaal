<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
google.setOnLoadCallback(drawChart);

function drawChart() {
    alert("eeee")
    var jsonData = $.ajax({
        url: "getfromdb.php",
        dataType:"json",
        async: false
    }).responseText;

    // Create our data table out of JSON data loaded from server.

    var chart = new google.visualization.DataTable(document.getElementById('chartdiv');
    chart.draw(jsonData, null);
    window.alert("sometext");
}
</script>

PEALE DB CONNECTIONIT:
$getvalues = "SELECT date, cold_water FROM 10163348_madisvorklaev WHERE 1";
$result = $conn->query($getvalues);
/*if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()) {
 echo "<br>  - Kylm: ". $row["cold_water"]. " Soe:" . $row["hot_water"] ." Kuup2ev" . $row["date"] . "<br>";
 }
 } else {
 echo "0 results";
 }*/
mysqli_close($conn);

//http://www.agcross.com/2015/01/connecting-a-google-chart-to-a-mysql-database-part-2/
$table = array();
$table['cols'] = array(
//Labels for the chart, these represent the column titles
array('id' => '', 'label' => 'Date', 'type' => 'string'),
array('id' => '', 'label' => 'Cold W', 'type' => 'number')
);
$rows = array();
foreach($result as $row){
    $temp = array();

//Values
    $temp[] = array('v' => (string) $row['date']);
    $temp[] = array('v' => (float) $row['cold_water']);
    $rows[] = array('c' => $temp);
}
$result->free();

$table['rows'] = $rows;

$jsonTable = json_encode($table, true);
echo $jsonTable;
?>