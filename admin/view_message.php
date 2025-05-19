<?php
require_once('include/initialize.php');

include 'assets/header.php';
include 'assets/sidebar.php';

$crud = new action();

if(!isset($_GET['view_id'])){
	redirect('index.php?page=Messages');
	if($_GET['view_id'] ===""){
		redirect('index.php?page=Messages');
	}
}

$msg_id = $_GET['view_id'];
$res_data = $crud->viewMessageRequest($msg_id);

?>
<main id="main" class="main">
<div class="pagetitle">
      <h1 >View Message</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT."/admin";  ?>" 
           "
          >Home</a></li>
          <li class="breadcrumb-item" >Pages</li>
          <li class="breadcrumb-item active" >Message</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
       

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           
        </div>


        <div class="row">
        	<div class="col">
        		<p>Date : <strong><?php echo date("d M Y h:m a",strtotime($res_data->date_message)); ?></strong> </p>

        	</div>
        	<?php

        	$sys_info = $res_data->problem_type;
        	$status = '';

        	if($sys_info === 'system error'){
        		$status = 'warning';
        	}else if($sys_info === 'bug'){
        		$status = 'danger';
        	}else{
        		$status = 'primary';
        	}

        	 ?>
        	<div class="col-3"><p><strong>Problem Type : </strong><strong><span class="badge bg-<?php echo $status; ?>"><?php echo $res_data->problem_type; ?> </span></strong> </p></div>

        </div>
        <hr class="mt-0">
          <div class="card-body">          	
          	<div class="row">
          		<div class="col">
          			<label class=""><strong>Sender:</strong> <strong><h4 class="mt-1"><?php echo $res_data->name; ?></h4></strong></label>

          			<hr>
          			<p><?php echo $res_data->message; ?></p>

          			<?php
          			$isTrue_pic = $res_data->screen_shot;
          			$link = '';

          			if($isTrue_pic !=''){
          				$link = $res_data->screen_shot;
          			}else{
          				$link = '#';
          			}


          			 ?>
          			<a href="<?php echo $link; ?>">
          				<img src="assets/screenshot/<?php echo $res_data->screen_shot; ?>" class="w-50" alt="Image">
          			</a>


          		</div>

              <div class="commentSection">
                <h5 class="mt-2 mb-4"><strong>Comments..</strong></h5>
                <div class="display-comment-section">
                  


                </div>

          		<div class="">


          <form id="msg_comment_form" class="msg_comment_form">

              <input type="hidden" name="message_id" class="message_id" id="message_id" value="<?php echo $msg_id; ?>">
              <input hidden name="hidden_user_id" id="hidden_user_id" value="<?php echo $_SESSION['user_id']; ?>">


        <div id="display_comm" class="mt-1 mb-5 display_comm">



          <a href="#" id="clicky" class="btn btn-sm btn-primary"> add comment</a>
        </div>

                <?php
                //checking if the message is already DONE
                //check status
                $msg_status = $res_data->status;
                $btn_status = '';
                $btn_color = '';
                if($msg_status === '1'){
                  //not already DONE request
                  $btn_status = 'disabled';
                  $btn_color = 'secondary';
                }else{
                  $btn_color = 'success';
                }


                 ?>

                 <?php
                 if($user_data['type'] == 1){ ?>


                    <button type="button" class="btn btn-<?php echo $btn_color; ?> mt-2 bi bi-check <?php echo $btn_status; ?>" id="done_btn" data-id="<?php echo $res_data->user_mID; ?>" style="width: 120px;"> Done</button>

              <?php   }else{

                if($res_data->status == 1){
                  echo '
                  <button class="btn btn-success bi bi-check mt-2 bi bi-check disabled"> Request Done!</button>
                  ';

                }else{
                  echo '
                  <button class="btn btn-secondary bi bi-check mt-2 bi bi-send-exclamation disabled"> Requesting...</button>

                  ';
                }


               ?>

                <!--  <button class="btn btn-warning bi bi-pencil mt-2 " id="edit_btn"> Modify</button>
                 <button class="btn btn-danger bi bi-cancel mt-2 "> Cancel Request</button> -->

            <?php  }


                  ?>

          		</form>

          		</div>
          	</div> 

          </div>

      </div>
      

    </section>


  </main> <!------------- end of Main ----->
  <script type="text/javascript">
    const form = document.querySelector(".msg_comment_form");
    const commentField = document.querySelector('#addComment_input');
    const display_comm = document.querySelector('.display-comment');
    const comment_id = $('.message_id').val();
      
    $(function(){
      
      $('#clicky').click(function(){
        $(this).after('<label class="mb-0" id="label">Replying...</label><textarea class="form-control mt-2 mb-2" id="addComment_input" name="message_text" required="" placeholder="comment here..."></textarea><button type="submit" class="btn btn-danger mt-1" id="cancel_btn">Cancel</button><button type="submit" class="btn btn-primary mt-1 bi bi-save" id="save_btn" style="margin-left:10px;"> Save</button>');
          $(this).hide();
        return false;
      });

     $(document).on('click','#cancel_btn',function(){
      $('#addComment_input').remove();
      $(this).remove('#cancel_btn');
      $('#save_btn').remove();
      $('#label').remove();
      $('#clicky').show();
      return false;
     })
    });


//sending Comments
$(document).on('click','#save_btn',function(e){
      e.preventDefault();

      let chatInputField = $("#addComment_input").val();
      
      if(chatInputField != ''){
            $.ajax({
                url:"ajax.php?action=insert-chat",
                method:"POST",
                data:$("#msg_comment_form").serialize(),

                beforeSend:function(){


                },
                success:function(response){
                   $('#addComment_input').remove();
                    $("#cancel_btn").remove('#cancel_btn');
                    $('#save_btn').remove();
                    $('#label').remove();
                    $('#clicky').show();
                },

                error:function(xhr,status,error){
                  alert(xhr.responseText);
                }

          }); 
      }else{
        msg('Input field is required!','error');

      }        
     

    });

//this code is for getting chat from the server and display in the chat box
setInterval(() =>{

  $.ajax({
    url:'ajax.php?action=get-chat',
    method:'POST',
    data:{comment_id:comment_id},

    beforeSend:function(){


    },

    success:function(response){
      $('.display-comment-section').html(response);
    },

    error:function(xhr,status,error){
      alert(xhr.responseText);
    }


  });


}, 1000);


  </script>


  <!----All Modal------->


              <div class="modal fade" id="editRequest" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Request</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="updateRequest" >
                        <div class="card-body">

                          <input  type="hidden" name="hidden_request_id" id="hidden_request_id">

                          <div class="row">
                            
                            <label for="validationDefault01" class="form-label ">Message</label>
                            <textarea class="form-control " required="">
                              
                            </textarea>     
                          </div>
                           <div class="row">
                            
                            <label for="validationDefault01" class="form-label mt-2">Screen shot</label>
                             <input type="file" class="form-control" name="">       
                          </div>
                           <div class="row">
                            
                            <label for="validationDefault01" class="form-label mt-2">Problem Type</label>
                              <select class="form-control">
                                <option>Bug</option>
                                <option>System Error</option>
                                <option>Personal Message</option>
                              </select>
                          </div>


                        </div>                       
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="save" id="save" value="Save">
                    </div>
                </form>
                  </div>
                </div>

            </div>

  <!---- End of All Modal--------->
 
 <?php
include 'assets/footer.php';

  ?>
  <script type="text/javascript">
    $(document).ready(function(){

      $(document).on('click','#done_btn',function(e){
        e.preventDefault();
       
        let um_id = $(this).attr('data-id');

            swal({
              title: "Are you sure?",
              icon:   "warning",
              text:'By clicking the "OK" Button below you agree to mark this message to "DONE" ',
              buttons: true,
              dangerMode: true,
              }).then((willconfirmed) => {

                if(willconfirmed){
                  $.ajax({
                      url:'ajax.php?action=request_Done_Msg',
                      method:'post',
                      data:{um_id:um_id},

                      beforeSend:function(data){

                      },

                      success:function(data){
                        message('Done Request!','success');
                      }

                    });

                }else{
                    
                }
         });

      })

    });

    $(document).on('click','#edit_btn',function(e){

      $('#editRequest').modal('show');


    });
  </script>