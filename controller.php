<?php
//$pics = array("nameless1.jpg","nameless2.jpg","nameless3.jpg","nameless4.jpg","nameless5.jpg","nameless6.jpg",);
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
            include_once 'pealeht.php';
            break;
    }
else include 'pealeht.php';
require_once('views/foot.html');
?>