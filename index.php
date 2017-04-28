<!--http://stackoverflow.com/questions/26981435/populate-drop-down-form-with-months-and-year-php-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <title>Kommunaalkulude arvestus</title>
</head>
<br>
<?php if (isset($error)){ echo $error;} ?>
<?php
//include('getfromdb.php');
  //  include('db.php');
?>


<form name="readings" action="db.php" method="post" onsubmit="return validateForm()">
    <table>
        <tr><td>Kuupäev</td><td><textarea rows="1" cols="30" name="date" id="date"></textarea></td></tr>
        <tr><td>Külm vesi</td><td><textarea rows="1" cols="30" name="cold" id="cold"></textarea></td></tr>
        <tr><td>Soe vesi</td><td><textarea rows="1" cols="30" name="hot" id="hot"></textarea></td></tr>
        <tr><td>Öine elekter</td><td><textarea rows="1" cols="30" name="enight" id="enight"></textarea></td></tr>
        <tr><td>Päevane elekter</td><td><textarea rows="1" cols="30" name="eday" id="eday"></textarea></td></tr>
    </table>
    <input type="submit" name="dataSubmit" value="Saada">
</form>

<form name="query" action="getfromdb.php" method="post"> <!--http://www.html-form-guide.com/php-form/php-form-checkbox.html-->
    Andmed graafiku jaoks</br>
    <input type="checkbox" name="chartData[]" value="A" />Külm vesi</br>
    <input type="checkbox" name="chartData[]" value="B" />Soe vesi</br>
    <input type="checkbox" name="chartData[]" value="C" />Öine elekter</br>
    <input type="checkbox" name="chartData[]" value="D" />Päevane elekter</br>
    <input type="submit" name="querySubmit" value="Saada päring" />
</form>

    <div id="myPieChart"/>

    </body>
</html>