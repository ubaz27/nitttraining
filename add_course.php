<?php
include 'inc/db.php';
include 'inc/top-menu.php';

$page="director";
include 'inc/aside.php';



if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = $_POST['course_name'];
    $duration = $_POST['duration'];
    $fees = $_POST['fees'];
    $status = $_POST['status'];
    $percentage = $_POST['percentage'];
    $category   = $_POST['category'];

    if ($status == 'on') {
        $status = 1;
    } else {
        $status = 0;
    }
    if (!empty($course_name) and !empty($fees) and !empty($duration)) {
        $sql = "INSERT INTO `tblcourses`( `course`, `category`, `duration`, `fee`, `institution_percentage`, 
        `status`, `trans_by`) VALUES ('$course_name','$category','$duration','$fees','$percentage', '$status','ubaz')";
        $result = mysqli_query($dbc, $sql);
        if (mysqli_affected_rows($dbc) == 1) {
            $message = 'Record Added Successfully';
            $alert = 'alert alert-info alert-dismissible';
        } else {
            $message = 'Something went wrong, try again';
            $alert = 'alert alert-danger alert-dismissible';
        }
    }
}



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Add Courses</h1>

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
                        <!-- end of message -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add User Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="add_course.php" name="add_course" id="add_course">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputFullName">Course Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter Course Name" name= 'course_name'>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fees</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter Fees" name='fees' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Duration (Weeks)</label>

                                            <select id="" class="form-control" name = 'duration'>
                                                <?php
                                                for ($i = 1; $i <= 20; $i++) {
                                                    echo '<option>' . $i . '</option>';
                                                }
                                                
                                                ?>


                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Category </label>
                                            <select name="category" id="category" class="form-control" >
                                               
                                               </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                   

                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Institution's Percentate</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter Percentage" name='percentage'>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="">Status</label><br>
                                        <input type="checkbox"  checked data-bootstrap-switch
                                            data-off-color="danger" data-on-color="success" name='status'>
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

//add category
$("#category").load("getters\\getCategory.php");


    // save to database
     //users form
        var user_form = $('#add_course'); //user's form name = $()
         var user_submit = $('#user_submit');  // user submit button
         var user_note = $('#user_note');

          user_submit.on('click', function(e) {
            e.preventDefault(); // prevent default form submit
            $.ajax({
                url: 'process\\process_course.php', // form action url
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
