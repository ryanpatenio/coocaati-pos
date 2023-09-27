<?php
//bridge
////Created by @Ryan Anderez Patenio -->Follow in FB!	
require_once 'initialize.php';

$tryLog = new user();
$crud = new action();
$action = $_GET['action'];

if($action == 'master'){
	$login = $tryLog->AuthenticateUser();
	if($login)
		echo $login;
			
}

if($action == 'customer_login'){
	$cust_login = $tryLog->AuthenticateCustomer();

	if($cust_login)
		echo $cust_login;
}

if($action == 'customer_signup'){
	$add_new_cust = $crud->addCustomer();
	if($add_new_cust)
		echo $add_new_cust;
}

if($action == 'customer_signup_admin'){
	$add_new_cust2 = $crud->addCustomer();
	if($add_new_cust2)
		echo $add_new_cust2;
}



 ?>