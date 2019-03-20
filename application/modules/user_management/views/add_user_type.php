
    
    
    <div class = "col-md-3 ml-sm-auto col-lg-10 px-3 pt-5" style = "margin-top: 20px;">
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
    <?php echo form_open ($this->uri->uri_string());?> <!-- -->

         
     
    <div class="form-group " style ="margin-bottom: 10px;">
       <label for="user_type_name" >User Type Name</label>
       <input type="text" name="user_type_name" class="form-control" placeholder = "Enter a User Type">

      

    </div>
       <div class="submit_button">
           <input type ="submit"value="Add User Type"/>

       </div>
      
   
   <?php echo form_close() ?>

   
    </div>
    </div>
    </div>
    </div>

