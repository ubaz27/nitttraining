 <?php
 include 'inc/db.php';
 include 'inc/top-menu.php'; 
$page="director";
 include 'inc/aside.php';
 
 if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    //  $username = $_POST['email'];
    //  $fullname = $_POST['fullname'];
    //  $phone = $_POST['phone'];
    //  $status = $_POST['status'];
    //  $role = $_POST['role'];
 
    //  if ($status == 'on') {
    //      $status = 1;
    //  } else {
    //      $status = 0;
    //  }
    //  if (!empty($username) and !empty($fullname) and $role !== "Select") {
    //      $sql = "INSERT INTO tblusers (`email`, `fullname`, `phone`, `role`, `status`, `trans_by`)  
    //           VALUES ('$username','$fullname','$phone','$role','1','ubaz')";
    //      $result = mysqli_query($dbc, $sql);
    //      if (mysqli_affected_rows($dbc) == 1) {
    //          $message = 'Record Added Successfully';
    //          $alert = 'alert alert-info alert-dismissible';
    //      } else {
    //          $message = 'Something went wrong, try again';
    //          $alert = 'alert alert-danger alert-dismissible';
    //      }
    //  }
    //  else
    //  {
    //     $message = 'Something went wrong, try again';
    //          $alert = 'alert alert-danger alert-dismissible';
    //  }
 }
 
 ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-12">
                     <h1 class="m-0">Add User</h1>

                 </div><!-- /.col -->

             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <!-- Main content -->



     <section class="content">
         <div class="container-fluid">

             <!-- /.row -->
             <!-- Main row -->
             <div class="row">
                 <div class="col-sm-12">
                     <!-- message -->
                     <div id= "user_note">

                     </div>
                     <?php
                     
                    //  if (!empty($message)) {
                        //  echo '<div style="width:100%; margin-left:0%">
                                                                //   <div class="' .
                            //  $alert .
                            //  '">
                                                                    //   <button type="button" class="close" data-dismiss="alert"
                                                                        //   aria-hidden="true">&times;</button>
                                                                    //   <h5><i class="icon fas fa-info"></i> Alert!</h5>
                                                                    //   ' .
                            //  $message .
                            //  '
                                                                //   </div>
                                                            //   </div>';
                    //  }
                     
                     ?>
                     <!-- end of message -->
                     <div class="card card-primary">
                         <div class="card-header">
                             <h3 class="card-title">Add User Form</h3>
                         </div>
                         <!-- /.card-header -->
                         <!-- form start -->

                         <form method="POST" id="add_user" name="add_user">
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputFullName">Full Name</label> <span class="indicator">*</span>
                                             <input type="text" class="form-control" id="exampleInputEmail1"
                                                 placeholder="Enter Full Name" name="fullname" required>
                                         </div>
                                     </div>

                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputEmail1">Email address</label> <span class="indicator">*</span>
                                             <input type="email" class="form-control" id="exampleInputEmail1"
                                                 placeholder="Enter email" name="email" required>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputPassword1">Phone Number</label><span class="indicator">*</span>
                                             <input type="text" class="form-control" id="exampleInputPassword1"
                                                 placeholder="Enter Number" name="phone" required>
                                         </div>
                                     </div>

                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputPassword1"> Role </label> <span class="indicator">*</span>
                                             <select name="role" id="role" class="form-control select2bs4"
                                                 style="width: 100%;" required>
                                                
                                                 <!-- <option value="1">Admin</option>
                                                 <option value="2">Coordinator</option>
                                                 <option value="3">Director</option>
                                                 <option value="4">Management</option>
                                                 <option value="5">SA</option>
                                                 <option value="6">TA</option> -->



                                             </select>

                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-sm-12">
                                         <label for="">Status</label><br>
                                         <input type="checkbox" checked data-bootstrap-switch data-off-color="danger"
                                             data-on-color="success" name="status">
                                     </div>

                                     <div class="col-sm-6">
                                     </div>
                                 </div>



                             </div>
                             <!-- /.card-body -->

                             <div class="card-footer">
                                 <button type="submit" id = "user_submit" class="btn btn-primary">Submit</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             <!-- /.row (main row) -->
         </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <script type="text/javascript" src="./dist/js/jquery.min.js"></script>

<script type="text/javascript">
     $(document).ready(function() {

    //add roles
    $("#role").load("getters\\getRoles.php");




    // save to database
     //users form
        var user_form = $('#add_user'); //user's form name = $()
         var user_submit = $('#user_submit');  // user submit button
         var user_note = $('#user_note');

          user_submit.on('click', function(e) {
            e.preventDefault(); // prevent default form submit
            $.ajax({
                url: 'process\\process_users.php', // form action url
                type: 'POST', // form submit method get/post
                //dataType: 'html', // request type html/json/xml
                data: user_form.serialize(), // serialize form data
                beforeSend: function() {
                    //alert.fadeOut();
                    user_submit.html('Sending....'); // change submit button text
                },
                success: function(data) {
                    user_note.html(data).fadeIn(); //fade in response data
                    // user_submit.hide();
                    user_submit.html('Submit');
                },
                error: function(e) {
                    console.log(e)
                }
            });
        });

     });


</script>

 <?php include 'inc/footer.php'; ?>
