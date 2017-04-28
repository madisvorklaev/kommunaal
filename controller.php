<?php
//$pics = array("nameless1.jpg","nameless2.jpg","nameless3.jpg","nameless4.jpg","nameless5.jpg","nameless6.jpg",);

require_once('head.html');

if (isset($_GET["page"])) $parameter = $_GET["page"];
if (!empty($parameter))
    switch ($parameter) {
        case 'sisesta':
            include 'sendform.php';
            break;
        case 'kysi':
            include 'getform.php';
            break;
        case 'get':
            include 'getfromdb.php';
            break;
        case 'set':
            include 'db.php';
            break;
        default:
            include 'pealeht.php';
    }
else include 'pealeht.php';
require_once('foot.html');
?>