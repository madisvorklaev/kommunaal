<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>getform</title>
</head>
<body>
<form name="query" action="?page=get" method="post"> <!--http://www.html-form-guide.com/php-form/php-form-checkbox.html-->
    Andmed graafiku jaoks</br>
    <input type="date" name="chartData[]" value="start" />Algus</br>
    <input type="date" name="chartData[]" value="end" />Lõpp</br>
    <input type="checkbox" name="chartData[]" value="A" />Külm vesi</br>
    <input type="checkbox" name="chartData[]" value="B" />Soe vesi</br>
    <input type="checkbox" name="chartData[]" value="C" />Öine elekter</br>
    <input type="checkbox" name="chartData[]" value="D" />Päevane elekter</br>
    <input type="submit" name="querySubmit" value="Saada päring" />
</form>
</body>
</html>