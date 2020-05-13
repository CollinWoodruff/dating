<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 11/11/2018
 * Time: 12:57 PM
 */
    $username = 'cwoodruf';
    $password = 'TSD770860cw!';
    $hostname = 'localhost';
    $database = 'cwoodruf_grc';

    echo "This is happening";

    $cnxn = @mysqli_connect($hostname,
        $username, $password, $database)
        or die("Error connecting to database: " .
        mysqli_connect_error());
    echo 'Connected to database!';
