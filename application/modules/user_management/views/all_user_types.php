    <div style = "margin-top: 20px;">
    <div class="card">
    <div class="container">

    <?php $success = $this->session->flashdata("success_message");
    $error = $this->session->flashdata("error_message");

    if (!empty($success)){
        ?>
        <div class = "alert alert-success" role = "alert">
        <?php
        echo $success;
        ?>
        </div>
        <?php
    }
    if (!empty($error))
    {
        ?>
        <div class = "alert alert-danger" role = "alert">
        <?php 
        echo $error;
        ?>
        </div>
        <?php
    }

    ?>
    

    <?php echo form_open($this->uri->uri_string())?>

    <!-- table for setting the search and header title on the same row and setting the search input on the right side -->
    <table style="width: 100%; margin-top: 10px;">
    <tr>
        <td>
        <div style= "display: flex; justify-content: flex-start;">
        <h1 style="font-family: 'PT Serif', serif; font-size: 20pt; align-text: center;" >User Types</h1>
        </div>
        </td>

        <td>
        <td>
            <div style= "display: flex; justify-content: flex-end;" >
            <input class="form-control col-md-3" type="text" name = "search" placeholder="Search by name" aria-label="Search">
            <div class = "input-group-append">
            <input type = "submit" value="Search" class="btn btn-secondary btn-sm">            
            </div>            
            </div> 

            </td>
        </td>
    </tr>
    </table>

    <br></br>

    <div style = "padding-bottom: 8px;">
    <?php echo anchor("user_management/user_types/add_user_type", "Add User Type", array("class"=>"btn btn-primary btn-sm")); ?>

    <?php echo anchor("","Import User Types", array ("class"=>"btn btn-success btn-sm"));?>
    </div>

    <?php echo form_close()?>

    <table class="table table-striped table-hover table-bordered table-condensed">
  <thead class = "thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">User Type Name</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="4" style="text-align:center">Actions</th>      
    </tr>    
  </thead>

  <tbody>
    <?php 
    if ($all_user_types->num_rows() > 0)
    {
        $count = 0;

        foreach ($all_user_types->result() as $row)
        {
            $count++;
            $id = $row->user_type_id;
            $name = $row->user_type_name;
            $check = $row->user_type_status;
            $delete = $row->deleted;

            ?>
            <tr>
                <td> <?php echo $count;?></td>
                <td> <?php echo $name;?></td>

                <td>
                <?php 
                    if ($check == 1)
                    {
                        echo "<button class = 'badge badge-success far fa-thumbs-up'> Active</button>";
                    }

                    else{
                        echo "<button class = 'badge badge-danger far fa-thumbs-down'> Deactivated</button>";
                    }
                ?>
                </td>
                
                <td>

                <a href="#individualUser_type<?php echo $id; ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#individualUser_type<?php echo $id; ?>"><i class="far fa-eye"></i></a>
                <!-- start of the modal -->
                <div class="modal" tabindex="-1" role="dialog" id="individualUser_type<?php echo $id; ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header"id="exampleModalLabel"><?php echo $name; ?>'s Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- modal body -->

                        <table class ="table table-sm">
                            <tr>
                                <th scope = "col">#</th>
                                <th scope = "col">User Type Name</th>
                                <th scope = "col">Status</th>
                                <th scope = "col">Edit</th>
                                <th scope = "col">Delete</th>
                                <th scope = "col">Change Status</th>
                            </tr>

                            <tr>
                                <td><?php echo $count?></td>
                                <td><?php echo $name?></td>

                                <td>
                                <?php 
                                if ($check == 1)
                                {
                                    echo "<button class = 'badge badge-success far fa-thumbs-up'> Active</button>";
                                }

                                else{
                                    echo "<button class = 'badge badge-danger far fa-thumbs-down'> Deactivated</button>";
                                }
                            ?>
                                </td>

                                <td>
                                <?php echo anchor("user_management/user_types/edit_user_type/" . $id,'<i class="fas fa-edit"></i>', "class ='btn btn-info btn-sm'");?>
                                </td>

                                <td>
                                <?php echo anchor("", "<i class='fas fa-trash-alt'></i>", array("onclick" => "return confirm('Are you sure you want to delete?')", "class" => "btn btn-danger btn-sm")); ?>
                                </td>

                                <td>
                                <?php
                                if ($check == 0) {
                                    echo anchor("","<i class='far fa-thumbs-up'></i>", array("onclick" => "return confirm('Are you sure you want to activate?')", "class" => "btn btn-success btn-sm"));
                                } else {
                                    echo anchor("", "<i class='far fa-thumbs-down'></i>", array("onclick" => "return confirm('Are you sure you want to deactivate?')", "class" => "btn btn-danger btn-sm"));
                                }
                                ?>
                            </td>


                             </tr>   
                        </table>
                    </div>

                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- end of the modal -->
                
                </td>

                <td>
                <?php echo anchor("user_management/user_types/edit_user_type/" . $id, '<i class="fas fa-edit"></i>', "class ='btn btn-info btn-sm'"); ?>     
                </td>
                
                <td><?php echo anchor("user_management/user_types/delete_user_type/". $id,"<i class='fas fa-trash-alt'><i>", array ("onclick" => "return confirm('Are you sure you want to delete this record?')", "class"=>"btn btn-danger btn-sm"));?></td>
                

            </tr>
            <?php
        }
    }
    ?>
               
    
  </tbody>
</table>
    </div>
    </div>
    </div>