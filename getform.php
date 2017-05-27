<div id="wrap">
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>getform</title>
</head>
<body>
<form name="query" action="?page=get" method="post"> <!--http://www.html-form-guide.com/php-form/php-form-checkbox.html-->
    Andmed graafiku jaoks</br>

    <input type="checkbox" name="chartData[]" value="cold_water" />Külm vesi</br>
    <input type="checkbox" name="chartData[]" value="hot_water" />Soe vesi</br>
    <input type="checkbox" name="chartData[]" value="electricity_night" />Öine elekter</br>
    <input type="checkbox" name="chartData[]" value="electricity_day" />Päevane elekter</br>
    <input type="submit" name="querySubmit" value="Saada päring" />
</form>
</body>
</html>