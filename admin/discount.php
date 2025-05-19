<?php require 'assets/checker.php'; ?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1 >Discount</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT."/admin";  ?>" 
            
          >Home</a></li>
          <li class="breadcrumb-item" >Pages</li>
          <li class="breadcrumb-item active" >Discount</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

      <div class="row">        
            <!-- DataTables Product -->
        <div class="card mb-3 shadow-lg" style="border-radius:20px;">
            <div class="card-header" style="border-radius:5px;">
                <i class="fas fa-table"></i>
              <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" type="button"><i class="bi bi-plus-circle"> New</i></button>
            </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table datatable " id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Title</th>
                          <th>Percent</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php 
                        $data = showDiscount();
                        if($data){

                      
                        $i = 1;
                        foreach ($data as $res) { ?>
                          

                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $res['title']; ?></td>
                          <td><?php echo $res['percent']; ?></td>
                          
                          <td>
                            <button type="button" class="btn btn-primary bi bi-pencil" id="edit-btn" data-id="<?php echo $res['discount_id']; ?>"> Modify</button>
                            <!-- <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
                          </td>
                        </tr>

                      <?php  $i++; }
                      
                    }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>         
        </div>
      </div>

    </section>


<!-----------------All Modal Sections---------------------------->


  <div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">ADD New Discount</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" id="discountForm" enctype="multipart/form-data">
            <div class="card-body">

              <div class="row">
                
                  <label for="validationDefault01" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title"  required>       
              </div>

              <div class="row">
                  <label for="Product Name" class="form-label">Percent</label>
                  <input type="number" min="0.1" step="0.1" class="form-control" name="percent" required="">
              </div>
            </div>                       
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="save" id="saveBtn" value="Save">
        </div>
    </form>
      </div>
    </div>
  </div><!-- End Basic Modal-->

<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Discount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" id="editForm">
                <input type="hidden" id="hidden_id" name="hidden_id">
                <div class="card-body">
                    <div class="row">                 
                       <div class="col">
                            <label for="validationDefault01" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edit-title" name="title"  required>       
                       </div>
                    </div>

                <div class="row mt-2">
                    <div class="col">
                        <label for="Product Name" class="form-label">Percent</label>
                        <input type="number" min="0.1" step="0.1" class="form-control" name="percent" required="" id="edit-percent">
                    </div> 
                </div>
                   
                </div>                                  
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="save" value="Save">
                </div>
            </form>
      </div>
    </div>
</div><!-- End Edit Modal-->
      
<!-------------------end of All Modal----------------------->

  </main> <!------------- end of Main ----->
 
  <?php

function showDiscount(){
  global $mydb;

  $mydb->setQuery("select * from discount");
  $cur = $mydb->executeQuery();
  $numrows = $mydb->num_rows($cur);

  if($numrows > 0 ){
    return $cur;
  }else{
    return 0;
  }
}


   ?>

<script>
    $(document).ready(function(){

        let editModal = $('#editModal');
        
        $(document).on('submit','#discountForm',function(e){
            e.preventDefault();

            $.ajax({
                url:'ajax.php?action=addDiscount',
                method:'post',
                data:$(this).serialize(),

                success:function(data){
                    console.log(data);
                    if(data == 1){
                        $('#discountForm').get(0).reset();
                        $('#addModal').modal('hide');
                        message("New Discount Created Successfully!","success");
                    }else if(data == 2){
                        msg("Validation Errors",'error');
                    }else if(data == 3){
                        msg("Internal Server Error!","error")
                    }else{
                        msg("Internal Server Error!","error")
                    }
                },
                error:function(error,xhr,status){
                    alert(xhr.responseText);
                }

		    });
        });

        $(document).on('click','#edit-btn', function (e) {
            e.preventDefault();

            let id = $(this).attr('data-id');
            $('#editForm').get(0).reset();
            
            $.ajax({
                url:'ajax.php?action=getDiscountById',
                method:'post',
                data:{id : id},
                dataType:"json",

                success:function(data){
                   // console.log(data);
                   $('#edit-title').val(data?.title);
                   $('#edit-percent').val(data?.percent);
                   $('#hidden_id').val(data?.discount_id);
                },
                complete:function(){
                     editModal.modal('show');
                },
                error:function(error,xhr,status){
                    alert(xhr.responseText);
                }

		    });

        });

        $('#editForm').submit(function (e) { 
            e.preventDefault();

            swal({
                title: "Are you sure you want Update this Discount?",
                text:'Please Click the `OK` Button to Continue!',
                icon: "info",
                buttons: true,
                dangerMode: true,
			}).then((then) => {

				if(then){
                    $.ajax({
                    url:'ajax.php?action=updateDiscount',
                    method:'post',
                    data:$(this).serialize(),

                    success:function(data){
                        console.log(data)
                        if(data == 1){
                            message('Updated Successfully!',"success");					
                        }else if(data == 2){
                            msg("Internal Server Error!","error");
                        }else if(data == 4){
                            msg("Validation Error!","error");
                        }
                        else{
                            msg("Internal Server Error!","error");
                        }
                    },
                    complete:function(){
                        $('#editForm').get(0).reset();
                        editModal.modal('hide');
                    },  
                    error:function(error,xhr,status){
                        alert(xhr.responseText);
                    }
                });
                }

            });
         
        });

    }); 
</script>