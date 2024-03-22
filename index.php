<?php  include('header.php')  ?>
<?php  include('dbcon.php')  ?>

        <div class="box1">
        <h2>All STUDENTS</h2>
        <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal" >ADD STUDENTS</button>
        </div>
    <table class="table table-striped table-hover  table-bordered">   
        <thead>     
             <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Age</td>
                <td>Update</td>
                <td>Delete</td>
             </tr>
        </thead>
        <tbody>
        <?php
                $query="select *from `students`";
                $result=mysqli_query($connection,$query);
                if(! $result){
                       die("query failed". mysqli_error());
                }
                else{
                    // print_r($result);
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td> <?php echo $row['id'] ?> </td>
                            <td><?php echo $row['first_name'] ?>  </td>
                            <td><?php echo $row['last_name'] ?> </td>
                            <td><?php echo $row['age'] ?> </td>
                            <td><a href="update_page_1.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Update</a></td>
                            <td><a href="delete_page.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                        </tr>                            
                    <?php
                        }
                    }
        ?>             
        </tbody>
    </table>

    <?php
            if(isset($_GET['message'])){
                echo "<h6>" .$_GET['message']. "</h6>";
            }
    ?>
    <?php
            if(isset($_GET['insert_message'])){
                echo "<h6>" .$_GET['insert_message']. "</h6>";
            }
    ?>






    <!-- Modal -->
<form action="insert_data.php" method="post"> 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENT</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">     
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="text" class="form-control" name="f_name" >            
        </div>       
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="l_name" >            
        </div>       
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Age</label>
            <input type="text" class="form-control" name="age" >           
        </div>           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

    <?php  include('footer.php')  ?>