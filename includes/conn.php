<?php

   $connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }