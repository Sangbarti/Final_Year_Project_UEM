<?php
include "common/header.php"; 
include '../partials/dbconnect.php';
?>


<div class=" container alt">
    <h1 class=" alt alert alert-success text-center mb-5 p-3 mt-3">List of Student Details</h1>
</div>

<!-- <form action="" method="post" enctype="multipart/form-data"> -->
  <table class="table table-hover table-striped table-bordered mt-1">
    <thead class="table-dark table-hover table-striped">
      <input type="hidden" placeholder="for course id">
        <tr>
          <th scope="col">User Id</th>
          <th scope="col"> User Name</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
            </tr>
    </thead>
    <tbody>
    <?php
        $sql = "SELECT * FROM `users`";
        $result=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);
        if($count>0){
          while($row = mysqli_fetch_assoc($result)){?>
          <tr>
            <th scope="row"><?=$row['sno']?></th>
            <td><?=$row['user_name']?></td>
            <td><?=$row['user_email']?></td>
            
            <td>
              <button type="submit" class="btn btn-warning">Deactivate</button>
            </td>
          </tr>
         <?php }
        }
        else{

        }
        ?>
        
      
    </tbody>
  </table>
</form>


