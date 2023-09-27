$(document).ready(function(){

$(document).on('keyup','#search-input',function(e){
	e.preventDefault();
	let input = $('#search-input').val();
	
	if(input != ''){

		$('#display').css('display','');
		$.ajax({
			url:'ajax.php?action=search_customer',
			method:'POST',
			data:$(this).serialize(),

			success:function(data){
				$('#display').html(data);
			},
			error:function(error,xhr,status){
				alert(xhr.responseText);
			}

		});
	}else{

		$('#display').css('display','none');

	}


});


//when clicking the customer
$(document).on('click','#customer_id',function(e){
	e.preventDefault();
	let id = $('#customer_id').val();

	$.ajax({
		url:'ajax.php?action=click_cust',
		method:'post',
		data:{id:id},
		dataType:'json',


		success:function(data){
			//console.log(data);
			if(data){
				$('#id_customer').val(data.id);
				$('#customer_name').val(data.name);
				$('#contact').val(data.contact);
				$('#address').val(data.address);
				$('#hidden_customer_id').val(data.id);

				$('#idd_customer').val(data.id);
				
				$('#display').css('display','none');
				$('#search-input').val('');


				getCartCount();
				get_cart();
				load_total_cart();
			}
		},

		error:function(xhr,error,status){
			alert(xhr.responseText);
		}


	});


});
//event when clicking the add btn in product
$(document).on('click','#addQtyBtn',function(e){
    e.preventDefault();

    $('#addQtyModal').modal('show');
    let prd = $(this).attr('data-id');
    $('#pass_prod_id').val(prd);
    $('#quantity').focus();


  });

$(document).on('click','#add_to_cart',function(e){
	e.preventDefault();
	var prd = $('#pass_prod_id').val();
	let qty = $('#quantity').val();
	let csr = $('#id_customer').val();

	if(csr != ''){

			if(qty != ''){
					$.ajax({
						url:'ajax.php?action=adding_cart',
						method:'POST',
						data:{customer_id:csr, prod_id : prd, quantity : qty},

						beforeSend:function(){

						},
						success:function(data){
							
							if(data == 1){
								msg('Product added','success');
								$('#addQtyModal').modal('hide');
								$('#quantity').val('');

								getCartCount();
								get_cart();
								load_total_cart();
							}
						},

						error:function(xhr,status,error){
							alert(xhr.responseText);
						}


					});
						}else{
							//quantity input field empty
							msg('Quantity input Field is required!','info');
							
						}

		}else{
			msg('Please Select Customer First','warning');
		}




});	

//proceed to check out form
$(document).on('click','#checkout',function(e){
	e.preventDefault();

	let total_price = $("#hidden_total_price").val();

	if(total_price != ''){
		swal({
			title: "Please Click Ok to Continue to Payment?",
			icon:   "info",
			buttons: true,
			dangerMode: true,
			}).then((willconfirmed) => {

				if(willconfirmed){
					$('#total_pay').val(total_price);
					$('#ConfirmPaymentModal').modal('show');

				}else{
						
				}


		});
	}else{
		//no customer detected and empty cart
		msg('No Customer OR Empty Cart detected!','warning');
	}


});

//this event is for auto calculate the payment of the customer according to their cash and total to pay
$(document).on('keyup','#cash_amount',function(e){
	e.preventDefault();

	let total_to_pay = $('#total_pay').val();
	let cash = $('#cash_amount').val();
	let sum = 0;

	exchange = parseInt(cash) - parseInt(total_to_pay);
	if($('#cash_amount').val() === ''){
		$('#exchange').val('0.00');
	}else{
		$('#exchange').val(exchange);
	}
	$('#cash_total').val(cash);
	$('#exchange_total').val(exchange);

	if(parseInt(cash) >= parseInt(total_to_pay)){
		$('#error_cash').attr('class',false);
		$('#error_cash').text('');

	}else{
		
		$('#error_cash').attr('class','text-danger');
		$('#error_cash').text('insuficient amount!');
	}
});
//this event is for auto calculate the payment of the customer according to their cash and 
//total to pay
//this part of code is responsible to calculate total price order "Pending Request to approved!"
$(document).on('keyup','#cash_amount2',function(e){
	e.preventDefault();

	let total_to_pay2 = $('#total_to_pay2').val();
	let cash = $('#cash_amount2').val();
	let sum = 0;

	exchange2 = parseInt(cash) - parseInt(total_to_pay2);
	if($('#cash_amount2').val() === ''){
		$('#exchange2').val('0.00');
	}else{
		$('#exchange2').val(exchange2);
	}
	$('#cash_total2').val(cash);
	$('#exchange_total2').val(exchange2);

	if(parseInt(cash) >= parseInt(total_to_pay2)){
		$('#error_cash2').attr('class',false);
		$('#error_cash2').text('');

	}else{
		
		$('#error_cash2').attr('class','text-danger');
		$('#error_cash2').text('insuficient amount!');
	}
});


$(document).on('click','#confirm_checkout',function(e){
	e.preventDefault();

	let total_to_pay = $('#total_pay').val();
	let cash = $('#cash_amount').val();

	swal({
			title: "Are you sure you want Confirm Payment?",
			text:'Please Click the `OK` Button to Continue!',
			icon: "info",
			buttons: true,
			dangerMode: true,
			}).then((willconfirmed) => {

				if(willconfirmed){


					//triple checked
					if(parseInt(cash) >= parseInt(total_to_pay)){
						//true cash is greater than or equal to total pay

						$.ajax({
							url:'ajax.php?action=confirm_checkout',
							method:'post',
							data:$('#customer_cart_form').serialize(),

							success:function(data){
								
								if(data == 1){
									message('Order Process Complete!','success');
								}
								if(data == 2){
									message('Unexpected Error!','error');
								}
							},

							error:function(xhr,status,error){
								alert(xhr.responseText);
							}

						});
					}else{

						//insufficient cash to pay
						msg('insufficient Cash','error');

					}
										

				}else{
					//cancel	
				}

			});

});

//this event will update the payment ordered by the customer
//for confirming! in the "Pending Ruquest Side"
$(document).on('click','#confirm_Payment',function(e){
	e.preventDefault();

	let total_to_pay = $('#total_to_pay2').val();
	let cash = $('#cash_amount2').val();

	swal({
			title: "Are you sure you want Confirm Payment?",
			text:'Please Click the `OK` Button to Continue!',
			icon: "info",
			buttons: true,
			dangerMode: true,
			}).then((willconfirmed) => {

				if(willconfirmed){


					//triple checked
					if(parseInt(cash) >= parseInt(total_to_pay)){
						//true cash is greater than or equal to total pay

						$.ajax({
							url:'ajax.php?action=confirm_payment',
							method:'post',
							data:$('#updatePaymentForm').serialize(),

							success:function(data){
								// console.log(data);
								if(data == 1){
									message('Payment Ordered Successfully added!','success');
								}else if(data == 2){
									msg('Error in Server! return 200','error');
								}else{
									msg('Error in Server!','error');
								}

							},

							error:function(xhr,status,error){
								alert(xhr.responseText);
							}

						});
					}else{

						//insufficient cash to pay
						msg('insufficient Cash','error');

					}
										

				}else{
					//cancel	
				}

			});

});

$(document).on('click','#remove_item_from_cart_btn',function(e){
	e.preventDefault();

	let cart_id = $(this).attr('data-id');

	swal({
			title: "Are you sure you want remove this Item?",
			text:'Please Click the `OK` Button to Continue!',
			icon: "info",
			buttons: true,
			dangerMode: true,
			}).then((willconfirmed) => {

				if(willconfirmed){

					$.ajax({
						url:'ajax.php?action=removing_item_from_cart',
						method:'post',
						data:{cart_id : cart_id},

						success:function(data){
							if(data == 1){
								msg('Item remove Successfully!','success');
								all_load();
							}
							if(data == 2){
								msg('Unexpected error','error');
								all_load();
							}
							if(data == 3){
								msg('Unexpected error! No ID found','error');
								all_load();
							}
						},
						error:function(xhr,status,error){
							alert(xhr.responseText);
						}

					});


				}

			});

});

$(document).on('click','#mod_order_btn',function(e){
	e.preventDefault();

	let order_id = $(this).attr('data-id');
	
	$.ajax({
		url:'ajax.php?action=get_edit_order',
		method:'post',
		data:{order_id : order_id},
		dataType:'json',

		success:function(data){
			//console.log(data);

			//lets set the order id into hidden element
			$('#hidden_order_id').val(data.order_id);

			$('#customer_name_edit').val(data.name);
			$('#customer_address_edit').val(data.contact);
			$('#contact_edit').val(data.address);
			$('#edit_status').val(data.status);
			$('#status-check-if-paid').val(data.cash);
			var ed_status;
			if(data.status == '0'){
				ed_status = 'Pending';
				$('#edt_status2').prop('disabled',false);
				$('#edt_status3').prop('disabled',false);
			}else if(data.status == '1'){
				ed_status = 'Approved!';
				$('#edt_status2').prop('disabled',false);
				$('#edt_status3').prop('disabled',false);
			}else if(data.status == '2'){
				ed_status = 'Claimed';
				$('#edt_status2').prop('disabled',false);
				$('#edt_status3').prop('disabled',false);
			}else if(data.status == '4'){
				ed_status = 'Drafted';
				$('#edt_status2').prop('disabled',true);
				$('#edt_status3').prop('disabled',true);
			}

			if(data.cash == '0'){
				$('#edt_status3').prop('disabled',true);
			}else if(data.cash != '0'){
				$('#edt_status2').prop('disabled',true);
			}
			$('#edit_status').text(ed_status);

			get_ordered_cart();
			get_total_ordered();


			$('#editModal').modal('show');
		},

		error:function(xhr,status,error){
			alert(xhr.responseText);
		}

	});

});

$(document).on('click','#save_ordered_btn',function(e){
	e.preventDefault();

	let order_id = $('#hidden_order_id').val();
	let order_status = $('#order_status').val();
	let if_paid = $('#status-check-if-paid').val();

	if(order_id != ''){

			
			
			if(order_status == '1'){
				//true selected "Approve!"
				if(if_paid == '0'){
					//not already paid her/his order
					//set the order id into variable so that we can use it in the server side
					$('#hidden_order_id2').val(order_id);
					$('#updatePayment').modal('show');
				}else{
					msg("Opps! It's already Approved!",'info');
				}
				
			}else{
				//the selected status are possible "claimed or Pending"
				$.ajax({
					url:'ajax.php?action=modify_ordered_status',
					method:'post',
					data:{order_id : order_id, order_status : order_status},

					success:function(data){
						if(data == 1){
							message('Ordered updated Successfully!','success');
						}
						if(data == 2){
							message('Unexpected Error!','error');
						}
					},

					error:function(xhr,status,error){
						alert(xhr.responseText);
					}


				});
			}
		
	}

});



});


function get_cart(){
	let hid_id = $('#hidden_customer_id').val();

	$.ajax({
		url:'ajax.php?action=get_customer_cart',
		method:'post',
		data:{id:hid_id},

		success:function(data){
			$('#table-cart').html(data);
		},

		error:function(xhr,error,status){
			alert(xhr.responseText);
		}

	});
}

function load_total_cart(){
	let hidden_id = $('#hidden_customer_id').val();

	$.ajax({
		url:'ajax.php?action=get_total_cart',
		method:'post',
		data:{id:hidden_id},

		success:function(data){
			$('#total_price_cart').text('Total: '+data);
			$('#hidden_total_price').val(data);
		},

		error:function(xhr,error,status){
			alert(xhr.responseText);
		}

	});
}

function getCartCount(){
	let hidden_id = $('#hidden_customer_id').val();
	$.ajax({
		url:'ajax.php?action=load_total_cart',
		method:'post',
		data:{id:hidden_id},

		success:function(data){
			
			$('#mycart_count').text(data);
		},

		error:function(xhr,error,status){
			alert(xhr.responseText);
		}

	});
}

 get_ordered_cart  = ()=>{
 	let order_id = $('#hidden_order_id').val();
 	$.ajax({
 		url:'ajax.php?action=get_ordered_list',
 		method:'post',
 		data:{order_id : order_id},

 		success:function(data){
 			$('#display_ordered_list').html(data);
 		},

 		error:function(xhr,status,error){
 			alert(xhr.responseText);
 		}

 	});
 }

 get_total_ordered = ()=>{
 	let order_id = $('#hidden_order_id').val();
 	$('#total_price_ordered').text('');
 	$('#total_to_pay').val('');

 	$.ajax({
 		url:'ajax.php?action=get_orderd_total',
 		method:'post',
 		data:{order_id : order_id},

 		success:function(data){
 			$('#total_price_ordered').text('Total : '+data+' Pesos');
 			//$('#total_to_pay').val(data);
 			$('#total_to_pay2').val(data);
 		},
 		error:function(xhr,status,error){
 			alert(xhr.responseText);
 		}

 	});

 }
 get_ordered_status = ()=>{
 	
	 	let order_id = $('#hidden_order_id').val();
	 	// $('#total_price_ordered').text('');
	 	// $('#total_to_pay').val('');

	 	$.ajax({
	 		url:'ajax.php?action=get_orderd_status',
	 		method:'post',
	 		data:{order_id : order_id},

	 		success:function(data){
	 			
	 			$('#order_status2').val(data);
	 		},
	 		error:function(xhr,status,error){
	 			alert(xhr.responseText);
	 		}

	 	});
 }
 get_ordered_cash = ()=>{
 	let order_id = $('#hidden_order_id').val();
	 	// $('#total_price_ordered').text('');
	 	// $('#total_to_pay').val('');

	 	$.ajax({
	 		url:'ajax.php?action=get_orderd_cash',
	 		method:'post',
	 		data:{order_id : order_id},

	 		success:function(data){
	 			
	 			$('#order_cash').val(data);
	 		},
	 		error:function(xhr,status,error){
	 			alert(xhr.responseText);
	 		}

	 	});
 }

function all_load(){
	getCartCount();
	get_cart();
	load_total_cart();
}
