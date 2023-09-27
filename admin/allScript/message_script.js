$(document).ready(function(){

	$(document).on('submit','#AddRequest_form',function(e){
		e.preventDefault();

		let fd = new FormData($('#AddRequest_form')[0]);
		let files = $('#image_screenshot')[0].files;

		$.ajax({
			url:'ajax.php?action=addingRequesMsg',
			method:'post',
			data:fd,
			contentType:false,
            processData:false,
            cache:false,

			success:function(data){
				console.log(data);
				if(data == 1){
					message('New Request Created Successfully','success');
				}
				else {
					message('an error occured!','danger');
				}

			},

			error:function(xhr,status,error){
				console.log(xhr.responseText);
			}



		});

	});

	function updateRequest(){

		

		// let user_mid = 
		// let update_message = 
		// let img = 
		// let problm_type = 

	}


});