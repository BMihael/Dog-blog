<?php
    if(!defined('__Miha__')){
        die("Hacking attempt");
    }

    $databaseName = "dogblogdatabase";
    $mysql = mysqli_connect("localhost", "root", "", $databaseName) or die("Cannot connect");
?>