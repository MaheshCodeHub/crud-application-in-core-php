<?php  include('header.php')  ?>
<?php  include('dbcon.php')  ?>



<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM `students` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
    }
}
?>

<?php
    if(isset($_POST['update_students'])){     
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $age = $_POST['age'];
        $new_id=$_GET['id_new'];
        $query = "UPDATE `students` SET `first_name`='$fname', `last_name`='$lname', `age`='$age' WHERE `id`='$new_id'";
        $result = mysqli_query($connection, $query);    
        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        } else {
              header('location:index.php?update_message=updated successfully');            
        }
    }

?>

    <form action="update_page_1.php?id_new=<?php echo $id ?>" method="post">
    <div class="modal-body">     
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="text" class="form-control" name="f_name" value="<?php echo $row['first_name'] ?>" >            
        </div>       
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="l_name"  value="<?php echo $row['last_name'] ?>">            
        </div>       
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Age</label>
            <input type="text" class="form-control" name="age" value="<?php echo $row['age'] ?>" >           
        </div>  
        <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">         
      </div>
    </form>













<?php  include('footer.php')  ?>