<?php
require_once('functions.php');
session_start();
connect_db();
require_once('views/head.html');

if (isset($_GET["page"])) $parameter = $_GET["page"];
if (!empty($parameter))
    switch ($parameter) {
        case "login":
            login();
            break;
        case "logout":
            logout();
        case 'sisesta':
            include 'views/sendform.html';
            break;
        case 'kysi':
            include 'views/getform.html';
            break;
        case 'get':
            include 'getfromdb.php';
            break;
        case 'set':
            include 'db.php';
            break;
        default:
            include_once 'views/pealeht.html';
            break;
    }
else include 'views/pealeht.html';
require_once('views/foot.html');
?>