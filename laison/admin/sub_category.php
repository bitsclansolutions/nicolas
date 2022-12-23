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
                    <li>Sub Category</li>
                </ul>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Add Sub Category</button>
                    </div>
                </div>
                <?php
                include('connect.php');

                $sql = "SELECT B.id as subcategory_id , A.nom as category_name , B.name as subcategory_name FROM categories A ,sub_category B where A.id=B.category_id ORDER BY B.category_id ASC";
                
                $result = $conn->query($sql);
                ?>
                <table class="table table-bordered" style="margin-top: 3px;">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sub Category</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0) { ?>
                            <?php
                                for($i=1; $i<=$result->num_rows;$i++)
                                {
                                    $data = $result->fetch_assoc();
                                    $id = $data['subcategory_id'];
                                    $edit='onclick="edit_entry('.$data['subcategory_id'].');"';
                                    $del='onclick="del_entry('.$data['subcategory_id'].');"';
                                    echo '<tr>';
                                        echo '<td>'.$i.'</td>';
                                        echo '<td>'.$data['category_name'].'</td>';
                                        echo '<td>'.$data['subcategory_name'].'</td>';
                                        echo '<td>
                                                <button class="btn btn-primary" '.$edit.'><i class="material-icons md-48" data-toggle="tooltip" title="Edit">&#xE254;</i>Edit</button>
                                                <button class="btn btn-danger" '.$del.' data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>Delete</button>
                                            </td>';
                                    echo '</tr>';
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Sub Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_sub_category">
                        <div class="form-group">
                            <label for="menu" class="col-form-label">Category</label>
                            <select id="categories_select" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label for="category_name" class="col-form-label">Sub Category</label>
                            <input type="text" id="sub_category_name" class="form-control" />
                        </div>    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick ="add_sub_category();">Add sub category</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Sub Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add_sub_category">
                            <input style="display: none;" type="text" id="sub_category_id" class="form-control" />
                            <div class="form-group">
                                <label for="menu" class="col-form-label">Category</label><span class="text-danger"> (Can Not change Category) </span>
                                <select id="categories_select_edit" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                <label for="category_name" class="col-form-label">Sub Category</label>
                                <input type="text" id="sub_category_name_edit" class="form-control" />
                            </div>    
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick ="update_sub_category();">Update Sub category</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php include('footer.php'); ?>
    <script>
        getCategory();
        function getCategory(){
            $.ajax({
                type: "POST",
                url: 'get_category.php',
                data: {},
                success: function(response)
                {
                    response = JSON.parse(response);
                    if(response.error){
                        toastr.error(response.error);
                    } else{
                        document.getElementById("categories_select").innerHTML = response;    
                        document.getElementById("categories_select_edit").innerHTML = response;    
                    }
                }
            });
        }

        function add_sub_category(){
            var ele = document.getElementById('categories_select');
            var category_id = ele.value;
            if(category_id.length == 0){
                toastr.warning("Select Category First");  
                return false;  
            }

            var ele = document.getElementById('sub_category_name');
            var sub_category_name = ele.value;
            if(sub_category_name.length == 0){
                toastr.warning("Enter Sub Category Name");  
                return false;  
            }

            $.ajax({
                type: "POST",
                url: 'sub_category_add.php',
                data: {
                    "category_id":category_id,
                    "sub_category_name":sub_category_name
                },
                success: function(response)
                {
                    response = JSON.parse(response);
                    console.log(response);
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
                url: 'sub_category_edit.php',
                data: {
                    "id":id
                },
                success: function(response)
                {
                    response = JSON.parse(response);
                    
                    if (response) {
                        document.getElementById("sub_category_id").value = response.id;
                        document.getElementById("categories_select_edit").value = response.category_id;
                        document.getElementById("categories_select_edit").setAttribute("disabled", "disabled");
                        document.getElementById("sub_category_name_edit").value = response.name;
                        $('#editModal').modal('show');
                    } else {
                        toastr.error("Error: Can not open model");
                    }
                }
            });
        }

        function update_sub_category() {
            
            var ele = document.getElementById('categories_select_edit');
            var category_id = ele.value;
            if(category_id.length == 0){
                toastr.warning("Select Category First");  
                return false;  
            }

            var ele = document.getElementById('sub_category_name_edit');
            var sub_category_name = ele.value;
            if(sub_category_name.length == 0){
                toastr.warning("Enter Sub Category Name");  
                return false;  
            }

            var ele = document.getElementById('sub_category_id');
            var id = ele.value;
        
            $.ajax({
                type: "POST",
                url: 'sub_category_update.php',
                data: {
                    "id":id,
                    "category_id":category_id,
                    "sub_category_name":sub_category_name
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

        function del_entry(id) {
            let text = "Do you want to delete?";
            if (confirm(text) == true) {
                $.ajax({
                    type: "POST",
                    url: 'sub_category_delete.php',
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