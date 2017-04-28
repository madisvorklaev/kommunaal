<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>sendform</title>
</head>
<body>
<form name="readings" action="?page=set" method="post" onsubmit="return validateForm()">
    <table>
        <tr><td>Kuupäev</td><td><input type="date" name="date" id="date"></td></tr>
        <tr><td>Külm vesi</td><td><input type="number" step="any" name="cold" id="cold"></td></tr>
        <tr><td>Soe vesi</td><td><input type="number" step="any" name="hot" id="hot"></td></tr>
        <tr><td>Öine elekter</td><td><input type="number" step="any" name="enight" id="enight"></td></tr>
        <tr><td>Päevane elekter</td><td><input type="number" step="any" name="eday" id="eday"></td></tr>
    </table>
    <input type="submit" name="dataSubmit" value="Saada">
</form>
</body>
</html>