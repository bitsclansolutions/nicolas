<?php include('header.php'); ?>
        <div id="main">
            <div class="w3-teal">
                <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
                <div class="w3-container">
                    <h1>Dashboard</h1>
                </div>
            </div>


            <div class="w3-container" style="padding: 16px;">
                <ul class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>Category</li>
                </ul>

                <!--<div class="row">
                    <div class="col-md-12 col-sm-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Add Category</button>
                    </div>
                </div>-->
                <?php
                include('connect.php');

                $sql = "SELECT * FROM categories where 1";
                
                $result = $conn->query($sql);
                ?>
                <table class="table table-bordered" style="margin-top: 3px;">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
<!--                        <th scope="col">Actions</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0) { ?>
                            <?php
                                for($i=1; $i<=$result->num_rows;$i++)
                                {
                                    $data = $result->fetch_assoc();
                                    $id = $data['id'];
                                    $name = $data['nom'];
                                    $edit='onclick="edit_entry('.$data['id'].');"';
                                    $del='onclick="del_entry('.$data['id'].');"';
                                    echo '<tr>';
                                        echo '<td>'.$i.'</td>';
                                        echo '<td>'.$data['nom'].'</td>';
                                        // echo '<td></td>';
                                    echo '</tr>';
                                    // <button class="btn btn-primary" '.$edit.'><i class="material-icons md-48" data-toggle="tooltip" title="Edit">&#xE254;</i>Edit</button>
                                    // <button class="btn btn-danger" '.$del.' data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>Delete</button>
                                }
                            ?>
                        <?php } else {?>
                            <tr class="text-center "><td colspan="4"> No Data Found</td></tr> 
                        <?php  }?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_category">
                        <div class="form-group">
                            <label for="category_name" class="col-form-label">Category</label>
                            <input type="text" id="category_name" class="form-control" />
                        </div>    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick ="add_category();">Add category</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_category">
                        <input style="display: none;" type="text" id="category_id" class="form-control" />
                        <div class="form-group">
                            <label for="category_name" class="col-form-label">Category</label>
                            <input type="text" id="category_name_edit" class="form-control" />
                        </div>    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick ="update_category();">Update category</button>
                </div>
                </div>
            </div>
        </div>
    </body>
    <?php include('footer.php'); ?>
    <script>
        function add_category(){
            var ele = document.getElementById('category_name');
            var category_name = ele.value;
            if(category_name.length == 0){
                toastr.warning("Enter Category Name");  
                return false;  
            }

            $.ajax({
                type: "POST",
                url: 'category_add.php',
                data: {
                    "category_name":category_name
                },
                success: function(response)
                {
                    response = JSON.parse(response);
                    if(response.error){
                        toastr.error(response.error);
                    } else {
                        toastr.success(response.success);
                        setTimeout(function() { 
                            location.reload();
                        }, 2000);
                    }
                }
            });
        } 

        function edit_entry(id){
            $.ajax({
                type: "POST",
                url: 'category_edit.php',
                data: {
                    "id":id
                },
                success: function(response)
                {
                    response = JSON.parse(response);
                    if (response) {
                        document.getElementById("category_id").value = response.id;
                        document.getElementById("category_name_edit").value = response.nom;
                        $('#editModal').modal('show');
                    } else {
                        toastr.error("Error: Can not open model");
                    }
                }
            });
        }

        function update_category(){

            var ele = document.getElementById('category_name_edit');
            var category_name = ele.value;
            if(category_name.length == 0){
                toastr.warning("Enter Category Name");  
                return false;  
            }

            var ele = document.getElementById('category_id');
            var id = ele.value;
        
            $.ajax({
                type: "POST",
                url: 'category_update.php',
                data: {
                    "id":id,
                    "category_name":category_name
                },
                success: function(response)
                {
                    response = JSON.parse(response);    
                    if (response.success) {
                        toastr.success(response.success);
                        setTimeout(function() { 
                            location.reload();
                        }, 2000);
                    } else {
                        toastr.error(response.error);
                    }
                }
            });
        }

        function del_entry(id){
            let text = "Do you want to delete?";
            if (confirm(text) == true) {
                $.ajax({
                    type: "POST",
                    url: 'category_delete.php',
                    data: {
                        "id":id
                    },
                    success: function(response)
                    {
                        response = JSON.parse(response);
                        console.log(response);
                        if (response.success) {
                            toastr.success(response.success);
                            setTimeout(function() { 
                                location.reload();
                            }, 2000);
                        } else {
                            toastr.error(response.error);
                        }
                    }
                });
            }
        }
    </script>
</html>