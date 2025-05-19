//this is from customer Side! for clicking add to car Button
  $(document).ready(function(){
    const preloader = document.querySelector('#preloader');

    $(document).on('click','#add_to_cart',function(e){
      e.preventDefault();
      let = $('#add_to_cart_form2').get(0).reset();

      $("#prod_name").text('');
      $("#prod_price").text('');
      $('#prod_avatar')[0].files;
      $('#hidden_prod_id').val();
      $('#quantity2').focus();


      //lets check if already have an customer ID before the Customer can ADD TO CART
      let customer_id = $('#hidden_customer_id').val();
      if(customer_id !='null'){
        //already log in the customer can add to cart now!
        //then we check if selected have a product ID to prevent Error!
        let prod_id = $(this).attr('data-id');

         
         $('#addQtyModalCus').modal('show');
          //then we request to retrieve data from database! using this id
          //then we will set this data into json array
          $.ajax({
            url:'admin/include/customerServer.php?action=getProd_info',
            method:'POST',
            data:{id:prod_id},
            dataType:'json',
            cache:false,
            async:false,

            beforeSend:function(){

            },

            success:function(resp){
              //console.log(resp);

              if(resp.error == 'error'){
              	msg('Unexpected error!','error');
              }
              $('#prod_name').text(resp.prod_name);
              $('#prod_price').text(resp.prod_price+" Pesos");
              $('#prod_avatar').attr('src',"admin/assets/avatar/"+resp.prod_avatar);
              $("#hidden_prod_id").val(prod_id);
              $('#hidden_customer_id2').val(customer_id);
            },

            error:function(xhr,status,error){
              alert(xhr.responseText);
            }

          });


      }else{
       // not already log in the customer can't add to Car!
       msg('Please sign up first! or login','info');
       $('#sign_up').modal('show');
      }

      
    
        

    });

  });



  //this code for adding product to customer cart
  $(document).on('click','#add_to_cart2',function(e){
	e.preventDefault();
	var prd = $('#hidden_prod_id').val();
	let qty = $('#quantity2').val();
	let csr = $('#hidden_customer_id2').val();

	if(csr != ''){

			if(qty != ''){
					$.ajax({
						url:'admin/ajax.php?action=adding_cart',
						method:'POST',
						data:{customer_id:csr, prod_id : prd, quantity : qty},

						beforeSend:function(){

						},
						success:function(data){
							
							if(data == 1){
								msg('Product added','success');
								$('#addQtyModalCus').modal('hide');
								$('#quantity2').val('');

								//getCartCount();
								//get_cart();
								//load_total_cart();
								load_all();
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
			msg('Please Sign up or Login first! Before you proceed to any transaction','warning');
		}


});


$(document).on('click','#checkout',function(e){
  e.preventDefault();
  
  let total_price;


  const selectedOption = $('#discountSelect').find(':selected');
  const type = selectedOption.data('type');
  const discountedPrice = parseFloat($('#hidden_discounted_price').val()) || 0;

  if(discountedPrice === 0){
    //use the total price
     total_price = $("#hidden_total_price").val();
  }else{
    total_price = $("#hidden_discounted_price").val();      
  }
  if(type === 'pwd' || type === 'student' || type === 'senior'){
       if($('#cardId').val() == ''){
        msg('Card ID is required!','info');
        return;
       }
    }
  console.log(type);

  if(total_price != ''){
    swal({
      title: "Are you sure you want to Confirm this Order?",
      icon:   "info",
      buttons: true,
      dangerMode: true,
      }).then((willconfirmed) => {

        if(willconfirmed){
          $('#total_pay').val(total_price);
          $('#setOrder').modal('show');

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


$(document).on('click','#confirm_checkout',function(e){
  e.preventDefault();

  let total_to_pay = $('#total_pay').val();
  let cash = $('#cash_amount').val();

  swal({
      title: "Are you sure you want Confirm your Order?",
      text:'Please Click the `OK` Button to Continue!',
      icon: "info",
      buttons: true,
      dangerMode: true,
      }).then((willconfirmed) => {

        if(willconfirmed){


            $.ajax({
              url:'admin/ajax.php?action=confirm_order',
              method:'post',
              data:$('#customer_cart_form').serialize(),

              success:function(data){
                console.log(data)
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
            url:'admin/ajax.php?action=removing_item_from_cart',
            method:'post',
            data:{cart_id : cart_id},

            success:function(data){
              if(data == 1){
                msg('Item remove Successfully!','success');
                load_all();
              }
              if(data == 2){
                msg('Unexpected error','error');
                load_all();
              }
              if(data == 3){
                msg('Unexpected error! No ID found','error');
                load_all();
              }
            },
            error:function(xhr,status,error){
              alert(xhr.responseText);
            }

          });


        }

      });

});

$(document).on('click','#trans_btn',function(e){
  e.preventDefault();
 $('#myTransaction').modal('show');

});

//this code will requesting data from the server to provide transaction details into modal
 $(document).on('click','#btn_view_transaction',function(e){
    e.preventDefault();

    let trans_id = $(this).attr('data-id');

    $.ajax({
        url:'admin/ajax.php?action=request_trans_data',
        method:'post',
        data:{trans_id : trans_id},
        dataType:'json',

        success:function (data) {
            $('#hidden_od_id').val(data.od_id);
            $('#od_code').text(data.od_code);
            $('#od_date').text(": "+data.od_date);
            $('#od_name').text(": "+data.name);
            
            $('#viewModal').modal('show');
            load_myTable();
            total_cash_ex();
        },

        error:function(error,status,xhr){
            alert(xhr.responseText);
        }

    });
});
//this function will return data from server in transaction details table
 const load_myTable = () =>{
    let od_id = $('#hidden_od_id').val();
    
    $.ajax({
        url:'admin/ajax.php?action=ordered_list',
        method:'post',
        data: {od_id : od_id},
        

        success:function(data){
            $('#trans_table_display').html(data);            
        },

        error:function(xhr,status,error){
            alert(xhr.responseText);
        }

    });
    
}
//this function will return data from server transaction details cash and exchange
const total_cash_ex = () =>{
    let odd_id = $('#hidden_od_id').val();

    $.ajax({
        url:'admin/ajax.php?action=total_trans_data',
        method:'post',
        data: {odd_id : odd_id},
        dataType: 'json',

        success:function(data){
            
            $('#tt_price').text(": "+data.total_p);
            $('#od_cash').text(": "+data.cash);
            $('#od_exchange').text(": "+data.exchange);

        },

        error:function(xhr,status,error){
            alert(xhr.responseText);
        }

    });
    

}

function get_cart(){
  let hid_id = $('#hidden_customer_id').val();

  $.ajax({
    url:'admin/ajax.php?action=get_customer_cart',
    method:'post',
    data:{id:hid_id},

    success:function(data){
      $('#table-cart2').html(data);
    },

    error:function(xhr,error,status){
      alert(xhr.responseText);
    }

  });
}

function load_total_cart(){
  let hidden_id = $('#hidden_customer_id').val();

  $.ajax({
    url:'admin/ajax.php?action=get_total_cart',
    method:'post',
    data:{id:hidden_id},

    success:function(data){
      $('#total_price_cart').text('Original Total Price: '+data);
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
    url:'admin/ajax.php?action=load_total_cart',
    method:'post',
    data:{id:hidden_id},

    success:function(data){
      
      $('#cust-cart-count2').text(data);
    },

    error:function(xhr,error,status){
      alert(xhr.responseText);
    }

  });
}


function getMyOrderCount(){
  let hidden_id = $('#hidden_customer_id').val();
  $.ajax({
    url:'admin/ajax.php?action=load_MyOrder_Count',
    method:'post',
    data:{id:hidden_id},

    success:function(data){
      
      $('#myOrderCount').text(data);
    },

    error:function(xhr,error,status){
      alert(xhr.responseText);
    }

  });
}

const load_all =() =>{
get_cart();
load_total_cart();
getCartCount();
getMyOrderCount();

}

load_all();

