
    
    
    <div style = "margin-top: 20px;">
    <div class="container">
    <div class = "container">

    <?php 
    $validation_errors = validation_errors();
    if(!empty($validation_errors)){
        echo $validation_errors;
    }
    ?>

   
       
        <div class="card">
        <div class="card-body">
        <?php echo form_open('user_management/user_types/edit_user_type/'.$user_type_id, array('onsubmit' => "return confirm('Do you want to update this record')")); ?>
         
     
    <div class="form-group " style ="margin-bottom: 10px;">
       <label for="user_type_name" >User Type Name</label>
       <input type="text" name="user_type_name" class="form-control" value ="<?php echo $user_type_name ?>" placeholder = "Enter a User Type">

      

    </div>
       <div class="submit_button">
           <input type ="submit"value="Update User Type"/>

       </div>
      
   
   <?php echo form_close() ?>

   
    </div>
    </div>
    </div>
    </div>

