<?php

// database connection

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "blog_website");

$conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);

if (!$conn) 
{
    die("connection failed:");
}

