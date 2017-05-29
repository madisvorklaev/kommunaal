<div id = "wrap">
<?php
$_SERVER['REQUEST_METHOD'] == 'POST';
$date = mysqli_real_escape_string($connection,htmlspecialchars($_REQUEST['date'].'-01')); //formaat YYYY-MM, SQL tahab YYYY-MM-DD. Lisatakse, et kuupäev on alati 01
$cold = mysqli_real_escape_string($connection, htmlspecialchars($_REQUEST['cold']));
$hot = mysqli_real_escape_string($connection, htmlspecialchars($_REQUEST['hot']));
$enight = mysqli_real_escape_string($connection, htmlspecialchars($_REQUEST['enight']));
$eday = mysqli_real_escape_string($connection, htmlspecialchars($_REQUEST['eday']));

$sqlquery = "INSERT INTO 10163348_madisvorklaev (date, cold_water, hot_water, electricity_night, electricity_day)
    VALUES ('$date', '$cold', '$hot', '$enight', '$eday')";
if (mysqli_query($connection, $sqlquery)) { //$connection on global, defineeritud functions.php
    echo "Andmete sisestamine õnnestus!";
} else {
    echo "Error: " . $sqlquery . "<br>" . mysqli_error($connection);
}
?>
</div>