<?php
$date = $_POST['date'];
$cold = $_POST['cold'];
$hot = $_POST['hot'];
$enight = $_POST['enight'];
$eday = $_POST['eday'];
/* Valideerimine
if (empty($punktid)) {
    $error = "Punktid on määramata!";
    include 'pealeht.php';
    die();
}
else {
    header("Location: http://enos.itcollege.ee/~rpurge/mrproject/pealeht.php");
}
*/
header("Location: http://enos.itcollege.ee/~mvorklae/kommunaalid/index.php");
$host = "localhost";
$user = "test";
$pass = "t3st3r123";
$db = "test";
$conn = mysqli_connect($host, $user, $pass, $db);
// Check connection
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
/*
$getvalues = "SELECT * FROM 10163348_madisvorklaev WHERE 1";
$result = $conn->query($getvalues);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<caption>Lemmikfilmid</caption>
                   <tr><th>id</th><th>Pildi nimi</th><th>pilt</th><th>hinne</th></tr>
                   <tr><td> ". $row["cold"]. "</td><td>" . $row["hot"] ."</td><td>" . $row["date"] . "</td></tr>
           //  <br> - Kylm: ". $row["cold_water"]. " Soe:" . $row["hot_water"] ." Kuup2ev" . $row["date"] . "<br>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
*/
?>
</body>
</html>