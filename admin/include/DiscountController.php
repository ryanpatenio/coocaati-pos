<?php 


class DiscountController {

   

    public function Store() :?int {
        extract($_POST);
        global $mydb;

        $title = $_POST['title'];
        $percent = $_POST['percent'];
        
        if(empty($title) || empty($percent)){
            return 2; #validation Errors
        }
        $mydb->setQuery("INSERT INTO discount (title,percent,status) VALUES('".$title."','".$percent."','0')");
        $store = $mydb->executeQuery();

        if(!$store){
            return 3; # Insert Failed
        }

        return 1; #success

    }

    public function getDiscount(){
        extract($_POST);
        global $mydb;

        $id = $_POST['id'];
        if(empty($id)){
            return 2; #validation Error
        }

        $mydb->setQuery("SELECT * FROM discount WHERE discount_id = '".$id."' LIMIT 1");
        $res = $mydb->executeQuery();
        $numrows = $mydb->num_rows($res);

        if($numrows > 0){
            $found = $mydb->loadSingleResult();
            return json_encode($found);
        }else{
            return 3;//no data found
        }

    }

    public function updateDiscount(){
        extract($_POST);
        global $mydb;

        $id = $_POST['hidden_id'];
        $title = $_POST['title'];
        $percent = $_POST['percent'];
        if(empty($id) || empty($title) || empty($percent)){
            return 4; # Validation Error
        }

        $mydb->setQuery("UPDATE discount SET title = '".$title."', percent = '".$percent."' WHERE discount_id = '".$id."'");
        $update = $mydb->executeQuery();

        if(!$update){
            return 2; //failed to update
        }

        return 1; #success

        
    }

}