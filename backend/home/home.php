 <?php

include "../extends/header.php";

$user_query = "SELECT * FROM users";

$users = mysqli_query($db,$user_query);

?>


<div class="row">
<div class="col">
      <div class="page-description">
         <h1>Dashboard</h1>
     </div>
 </div></div>

 <div class="row">
    <div class="col">
        <?php if(isset($_SESSION['temp_name'])):?>
    <div class="alert alert-custom" role="alert">
     <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
         <span class="alert-title">welcome <?php echo $_SESSION['author_name'];?></span>
         <span class="alert-text">your email is <?php echo $_SESSION['author_email'];?></span>
        </div>
    </div>
    <?php endif; unset($_SESSION['temp_name']) ?>
   </div>
 </div>

 <?php if(isset($_SESSION['db_delete'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['db_delete'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['db_delete']) ?>


 <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
            <h4>Users Informations</h4> 
        </div>
            <div class="card-body">
            <!-- table start -->
            <div class="example-content">
               <table class="table">
                   <thead class="table-dark">
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                    <?php 
                   $num = 1;
                   $id = $_SESSION['author_id'];
                   foreach($users as $user):
                   if($user['id'] == $id){
                    continue;
                   }
                   ?>
                       <tr>
                           <th>
                           <?= $num++ ?>
                           </th>
                           <td>
                            <?= $user['name']?>
                           </td>
                           <td>
                           <?= $user['email']?>
                           </td>
                           <td>
                           <div class="d-flex justify-content-around align-items-center"> 
                            <a href="home_manage.php?deleteid=<?= $user['id'] ?>" class="text-danger fa-2x">
                                <i class="fa fa-trash-o"></i>
                            </a>
                           </td>
                       </tr>
                       <?php endforeach; ?>
                   </tbody>
               </table>
           </div>

            <!-- table end -->
        </div>  
        </div>
        </div>
    </div>
 </div>
                
 
 <?php

include "../extends/footer.php";

?>







                      
            

   