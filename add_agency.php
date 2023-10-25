 <?php
 
 include 'inc/db.php';
 include 'inc/top-menu.php';
 $page="director";
 include 'inc/aside.php';
 
 if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    //  $agency_name = $_POST['agency_name'];
    //  $phone = $_POST['phone'];
    //  $email = $_POST['email'];
    //  $address = $_POST['address'];
    //  $state = $_POST['state'];
    //  $fullname = $_POST['fullname'];
 
    //  if (!empty($agency_name) and !empty($state) and !empty($fullname)) {
    //      $sql = "INSERT INTO `tblagencies`(`name`, `state`, `contact_person`, `phone`, `email`, `address`) VALUES
    //       ('$agency_name','$state','$fullname','$phone','$email', '$address')";
    //      $result = mysqli_query($dbc, $sql);
    //      if (mysqli_affected_rows($dbc) == 1) {
    //          $message = 'Record Added Successfully';
    //          $alert = 'alert alert-info alert-dismissible';
    //      } else {
    //          $message = 'Something went wrong, try again';
    //          $alert = 'alert alert-danger alert-dismissible';
    //      }
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
                     <h1 class="m-0">Add Agency</h1>

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
                 <div id= "user_note">

                </div>
                 <!--  -->
                     <div class="card card-primary">
                         <div class="card-header">
                             <h3 class="card-title">Add Agency Form</h3>
                         </div>
                         <!-- /.card-header -->
                         <!-- form start -->
                         <form method="POST" action="add_agency.php" name="add_agency" id="add_agency">
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputFullName">Agency Name</label> <span class="indicator">*</span>
                                             <input type="text" class="form-control" id="exampleInputEmail1"
                                                 placeholder="Enter Agency Name" name='agency_name'>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label for="exampleInputPassword1"> State </label>
                                                    <select id="" class="form-control" name="state">
                                                        <option value="kano">kano</option>
                                                        <option value="Jigawa">Jigawa</option>
                                                        <option value="Katsina">Katsina</option>
                                                        <option value="Kaduna">Kaduna</option>
                                                        


                                                    </select>

                                            </div>
                                     </div>


                                 </div>


                             </div>
                     </div>
                     <!-- /.card-body -->

                     <div class="card-footer">
                         <button type="submit" id="user_submit" class="btn btn-primary">Submit</button>
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

   


    // save to database
     //users form
        var user_form = $('#add_agency'); //user's form name = $()
         var user_submit = $('#user_submit');  // user submit button
         var user_note = $('#user_note');

          user_submit.on('click', function(e) {
            e.preventDefault(); // prevent default form submit
            $.ajax({
                url: 'process\\process_agency.php', // form action url
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
