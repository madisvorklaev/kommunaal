<?php
$date = htmlspecialchars($_POST['date']).'-01'; //formaat YYYY-MM, SQL tahab YYYY-MM-DD. Lisatakse, et kuupäev on alati 01
$cold = htmlspecialchars($_POST['cold']);
$hot = htmlspecialchars($_POST['hot']);
$enight = htmlspecialchars($_POST['enight']);
$eday = htmlspecialchars($_POST['eday']);

echo $date;

//header("Location: http://enos.itcollege.ee/~mvorklae/kommunaalid/index.php");
$host = "localhost";
$user = "test";
$pass = "t3st3r123";
$db = "test";
$connection = mysqli_connect($host, $user, $pass, $db);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO 10163348_madisvorklaev (date, cold_water, hot_water, electricity_night, electricity_day)
    VALUES ('$date', '$cold', '$hot', '$enight', '$eday')";
print_r($sql);
if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>
</body>
</html>