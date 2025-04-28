<?php

$crud_data = new action();
$user_id = $_SESSION['user_id'];

?>
<main id="main" class="main">
  <div class="pagetitle">
      <h1 style="color: white;">Messages</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT."/admin";  ?>" 
            style="color:white"
          >Home</a></li>
          <li class="breadcrumb-item" style="color:white;">Pages</li>
          <li class="breadcrumb-item active" style="color:white;">messages</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3" style="background-color:#b6e5d2;border-radius:20px;">
          <div class="card-header" style="background-color:#b6e5d2;border-radius:5px;">
            <i class="fas fa-table"></i>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#AddRequest" type="button"><i class="bi bi-plus-circle"> New</i></button>
        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-info" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>

                    <?php
                    //check if the user is admin or staff

                    if($user_data['type'] == 1){
                      echo '<th>Staff Name</th>';

                    }else{

                    }
                    
                    ?>
                    
                    <th>Message</th>
                    <th>Problem</th>               
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                <?php 
                
               if($user_data['type'] == 1){
                adminMessage();
               }else if($user_data['type'] == 2){
                staffMessage();
               }else{

               }

                	?>
                  
                </tbody>
              </table>
            </div>
          </div>
         
        </div>
      </div>

    </section>

  </main> <!------------- end of Main ----->

  <!-----Add Request Modal------->
    <div class="modal fade" id="AddRequest" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New Request</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" id="AddRequest_form" enctype="multipart/form-data">

                <input type="hidden" name="hidden_user_id" value="<?php echo $user_id; ?>">
                <div class="card-body">

                

                  <div class="row">
                    
                    <label for="validationDefault01" class="form-label ">Message</label>
                    <textarea name="msgContent" placeholder="put your message here..." id="" class="form-control" cols="30" rows="5"></textarea>     
                  </div>
                    <div class="row">
                    
                    <label for="validationDefault01" class="form-label mt-2">Screen shot (Optional)</label>
                      <input type="file" class="form-control" name="image_screenshot" id="image_screenshot">       
                  </div>
                    <div class="row">
                    
                    <label for="validationDefault01" class="form-label mt-2">Problem Type</label>
                      <select class="form-control" name="problem_type">
                        <option value="bug">Bug</option>
                        <option value="sysem error">System Error</option>
                        <option value="personal message">Personal Message</option>
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

  <!----End of Modal------>

  <script type="text/javascript" src="allScript/message_script.js"></script>

<?php
//this is for admin only


function adminMessage(){
$crud_data = new action();

  $dataM = $crud_data->getAllMessageNotif();
                  $count = 1;
                  if($dataM){
                    foreach ($dataM as $res) {
                    
                      //checking the status of the message
                      $msg_stats = $res['status'];
                      $msg_stats_color = '';
                      if($msg_stats === '1'){
                        //already Done the Request
                        $msg_stats_color = '';
                      }else{
                        $msg_stats_color = '#F5F5F5';
                      }
                      ?>
  
                    <tr style="background-color: <?php echo $msg_stats_color; ?>">
                          <td><?php echo $count; ?></td>
                          <td><?php echo $res['name']; ?></td>
                         
                          <td>
                          <?php echo mb_strimwidth($res['message'], 0, 50, "..."); ?> 
                          </td>
  
  
                          <?php
                          $sys_msg = '';
                         
                        
  
                          $problem_type = $res['problem_type'];
  
                          if($problem_type === 'system error'){
                            $sys_msg = 'warning';
                          }else if($problem_type === 'bug'){
                            $sys_msg = 'danger';
                          }else{
                            $sys_msg = 'primary';
                          }
  
                           ?>
  
  
  
                          <td><span class="badge bg-<?php echo $sys_msg; ?>"><?php echo  $res['problem_type']; ?></span></td>
                          <td><a href="view_message.php?view_id=<?php echo $res['user_mID']; ?>" class="btn btn-sm btn-primary bi bi-search">View</a>
  
                          </td>
                      </tr>
  
  
                      <?php
                    $count++; }
                 }                 
}

//this is for Staff or User Only

function staffMessage(){
  $crud_data = new action();
  $user_id = $_SESSION['user_id'];
  $dataM = $crud_data->getMessageOfStaff($user_id);
                  $count = 1;
                  if($dataM !='0'){
                                      foreach ($dataM as $res) {
                    
                    //checking the status of the message
                    $msg_stats = $res['status'];
                    $msg_stats_color = '';
                    if($msg_stats === '1'){
                      //already Done the Request
                      $msg_stats_color = '';
                    }else{
                      $msg_stats_color = '#F5F5F5';
                    }
                    ?>

                  <tr style="background-color: <?php echo $msg_stats_color; ?>">
                        <td><?php echo $count; ?></td>
                        
                       
                        <td>
                        <?php echo mb_strimwidth($res['message'], 0, 50, "..."); ?> 
                        </td>
                    

                        <?php
                        $sys_msg = '';
                       
                      

                        $problem_type = $res['problem_type'];

                        if($problem_type === 'system error'){
                          $sys_msg = 'warning';
                        }else if($problem_type === 'bug'){
                          $sys_msg = 'danger';
                        }else{
                          $sys_msg = 'primary';
                        }

                         ?>



                        <td><span class="badge bg-<?php echo $sys_msg; ?>"><?php echo  $res['problem_type']; ?></span></td>
                        <td><a href="view_message.php?view_id=<?php echo $res['user_mID']; ?>" class="btn btn-sm btn-primary bi bi-search">View</a>

                        </td>
                    </tr>


                    <?php
                  $count++; }
                  }
}




 ?>