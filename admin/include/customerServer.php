<?php
//bridges

require_once 'initialize.php';

$tryLog = new user();
$crud = new action();
$action = $_GET['action'];

if($action == 'updateCustomerProfile'){
	$updateCustomerProfile = $crud->updateCustomerData();
	if($updateCustomerProfile)
		echo $updateCustomerProfile;
}
if($action == 'getProd_info'){
	$prod_info = $crud->getProductInfo();
	if($prod_info)
		echo $prod_info;
}
if($action == 'getMyOrderList'){
	$Orderlist = $crud->getMyOrderList();
	if($Orderlist)
		echo $Orderlist;
}


if($action == 'cancelMyOrder'){
	$cancelOrder = $crud->cancelMyOrder();
	if($cancelOrder)
		echo $cancelOrder;
}

if($action == 'restoreMyOrder'){
	$restoreOrder = $crud->restoreMyOrder();
	if($restoreOrder)
		echo $restoreOrder;
}
if($action == 'getOrderListData'){
	$getData = $crud->getOrderListData();
	if($getData){
		echo $getData;
	}
}

 ?>