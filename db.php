<?php
$date = htmlspecialchars($_POST['date']);
$cold = htmlspecialchars($_POST['cold']);
$hot = htmlspecialchars($_POST['hot']);
$enight = htmlspecialchars($_POST['enight']);
$eday = htmlspecialchars($_POST['eday']);

header("Location: http://enos.itcollege.ee/~mvorklae/kommunaalid/index.php");
$host = "localhost";
$user = "test";
$pass = "t3st3r123";
$db = "test";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO 10163348_madisvorklaev (date, cold_water, hot_water, electricity_night, electricity_day)
    VALUES ('$date', '$cold', '$hot', '$enight', '$eday')";
print_r($sql);
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
</body>
</html>