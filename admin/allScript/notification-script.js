
const load_Notifications = () =>{
    
    
    $.ajax({
        url:'ajax.php?action=notification_list',
        method:'post',
        
        

        success:function(data){
          $('.display_notif').html(data);         
        },

        error:function(xhr,status,error){
            alert(xhr.responseText);
        }

    });
    
}

load_Notifications();
