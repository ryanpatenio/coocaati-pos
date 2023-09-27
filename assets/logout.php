<?php

require_once('../admin/include/initialize.php');
@session_start();

unset($_SESSION['user_id'] );
unset($_SESSION['account_name']); 
unset($_SESSION['type']);
unset($_SESSION['job']);
unset($_SESSION['customer_id']);
unset($_SESSION['customer_name']);

session_destroy();
redirect(WEB_ROOT."index.php");

 ?>