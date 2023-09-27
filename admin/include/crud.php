<?php 

class action{
//Created by @Ryan Anderez Patenio -->for more info please DM in FB!	
//1356 lines of Code!

function add_product(){
	extract($_POST);
	global $mydb;

	$data = " prod_name = '$productName' ";
	$data .= ", prod_price = '$productPrice' ";
	
	$data .= ", prod_desc = '$product_description' ";
	$data .= ", cat_id = '$cat_id' ";
	$data .= ", status = '1' ";

	if($_FILES['avatar_img']['tmp_name'] != ''){
						$r_product = strtotime(date('y-m-d H:i')).'_'.$_FILES['avatar_img']['name'];
						$move = move_uploaded_file($_FILES['avatar_img']['tmp_name'],'assets/avatar/'. $r_product);
					$data .= ", avatar = '$r_product' ";

	}

	$mydb->setQuery("INSERT INTO product SET ".$data);
	$cur = $mydb->executeQuery();

	if($cur){
		return 1;
	}else{
		return 2;
	}


}

function addCategory(){
	extract($_POST);

	global $mydb;

	
	$mydb->setQuery("INSERT INTO category (name) VALUES('".$cat_name."')");
	$cur = $mydb->executeQuery();

	if($cur){
		return 1;
	}else{
		return 2;
	}
}

function addCustomer(){
	global $mydb;
	extract($_POST);

	$new_md5Pass = md5($cust_password);

	//$addString = strtotime(date('y-m-d H:i'))."";

	$data = " name = '$customerName' ";
	$data .= ", contact = '$contact1' ";
	$data .= ", username = '$cust_username' ";
	$data .= ", password = '$new_md5Pass' ";
	$data .= ", address = '$address' ";
	$data .= ", avatar = '0' ";
	$data .= ", date_created = now() ";


	$mydb->setQuery("INSERT INTO customer SET ".$data);
	$cur = $mydb->executeQuery();

	if($cur){
		return 1;
	}else{
		return 2;
	}
}

//searching for new customer
function searching(){
	global $mydb;
	$mydb->setQuery("select * from customer where name like '%".$_POST['search']."%'");
	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);

		

	if($numrows > 0){
		$found = $mydb->loadSingleResult();
		echo "<select class='form-control' id='customer_id' name='customer_id' style='margin-top:10px;'>";
		echo "<option value=".$found->customer_id.">".$found->name."</option>";
		echo "</select>";
	}else{
		echo "<select class='form-control'>

		<option>No Result(s) found!</option>
		</select>";
		
	}
}

function getCustomer(){
	global $mydb;
	$mydb->setQuery("select * from customer where customer_id = '".$_POST['id']."'");
	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);

	if($numrows > 0){
		$found = $mydb->loadSingleResult();
	
	$car_data = $this->countCust_cart($_POST['id']);

	if($car_data){
		$data = array('id'=>$found->customer_id,
			'name'=>$found->name,
			'contact'=>$found->contact,
			'address'=>$found->address,
			'count'=>$car_data->count
	);
	}
	return json_encode($data);

	}else{
		return 0;
	}
}

function countCust_cart($id){
	global $mydb;
	$mydb->setQuery("select count(mc.cart_id) as 'count' from mycart mc,customer c,product pr where mc.customer_id = c.customer_id and mc.prod_id = pr.prod_id and mc.customer_id = '".$id."' and mc.`status` = 0");
	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);

	if($numrows > 0){
		$found = $mydb->loadSingleResult();
		return $found;
	}else{
		return 0;
	}
}

function get_customer_cart(){
	global $mydb;
	$mydb->setQuery("select mc.cart_id,pr.prod_id, pr.prod_name,pr.prod_price, mc.qty from mycart mc, product pr, customer c where mc.prod_id = pr.prod_id and mc.customer_id = c.customer_id and mc.`status` = 0 and mc.customer_id = '".$_POST['id']."'");

	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);

	if($numrows > 0){
		$i = 1;
		foreach ($cur as $data) {
			echo "
			    <tr>
			   
			      <td>".$i.".</td>
			      <td>".$data['prod_name']."</td>
			                                       
			      <td>".$data['prod_price']." Pesos each</td>
			      <td>".$data['qty']."</td>
			                                       
			      <td>
			      <button type='button' class='btn btn-danger bi bi-trash' id='remove_item_from_cart_btn' data-id=".$data['cart_id']." > Remove</button>
			           <input type='hidden' name='cart_id[]' id='cart_id[]' value=".$data['cart_id'].">
			           <input type='hidden' name='prod_id[]' id='prod_id[]' value=".$data['prod_id']."> 
			           <input type = 'hidden' name='qty[]' id='qty[]' value=".$data['qty'].">                              
	       			</td>
				</tr>
		";
	$i++;	}


	}else{
		return 0;
	}
}
function getCustomer_totalPrice(){
	global $mydb;
	$mydb->setQuery("select sum(pr.prod_price * mc.qty) as 'total' from mycart mc,product pr,customer c where mc.prod_id = pr.prod_id and mc.customer_id = c.customer_id and mc.customer_id = ".$_POST['id']." and mc.`status` = 0");
	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);
	if($numrows > 0){
		$found = $mydb->loadSingleResult();
		return $found->total;
	}else{
		return 0;
	}
}

function adding_cart(){
	global $mydb;

	$product_id = $_POST['prod_id'];
	$customer_id = $_POST['customer_id'];
	$mydb->setQuery("select * from mycart where prod_id = '".$product_id."' and customer_id = '".$customer_id."' and status = 0");
	$cur1 = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur1);

	if($numrows > 0){
		//true:: product id is exist or adding same product quantity
		$found = $mydb->loadSingleResult();
		$current_qty = $found->qty;
		$addQty = $_POST['quantity'] + $current_qty;

		$mydb->setQuery("update mycart set qty = '".$addQty."' where prod_id = '".$product_id."' and customer_id = '".$customer_id."' and status = 0");
		$cur2 = $mydb->executeQuery();
		if($cur2){
			return 1;
		}else{
			return 2;
		}
	}else{
		$mydb->setQuery("INSERT INTO mycart (customer_id,prod_id,qty,status) VALUES('".$_POST['customer_id']."','".$_POST['prod_id']."','".$_POST['quantity']."','0')");
		$cur3= $mydb->executeQuery();
			if($cur3){
			return 1;
		}else{
			return 2;
		}
	}
	
	
}
function get_total_count_cart(){
	global $mydb;
	$mydb->setQuery("select count(*) as 'total_count' from mycart where customer_id = '".$_POST['id']."' and status = 0;");
	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);
	if($numrows > 0){
		$found = $mydb->loadSingleResult();
		return $found->total_count;
	}else{
		return false;
	}
}





function confirm_checkout(){
	global $mydb;
	extract($_POST);
	$customer_id = $_POST['idd_customer'];

	$code = $this->get_auto_code();
	$start = $code->start;
	$end = $code->end;
	$autocode = $start + $end;
	//$code = rand(1,999);

	//this code is for updating only the cart or set the status into 1 to confirm that the orders are complete
	$cart_id = $_POST['cart_id'];
	for($count = 0; $count < count($cart_id); $count++){
		$data = array('cart_id'=>$cart_id[$count]);

		//query for updating the cart
		$mydb->setQuery("update mycart set status  = 1 where cart_id = '".$data['cart_id']."';");
		$cur = $mydb->executeQuery();
	}
	
	//after updating the cart..we will insert new data into table orders
	//updated query Automatic Set the order status into 1 mean "Approved" because this code is already have a payment or already paid when it orders
	$mydb->setQuery("INSERT INTO orders (customer_id, order_code, order_date, order_total, cash,exchange,status) VALUES ('".$customer_id."', '".$autocode."', now(), '".$_POST['hidden_total_price']."', '".$_POST['cash_total']."','".$_POST['exchange_total']."','1');");
	$cur2 = $mydb->executeQuery();
	$last_id = $mydb->insert_id(); //lets get the last inserted ID from the query we last inserted


	$prod_id = $_POST['prod_id'];
	//then we create a for loop and array for inserting continuesly the new data in the table order detailsQ
	for($i = 0; $i < count($prod_id); $i++){

		$data2 = array('prod_id'=>$prod_id[$i],
			'qty'=> $_POST['qty'][$i]

	);


		//Then insert new data from the table order details
		$mydb->setQuery("INSERT INTO order_details (order_id,prod_id,qty) VALUES('".$last_id."','".$data2['prod_id']."','".$data2['qty']."');");
		$cur3 = $mydb->executeQuery();
		$this->update_autocode();


	}	
	//check if the last query is executed successfully and will return error or success
	if($cur3){
		return 1;
	}else{
		return 2;
	}

}

function confirm_payment(){
	global $mydb;
	extract($_POST);

	$order_id = $_POST['hidden_order_id2'];
	$cash = $_POST['cash_amount2'];
	$exchange = $_POST['exchange2'];

	if(!empty($order_id)){
		$mydb->setQuery("UPDATE orders SET cash = '$cash',exchange = '$exchange',status = '1' WHERE order_id = $order_id;");
		$cur = $mydb->executeQuery();

		if($cur){
			return 1;
		}else{
			return 200;
		}
	}
	return false;
}


function confirm_order(){
	global $mydb;
	extract($_POST);
	$customer_id = $_POST['idd_customer'];

	$code = $this->get_auto_code();
	$start = $code->start;
	$end = $code->end;
	$autocode = $start + $end;
	//$code = rand(1,999);

	//this code is for updating only the cart or set the status into 1 to confirm that the orders are complete
	$cart_id = $_POST['cart_id'];
	for($count = 0; $count < count($cart_id); $count++){
		$data = array('cart_id'=>$cart_id[$count]);


		$mydb->setQuery("update mycart set status  = 1 where cart_id = '".$data['cart_id']."';");
		$cur = $mydb->executeQuery();
	}
	
	//after updating the cart..we will insert new data into table orders
	$mydb->setQuery("INSERT INTO orders (customer_id, order_code, order_date, order_total, cash,exchange,status) VALUES ('".$customer_id."', '".$autocode."', now(), '".$_POST['hidden_total_price']."', '0','0','0');");
	$cur2 = $mydb->executeQuery();
	$last_id = $mydb->insert_id(); //lets get the last inserted ID from the query we last inserted


	$prod_id = $_POST['prod_id'];
	//then we create an for loop and array for inserting continuesly the new data in the table order detailsQ
	for($i = 0; $i < count($prod_id); $i++){

		$data2 = array('prod_id'=>$prod_id[$i],
			'qty'=> $_POST['qty'][$i]

	);


		//Then insert new data from the table order details
		$mydb->setQuery("INSERT INTO order_details (order_id,prod_id,qty) VALUES('".$last_id."','".$data2['prod_id']."','".$data2['qty']."');");
		$cur3 = $mydb->executeQuery();
		$this->update_autocode();


	}	
	//check if the last query is executed successfully and will return error or success
	if($cur3){
		return 1;
	}else{
		return 2;
	}

}

function removing_item_from_cart(){
	global $mydb;
	$cart_id = $_POST['cart_id'];

	if(!empty($cart_id)){
		$mydb->setQuery("delete from mycart where cart_id = '".$cart_id."'");
		$cur = $mydb->executeQuery();
		if($cur){
			return 1;
		}else{
			return 2;
		}
	}else{
		return 3;
	}

	
}

function get_data_order(){
	global $mydb;

	$order_id = $_POST['order_id'];

	$mydb->setQuery("select o.order_id,c.name,c.contact,c.address,o.status,o.cash from orders o,customer c where o.customer_id = c.customer_id and o.order_id = '".$order_id."';");
	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);

	if($numrows > 0){
		$found = $mydb->loadSingleResult();
		return json_encode($found);
	}else{
		return false;
	}
}

function get_ordered_list(){
	global $mydb;

	$order_id = $_POST['order_id'];
	$mydb->setQuery("select o.order_id, p.prod_name,p.prod_price,od.qty from orders o,product p,order_details od where o.order_id = od.order_id and od.prod_id = p.prod_id and od.order_id = '".$order_id."'");
	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);

	if($numrows > 0){
			$count = 1;
		foreach ($cur as $data) {
		
			echo "
				  <tr>
                        <td>".$count."</td>
                        <td>".$data['prod_name']."</td>                                       
                        <td>".$data['prod_price']."</td>
                        <td>".$data['qty']."</td>                                       
                  </tr>  
                        

			";
		$count ++; }



	}else{
		return 0;
	}
}

function get_ordered_total(){
	global $mydb;

	$order_id = $_POST['order_id'];

	$mydb->setQuery("select o.order_id,sum(p.prod_price * od.qty)as 'total',o.status from orders o,product p,order_details od where o.order_id = od.order_id and od.prod_id = p.prod_id and od.order_id = '".$order_id."'");
	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);

	if($numrows > 0){
		 $found = $mydb->loadSingleResult();
		 return $found->total;
	}else{
		return 0;
	}
}

function getOrderedStatus(){
	global $mydb;

		$order_id = $_POST['order_id'];

		$mydb->setQuery("select status from orders where order_id = '".$order_id."'");
		$cur = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);

		if($numrows > 0){
			 $found = $mydb->loadSingleResult();
			 return $found->status;
		}else{
			return 0;
		}
}

function getOrderedCash(){
	global $mydb;

		$order_id = $_POST['order_id'];

		$mydb->setQuery("select cash from orders where order_id = '".$order_id."'");
		$cur = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);

		if($numrows > 0){
			 $found = $mydb->loadSingleResult();
			 return $found->cash;
		}else{
			return 0;
		}
}

function modify_ordered_status(){
	global $mydb;

	$order_id = $_POST['order_id'];
	$order_status = $_POST['order_status'];

	$mydb->setQuery("UPDATE orders SET status = '".$order_status."' WHERE order_id = '".$order_id."';");
	$cur = $mydb->executeQuery();
	
	if($cur){
		return 1;
	}else{
		return 2;
	}
}

function get_auto_code(){
	global $mydb;
	$mydb->setQuery("select * from autocode where description = 'order_code'");
	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);

	if($numrows > 0){
		return $found = $mydb->loadSingleResult();
	}else{
		return 0;
	}
}

function update_autocode(){
	global $mydb;
	$mydb->setQuery("update autocode set end = end + 1 where description = 'order_code';");
	$cur = $mydb->executeQuery();

	if($cur){
		return 1;
	}else{
		return 2;
	}
}

function get_prod(){
	global $mydb;

	$prod_id = $_POST['prod_id'];

	$mydb->setQuery("select c.cat_id,c.name,p.prod_id,p.prod_name,p.prod_price,p.prod_desc,p.avatar from product p,category c where p.cat_id = c.cat_id and p.prod_id = '".$prod_id."'");
	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);

	if($numrows > 0){
		 $found = $mydb->loadSingleResult();
		 return json_encode($found);
	}else{
		return 1;
	}
}

function edit_product(){
	global $mydb;
	extract($_POST);

	$data = " prod_name = '$edit_prodName' ";
	$data .= ", prod_price = '$edit_prodPrice' ";
	
	$data .= ", prod_desc = '$edit_prodDesc' ";
	$data .= ", cat_id = '$edit_category' ";
	$data .= ", status = '1' ";

	if($_FILES['edit_avatar']['tmp_name'] != ''){
						$r_product = strtotime(date('y-m-d H:i')).'_'.$_FILES['edit_avatar']['name'];
						$move = move_uploaded_file($_FILES['edit_avatar']['tmp_name'],'assets/avatar/'. $r_product);
						unlink('assets/avatar/'.$old_avatar);
					$data .= ", avatar = '$r_product' ";

	}

	$mydb->setQuery("UPDATE product SET ".$data." where prod_id = '".$hidden_prod_id."';");
	$cur = $mydb->executeQuery();

	if($cur){
		return 1;
	}else{
		return 2;
	}



}

function get_data_cat(){
	global $mydb;

	$cat_id = $_POST['ID'];
	if(!empty($cat_id)){
		$mydb->setQuery("select * from category where cat_id = {$cat_id}");
		$cur = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);

		if($numrows > 0){
			$found = $mydb->loadSingleResult();
			return json_encode($found);
		}else{
			return 2;
		}
	}
	return false;
}
function update_category(){
	global $mydb;
	extract($_POST);
	$cat_name = $upCatName;
	

	if(!empty($hidden_cat_id)){
		$mydb->setQuery("update category SET name ='$cat_name' WHERE cat_id ={$hidden_cat_id}");
		$cur = $mydb->executeQuery();

		if($cur){
			return 1;
		}else{
			return 2;
		}
	}
	return false;

}

function get_data_cust(){
	global $mydb;

	if(!empty($_POST['ID'])){
		$mydb->setQuery("select * from customer where customer_id = {$_POST['ID']}");
		$cur = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);

		if($numrows > 0){
			$found = $mydb->loadSingleResult();
			return 	json_encode($found);
		}else{
			return false;
		}

	}

	return false;
}

function update_customer(){
	global $mydb;
    extract($_POST);

    $hash_pass = md5($custNewPassword);

	$data = " name = '$editCustomerName' ";
	$data .= ", contact = '$editContact' ";
	$data .= ", address = '$editAddress' ";
	$data .= ", password = '$hash_pass' ";

	if(!empty($hidden_customer_id)){
		$mydb->setQuery("UPDATE customer SET ".$data." WHERE customer_id = {$hidden_customer_id}");
		$cur = $mydb->executeQuery();
		if($cur){	
			return 1;	
		}else{
			return 2;
		}
	}

	return false;
}

function get_trans_data(){
	global $mydb;
	
	if(!empty($_POST['trans_id'])){
		$mydb->setQuery("select o.order_id,o.order_code,o.order_date,c.name from orders o,customer c where o.customer_id = c.customer_id and o.order_id = {$_POST['trans_id']}");
		$cur = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);

		if($numrows > 0){
			$found = $mydb->loadSingleResult();
			$array = array(
				'name'=>$found->name,
				'od_code'=>$found->order_code,
				'od_date'=>date("d M Y",strtotime($found->order_date)),
				'od_id'=>$found->order_id

			);
			return json_encode($array);
		}
	}

	return false;

}

function ordered_list(){
	global $mydb;

	if(!empty($_POST['od_id'])){
		$mydb->setQuery("select o.order_id, p.prod_name,p.prod_price,od.qty from orders o,product p,order_details od where o.order_id = od.order_id and od.prod_id = p.prod_id and od.order_id = {$_POST['od_id']} ");
		$cur = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);

		if($numrows > 0){
			$count = 1;
				foreach ($cur as $data) {
				
					echo "
						<tr>
								<td>".$count."</td>
								<td>".$data['prod_name']."</td>                                       
								<td>".$data['prod_price']."</td>
								<td>".$data['qty']."</td>                                       
						</tr>  
								

					";
				$count ++; }
		}
		
	}
		


}

function total_trans_data(){
	global $mydb;

	if(!empty($_POST['odd_id'])){
		$mydb->setQuery("select orders.order_total,orders.cash,orders.exchange from orders where order_id = {$_POST['odd_id']}");
		$cur = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);

		if($numrows > 0){
			$found = $mydb->loadSingleResult();
			$array = array(
				'total_p'=>$found->order_total,
				'cash'=>$found->cash,
				'exchange'=>$found->exchange

			);
			return json_encode($array);
		}
	}

	return false;
}

function new_user(){
	global $mydb;
	extract($_POST);

	$md_pass = md5($pass);

	$job = '';
	if($user_type == '1'){
		$job = 'Admin';
	}else{
		$job = 'Staff';
	}

	$data = " fname = '$fname' ";
	$data .= ", lname = '$lname' ";
	$data .= ", uname = '$uname' ";
	$data .= ", password = '$md_pass' ";
	$data .= ", type = '$user_type' ";
	
	$data .= ", job = '$job' ";

	if($_FILES['avatar']['tmp_name'] != ''){
		$my_avatar = strtotime(date('y-m-d H:i')).'_'.$_FILES['avatar']['name'];
		$move = move_uploaded_file($_FILES['avatar']['tmp_name'],'assets/avatar/'. $my_avatar);
	$data .= ", avatar = '$my_avatar' ";

	}

	$mydb->setQuery("INSERT INTO user SET ".$data);
	$cur = $mydb->executeQuery();
	
	if($cur){
		return 1;
	}else{
		return 2;
	}
}



function request_user_data(){
	global $mydb;

	if(!empty($_POST['user_id'])){
		$mydb->setQuery("select  * from user where user_id = {$_POST['user_id']}");
		$cur = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);
		if($numrows > 0){
			$found = $mydb->loadSingleResult();

			$array = array(
				'user_id'=>$found->user_id,
				'fname'=>$found->fname,
				'lname'=>$found->lname,
				'uname'=>$found->uname,
				'type'=>$found->type,
				'avatar'=>$found->avatar,

			);

			return json_encode($array);
		}

	}
}


function request_edit_user(){
	global $mydb;
	extract($_POST);

	$md_pass = md5($ed_pass);

	$job = '';
	if($ed_user_type == '1'){
		$job = 'Admin';
	}else{
		$job = 'Staff';
	}

	$data = " fname = '$ed_fname' ";
	$data .= ", lname = '$ed_lname' ";
	$data .= ", uname = '$ed_uname' ";
	$data .= ", password = '$md_pass' ";
	$data .= ", type = '$ed_user_type' ";
	
	$data .= ", job = '$job' ";

	if($_FILES['new_avatar']['tmp_name'] != ''){
		$new_avatar = strtotime(date('y-m-d H:i')).'_'.$_FILES['new_avatar']['name'];
		$move = move_uploaded_file($_FILES['new_avatar']['tmp_name'],'assets/avatar/'. $new_avatar);
		unlink('assets/avatar/'.$hidden_avt);
	$data .= ", avatar = '$new_avatar' ";

	}

	if(!empty($hidden_user_id)){
		$mydb->setQuery("UPDATE user SET ".$data." WHERE user_id = {$hidden_user_id}");
		$cur = $mydb->executeQuery();
		if($cur){
			return 1;
		}else{
			return false;
		}
	}

	return 100;


}

function request_edit_profile(){
	global $mydb;
	extract($_POST);
	$job = '';

	if($edit_profile_job == '1'){
		$job = 'Admin';
	}else{
		$job = 'Staff';
	}

	$data = " fname = '$fname' ";
	$data .= ", lname = '$lname' ";
	$data .= ", job = '$job' ";
	$data .= ", type = '$edit_profile_job' ";

	if($_FILES['temp_avatar']['tmp_name'] != ''){

		$save_avatar_profile = strtotime(date('y-m-d H:i')).'_'.$_FILES['temp_avatar']['name'];
		$move = move_uploaded_file($_FILES['temp_avatar']['tmp_name'],'assets/avatar/'. $save_avatar_profile);
		unlink('assets/avatar/'.$hidden_avatar);
		$data .= ", avatar = '$save_avatar_profile' ";		

	}

	if(!empty($user_id_profile)){
		$mydb->setQuery("UPDATE user SET ".$data." WHERE user_id = {$user_id_profile}");
		$cur = $mydb->executeQuery();
		if($cur){
			return 1;
		}else{
			return 100;
		}
	}else{
		return 200;
	}

	
}

function profile_edit_pass(){
	global $mydb;
	extract($_POST);

	$current_password = md5($currentPassword);
	$new_Password = md5($newPassword);


	$data = " password = '$new_Password' ";
	
	if(!empty($user_hdd_id)){

		//check if the current pass is the same!
		$checkPass = $this->check_input_currentPass($current_password,$user_hdd_id);
		if($checkPass == '1'){
			$mydb->setQuery("UPDATE user SET ".$data." WHERE user_id = {$user_hdd_id}");
			$cur = $mydb->executeQuery();
			if($cur){
				//return true
				return 1;
			}else{
				//return error!
				return 200;
			}
			
		}else{
			//current password didn't match to the database use Password!
			return 300;
		}

	}
	return false;
}
function check_input_currentPass($currPass,$user_id){
	global $mydb;
	$mydb->setQuery("select * from user where password = '$currPass' and user_id = {$user_id}");
	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);

	if($numrows > 0){
		return 1;
	}else{
		return false;
	}
}

function getGraph(){
	global $mydb;
		
		//query edited add "where cash not in(0) " after "from orders"
		$mydb->setQuery("select count(distinct o.customer_id) as 'customer_count',sum(o.order_total) as 'revenue',MONTHNAME(o.order_date) as 'month',DATE(o.order_date) as 'year' from orders o where cash not in(0) group by MONTHNAME(o.order_date) order by DATE(o.order_date) asc");
		$cur = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);

		if($numrows > 0){
			//true
			$data = array();
			foreach ($cur as $res) {
				array_push($data,$res);
			}
			return json_encode($data);

		}
		return false;

}

    function get_notification_list(){
        global $mydb;

        $mydb->setQuery("select um.user_mID,concat(u.fname,' ',u.lname) as 'name',u.job,um.message,timestampdiff(minute,um.date_message,now()) as time,um.`status` from user u,user_message um where u.user_id = um.user_id and date(um.date_message) = date(now()) and um.status = '0' limit 5");
        $cur = $mydb->executeQuery();
        $numrows = $mydb->num_rows($cur);

        if($numrows > 0){
            //true
           
            foreach ($cur as $data) {
            		?>
            		<li>
            		  <hr class="dropdown-divider">
            		</li>


		            <li class="notification-item">
		              <i class="bi bi-exclamation-circle text-warning"></i>
		              <div>
		              	<a href="view_message.php?view_id=<?php echo $data['user_mID']; ?>">
			                <input type="hidden" name="um_id" value="<?php echo $data['user_mID']; ?>">
	            			<h4><?php echo $data['name']; ?></h4>

	                		<p><strong><?php echo mb_strimwidth($data['message'], 0, 50, "..."); ?></strong></p>
	               		 	<p><?php
	               		 	$time = $data['time'];
	               		 	$display_time = '';
	               		 	if($time <=60){
	               		 		
	               		 		$display_time = $time.' minutes';
	               		 	}
	               		 	if($time == 60){
	               		 		$display_time = $time.' hour ago..';
	               		 	}
	               		 	if($time >= 120 ){
	               		 		$time2 = round($time / 60);
	               		 		$display_time = $time2.'hours ago';
	               		 	}
	               		 	if($time <= 1){
	               		 		$display_time = $time.' seconds';
	               		 	} 
	               		 	echo $display_time;

	               		 	 ?></p>

	               		 	</a>
		              </div>
		            </li>
            		

            		<?php
            }


        }
        return false;
    }

    function getAllMessageNotif(){
    	global $mydb;

    	$mydb->setQuery("select um.user_mID,concat(u.fname,' ',u.lname) as name,u.job,um.message,um.problem_type,um.`status` from user u,user_message um where u.user_id = um.user_id order by um.date_message asc");
    	$cur = $mydb->executeQuery();

    	$numrows = $mydb->num_rows($cur);

    	if($numrows > 0){
    		//true
    		return $cur;
    	}
    	return false;
    }
    function getMessageOfStaff($id){
    	global $mydb;

    	$mydb->setQuery("select um.user_mID,concat(u.fname, ' ', u.lname) as 'name', um.status, um.message,um.problem_type from user_message um, user u where um.user_id = u.user_id and um.user_id = {$id}");
    	$cur = $mydb->executeQuery();

    	$numrows = $mydb->num_rows($cur);

    	if($numrows > 0){
    		//true
    		return $cur;
    	}
    	return false;
    }



    function viewMessageRequest($id){
    	global $mydb;

    	$mydb->setQuery("select um.user_mID,u.user_id,concat(u.fname,' ',u.lname) as name,um.date_message,um.problem_type,um.message,um.screen_shot,um.`status` from user_message um,user u where um.user_id = u.user_id and um.user_mID = {$id}");
    	$cur = $mydb->executeQuery();
    	$numrows = $mydb->num_rows($cur);

    	if($numrows > 0){
    		//have data // true
    		$found = $mydb->loadSingleResult();
    		return $found;
    	}
    	return false;
    }

    function DoneMsgRequest(){
    	global $mydb;

    	$um_id = $_POST['um_id'];

    	if($um_id){
    		$mydb->setQuery("UPDATE user_message SET status = '1' WHERE user_mID = {$um_id}");
    		$cur = $mydb->executeQuery();

    		if($cur){
    			return 1;
    		}else{
    			return 200;
    		}
    	}

    }

    function createRequestMsg(){
    	global $mydb;
    	extract($_POST);

    $data = " user_id = '$hidden_user_id' ";
	$data .= ", message = '$msgContent' ";
	
	$data .= ", problem_type = '$problem_type' ";
	$data .= ", date_message = now() ";
	$data .= ", status = '0' ";

	if($_FILES['image_screenshot']['tmp_name'] != ''){
						$img_screenshot = strtotime(date('y-m-d H:i')).'_'.$_FILES['image_screenshot']['name'];
						$move = move_uploaded_file($_FILES['image_screenshot']['tmp_name'],'assets/screenshot/'. $img_screenshot);
					$data .= ", screen_shot = '$img_screenshot' ";

	}

	$mydb->setQuery("INSERT INTO user_message SET ".$data);
	$cur = $mydb->executeQuery();

	if($cur){
		return 1;
	}else{
		return 2;
	}

    }


    function updateCustomerData(){
    	global $mydb;
    	extract($_POST);

    	$data = " name = '$customer_name' ";
		$data .= ", contact = '$contactNumber' ";
		$data .= ", address = '$customer_address' ";

		if(!empty($customer_id)){
			//check if all the password field is not empty!
			//if not empty password field it will execute and change password!
			if(!empty($oldPassword) && !empty($newPassword) && !empty($conPassword)){
				//not Empty password Field
				if(!empty($oldPassword)){
					$pass_hash = md5($oldPassword);
					if(!empty($customer_id)){
						//check if the password from database is match!
						$mydb->setQuery("select * from customer where password = '".$pass_hash."' and customer_id = {$customer_id}");
						$result = $mydb->executeQuery();
						$numrows = $mydb->num_rows($result);
						if($numrows > 0){
							//password Match
							//then check if the new password is not empty!
							if(!empty($newPassword)){
								//not empty
								$newPass = md5($newPassword);
								$mydb->setQuery("UPDATE customer SET password = '$newPass' where customer_id = {$customer_id}");
								$executePass = $mydb->executeQuery();
								if($executePass){
									$mydb->setQuery("UPDATE customer SET ".$data." WHERE customer_id = {$customer_id}");
									$cur = $mydb->executeQuery();
									// $move = move_uploaded_file($_FILES['customer_avatar']['tmp_name'],'../assets/avatar/'. $save_avatar_profile);
									// unlink('../assets/avatar/'.$hidden_customer_avatar);
									return 1010;
								}
							}
							
						}else{
							//password from database Not Match!
							return 900;
						}
					}
	}		
			// the password Field is Not empty
			//then it will execute to change basic details and customer profile
			}else{

			//empty password field!
			if($_FILES['customer_avatar']['tmp_name'] != ''){

				$save_avatar_profile = strtotime(date('y-m-d H:i')).'_'.$_FILES['customer_avatar']['name'];
				$move = move_uploaded_file($_FILES['customer_avatar']['tmp_name'],'../assets/avatar/'. $save_avatar_profile);
				unlink('../assets/avatar/'.$hidden_customer_avatar);
				$data .= ", avatar = '$save_avatar_profile' ";		

				}

				$mydb->setQuery("UPDATE customer SET ".$data." WHERE customer_id = {$customer_id}");
				$cur = $mydb->executeQuery();

					if($cur){
						return 1;
					}else{
						return 100;
					}

				}

		}else{
			return 200;
		}

    }



    function getProductInfo(){
    	global $mydb;
    	$prod_id = $_POST['id'];

    	if(!empty($prod_id)){
		    $mydb->setQuery("select * from product where prod_id = {$prod_id}");
		    	$cur = $mydb->executeQuery();

		    	$numrows = $mydb->num_rows($cur);
		    	if($numrows > 0){
		    		$found = $mydb->loadSingleResult();

		    		 $data = array(
		    			'prod_name'=>$found->prod_name,
		    			'prod_price'=>$found->prod_price,
		    			'prod_avatar'=>$found->avatar,
		    			'prod_id'=>$found->prod_id

		    		);
		    	}
    	}else{
    		//prod id not found
    		 $data = array('error'=>'error!');
    	}

    	return json_encode($data);
    }

    function getMyOrderList(){
    	global $mydb;
    	$mydb->setQuery("select o.order_id, p.prod_name,od.qty from product p,orders o, order_details od where o.order_id = od.order_id and od.prod_id = p.prod_id and o.order_id = {$_POST['order_id']}");
    	$cur = $mydb->executeQuery();
    	$numrows = $mydb->num_rows($cur);

    	if($numrows > 0){
    		$array = array();

    		$i = 1;
    		foreach ($cur as $data) {
    			echo "

    			 <tr>
                      <td>".$i."</td>
                      <td>".$data['prod_name']."</td>                                       
                      
                      <td>".$data['qty']."</td>                                       
                  </tr>  

    			";

    		$i++; }
    		
    		
    	}
    	return false;



    }

    function cancelMyOrder(){
    	global $mydb;

    	$order_id = $_POST['order_id'];

    	if(!empty($order_id)){

	    	$mydb->setQuery("UPDATE orders SET status='4' WHERE  order_id = {$order_id};");
	    	$cur = $mydb->executeQuery();
	    	
	    	if($cur){
	    		return 1;
	    	}

	    	
	    }

	    return false;

    }

 function restoreMyOrder(){
    global $mydb;

    	$order_id = $_POST['order_id'];

    	if(!empty($order_id)){

	    	$mydb->setQuery("UPDATE orders SET status='0' WHERE  order_id = {$order_id};");
	    	$cur = $mydb->executeQuery();
	    	
	    	if($cur){
	    		return 1;
	    	}

	    	
	    }

	    return false;   	


    }

function getMyOrderListCount(){
 global $mydb;
	$mydb->setQuery("select count(*) as 'total_count' from orders where customer_id = {$_POST['id']} and status = 0;");
	$cur = $mydb->executeQuery();
	$numrows = $mydb->num_rows($cur);
	if($numrows > 0){
		$found = $mydb->loadSingleResult();
		return $found->total_count;
	}else{
		return false;
	}

    }

function getInsertChat(){
	global $mydb;
	extract($_POST);
	$msg_id = $_POST['message_id'];
	$message = $_POST['message_text'];
	$user_id = $_POST['hidden_user_id'];

	$mydb->setQuery("INSERT INTO user_message_comments (user_mID, comments, date_com,user_id) VALUES ('$msg_id', '$message', now(),$user_id);");
	$cur = $mydb->executeQuery();

	if($cur){
		return 1;
	}else{
		return 400;
	}


}

function getChat(){
	global $mydb;

	$msg_id = $_POST['comment_id'];
	$output = "";

	if(!empty($msg_id)){
		$mydb->setQuery("select u.user_id,concat(u.fname,' ',u.lname) as name,umc.comments,umc.date_com,u.avatar from user u,user_message_comments umc where u.user_id = umc.user_id and umc.user_mID = {$msg_id}");
		$cur = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);

		if($numrows > 0){

			foreach ($cur as $data) {
				$output .='
	               	                  
	                <div class="">
	                  <img src="assets/avatar/'.$data['avatar'].'" style="width: 25px;border:1px solid #ccc;border-radius: 100%;">
	                  <label style=""><strong>'.$data['name'].'</strong> - '.date("d M Y h:m a",strtotime($data['date_com'])).'</label>
	                  <p class="mt-1">'.$data['comments'].'.
	                </div>				
				';
			}

		}else{
			return $output .="No Comments yet!..";
		}
	}

return $output;
}


}

?>