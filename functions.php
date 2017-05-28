<?php
function connect_db(){
    global $connection;
    $host="localhost";
    $user="test";
    $pass="t3st3r123";
    $db="test";
    $connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
    mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function login(){
    global $connection;
    global $errors;
    $errors= array();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header("Location: ?page=kysi");
    }
    else if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //https://www.w3schools.com/php/php_superglobals.asp
        $user = mysqli_real_escape_string($connection, $_REQUEST['user']);
        $pass = mysqli_real_escape_string($connection, $_REQUEST['pass']);

        if (empty($user)){
            $errors[]="Kasutajanimi on puudu";
        }
        if (empty($pass)) {
            $errors[]="Salasõna on puudu";
        }
        if (empty($errors)) {
            //uus if, check against db. kui k6ik on ok, siis session.user=1 ja return;
            $userQuery = "SELECT id FROM 10163348_kylastajad WHERE username='$user' AND passw=SHA1('$pass')"; //tegelikult ükskõik mis väli valida, tähtis on ainult, et oleks vaste
            $userResult = mysqli_query($connection, $userQuery) or die ("$userQuery - ". mysqli_error($connection));
            if (mysqli_num_rows($userResult) != 0){
                $_SESSION['loggedin'] = true;
                $_SESSION['user'] = $user;
                header("Location: ?page=kysi");
            }
            else {
                $errors[]="Vale kasutajanimi või parool";
                include_once('views/login.html');
            }
            return;
        }
        include_once('views/login.html');
    }
    else {
        include_once('views/login.html');
    }
}

function logout(){
    $_SESSION=array();
    session_destroy();
    header("Location: ?");
}

function generateSqlString(){
    global $sqlString;
    global $dateStart;
    global $dateEnd;
    global $errors;
    $_SERVER['REQUEST_METHOD'] == 'POST';
    if (isset($_REQUEST['chartData'])){
    $dataQuery = $_REQUEST['chartData']; //chartData on array for future purposes. Mõte on ühel graafikul kuvada mitut kululiiki
    $dateQuery = $_REQUEST['dateData']; //dateData[0] on startDate ja  dateData[1] on endDate

        for($i=0; $i < count($dataQuery); $i++) //kuna chartData[] koosneb praegu ainult ühest väärtusest, pole seda põhimõtteliselt vaja, aga tuleviku mõistes on olemas
        {
            if($i == count($dataQuery)-1){
                $sqlString .= $dataQuery[$i];
            }
            else{
                $sqlString .= $dataQuery[$i] .',';
            }
        }
        if ($dateQuery[0]>0){ //kui alguskuupäev on määratud (YYYY-MM)
            $dateStart = '"'.$dateQuery[0].'-01"'; //tee formaat YYYY-MM-DD SQLi jaoks
        }
        else $dateStart = "1000-01-01";
        if ($dateQuery[1]>0){ //kui lõpukuupäev on määratud (YYYY-MM)
            $dateEnd = '"'.$dateQuery[1].'-01"'; //tee formaat YYYY-MM-DD SQLi jaoks
        }
        else $dateEnd = '"'.date("Y-m-d").'"'; //tänane kuupäev


    }
    else{
        $errors[]="Vali vähemalt üks element.";
        include_once('views/getform.html');
    }
}