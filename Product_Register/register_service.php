<?php
require_once('../Repository/db_config.php');
require_once('../Repository/Product_Registration.php');
$myself = new Product_Registration(DB_USER,DB_PASS);
$myself -> login();
