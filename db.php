<div id = "wrap">
<?php
$_SERVER['REQUEST_METHOD'] == 'POST';
$date = $_REQUEST['date'].'-01'; //formaat YYYY-MM, SQL tahab YYYY-MM-DD. Lisatakse, et kuupäev on alati 01
$cold = $_REQUEST['cold'];
$hot = $_REQUEST['hot'];
$enight = $_REQUEST['enight'];
$eday = $_REQUEST['eday'];

$sqlquery = "INSERT INTO 10163348_madisvorklaev (date, cold_water, hot_water, electricity_night, electricity_day)
    VALUES ('$date', '$cold', '$hot', '$enight', '$eday')";
if (mysqli_query($connection, $sqlquery)) { //$connection on global, defineeritud functions.php
    echo "Andmete sisestamine õnnestus!";
} else {
    echo "Error: " . $sqlquery . "<br>" . mysqli_error($connection);
}
?>
</div>