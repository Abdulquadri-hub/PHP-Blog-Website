<?php
session_start();  

// define  constant in php
// root path i.e the real folder
define("ROOT_PATH", realpath(dirname(__FILE__)));

// base_url
// it work for connecting links, css. it point to the domain name
define("BASE_URL", "http://localhost/blog");
// var_dump(ROOT_PATH);