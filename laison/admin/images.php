<?php include('header.php'); ?>
        <div id="main">
            <div class="w3-teal">
                <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
                <div class="w3-container">
                    <h1>Tiles</h1>
                </div>
            </div>


            <div class="w3-container" style="padding: 16px;">
                <ul class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>Tiles</li>
                </ul>

                <div class="row">
                    <div class="col-md-12 col-sm-12 text-right">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Add Tile</button>
                    </div>
                </div>
                <!-- <div class="row" style="display: flex;">
                    <div class="col-4">
                        <label for="categories_select" class="col-form-label">Category</label>
                        <select id="image_category_select" class="form-select"></select>
                    </div>
                    <div class="col-4">
                        <label for="categories_select" class="col-form-label">Sub Category</label>
                        <select id="image_sub_category_select" class="form-select"></select>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary"> Show Images</button>
                    </div>
                </div> -->

                <?php
                include('connect.php');

                $sql = "SELECT A.id as image_id , A.name as image_name , B.name as sub_category_name , C.nom as category_name FROM images A , sub_category B , categories C where A.sub_category_id = B.id AND B.category_id = C.id ORDER BY C.id";
                
                $result = $conn->query($sql);
                ?>
                <table class="table table-bordered" style="margin-top: 5px;">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tile</th>
                        <th scope="col">Tile Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sub Category</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0) {
                            $i=1;
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['image_id'];
                                $del='onclick="del_entry('.$row['image_id'].');"';
                                echo '<tr>';
                                echo '<td>'.$i.'</td>';
                                echo '<td><img width="50" height="50" src="../data/'.$row['category_name']."/".$row['sub_category_name']."/".$row['image_name'].'" /></td>';
                                echo '<td>'.$row['image_name'].'</td>';
                                echo '<td>'.$row['category_name'].'</td>';
                                echo '<td>'.$row['sub_category_name'].'</td>';
                                echo '<td>
                                        <button class="btn btn-danger" '.$del.' data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>Delete</button>
                                    </td>';
                                echo '</tr>';
                                $i++;
                            }
                        } else {?>
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
                        <h5 class="modal-title" id="exampleModalLabel">Add Tiles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="add_image" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="categories_select" class="col-form-label">Category</label>
                                <select id="categories_select" name="category" class="form-control" onchange="getSubCategories()"></select>
                            </div>
                            <div class="form-group">
                                <!--<div class="row">-->
                                <!--    <div class="col-sm-6 col-md-6 col-lg-6" ><label for="sub_menu" class="col-form-label">Sub Category</label></div>-->
                                <!--    <div class="col-sm-6 col-md-6 col-lg-6" ><button class="btn btn-sm btn-primary" style="float: right; padding: 2px;" onclick="">Add Sub Category</button></div>-->
                                <!--</div>-->
                                <div class="col-sm-6 col-md-6 col-lg-6" ><label for="sub_menu" class="col-form-label">Sub Category</label></div>
                                <select id="sub_categories_select" name="sub_category" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                <label for="Image_name" class="col-form-label">Tile Name</label>
                                <input type="text" id="image_name" name="image_name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">
                                    <input type="radio" name="is_symmetric" value="1" required>Symmetric
                                </label>
                                <label class="col-form-label">
                                    <input type="radio" name="is_symmetric" value="0" >Non symmetric
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="Image_name" class="col-form-label">Select Tile</label><span class="text-danger"> Accept only PNG images</span>
                                <input type="file" id="img" name="img" accept="image/png">
                            </div>
                            <div class="form-group corner_tile" style="display: none;">
                                <label for="corner_img" class="col-form-label">Select Corner Tile</label><span class="text-danger"> Accept only PNG images</span>
                                <input type="file" id="corner_img" name="corner_img" accept="image/png">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Tile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add_sub_category" tabindex="-1" role="dialog" aria-labelledby="add_sub_category" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_sub_category">Add Sub Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_sub_category">
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
    </body>
    <?php include('footer.php'); ?>
    <script>
        getCategory();
        function getCategory() {
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
                    }
                }
            });
        }

        function getSubCategories() {
            var ele = document.getElementById('categories_select');
            var menu = ele.value;

            if(menu == 3){
                $('.corner_tile').css('display', 'block');
            }
            else{
                $('.corner_tile').css('display', 'none');
            }

            if(menu.length == 0){
                toastr.warning("Select Category First");  
                document.getElementById("sub_categories_select").innerHTML = "";
                return false;  
            } else {
                $.ajax({
                    type: "POST",
                    url: 'get_sub_categories.php',
                    data: {
                        "menu":menu
                    },
                    success: function(response)
                    {
                        response = JSON.parse(response);
                        if(response.error){
                            document.getElementById("sub_categories_select").innerHTML = "";   
                            toastr.error(response.error);
                        } else{
                            document.getElementById("sub_categories_select").innerHTML = response;    
                        }
                    }
                });
            }
        }

        $('#add_image').on('submit',function(e){
            e.preventDefault();
            var ele = document.getElementById('categories_select');
            var menu = ele.value;
            if(menu.length == 0){
                toastr.warning("Select Category First");  
                document.getElementById("sub_categories_select").innerHTML = "";
                return false;  
            }

            var ele = document.getElementById('sub_categories_select');
            var sub_category = ele.value;
            if(sub_category.length == 0){
                toastr.warning("Select Sub Category"); 
                return false;  
            }

            var ele = document.getElementById('image_name');
            var image_name = ele.value;
            if(image_name.length == 0){
                toastr.warning("Write Tile Name");
                return false;
            }

            var ele = document.getElementById('img');
            var img = ele.value;
            if(img == ""){
                toastr.warning("Choose Tile");
                return false;  
            }

            var cat_id = $('#categories_select').find(":selected").val();
            if(cat_id == 3){
                var ele = document.getElementById('corner_img');
                var img = ele.value;
                if(img == ""){
                    toastr.warning("Choose Corner Tile");
                    return false;
                }
            }

            $.ajax({
                url: 'image_add.php',
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
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
        });

        function del_entry(id){
            let text = "Do you want to delete?";
            if (confirm(text) == true) {
                $.ajax({
                    type: "POST",
                    url: 'image_delete.php',
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
        
        $("#sub_categories_select").on("change",function(e){
            if($( "#sub_categories_select option:selected" ).text() == "Add Sub Category"){
                $("#add_sub_category").modal('show');    
            }
        });
        
        function add_sub_category(){
            var ele = document.getElementById('categories_select');
            var category_id = ele.value;
            console.log(category_id);
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
                        $("#add_sub_category").modal('hide');  
                        getSubCategories();
                    }
                }
            });
        } 

    </script>
</html>