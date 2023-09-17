<?php
include 'inc/db.php';
$page = 'coordinator';
include 'inc/top-menu.php';

$page = 'coordinator';
include 'inc/aside.php';

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    // $reg_Num = $_POST['reg_Num'];
    // $name = $_POST['name'];
    // $gender = $_POST['gender'];
    // $p_num = $_POST['p_num'];
    // $course_enrol_id = $_POST['course_enrol_id'];
    // $email = $_POST['email'];
    // $agency = $_POST['agency'];
    // $rank = $_POST['rank'];

    // // if (!empty($reg_num) and !empty($gender) and !empty($name)) {
    //     $sql = "INSERT INTO `tblstudent`(`reg_number`, `name`, `phone`, `email`, `agency`, `rank`, `gender`, `course_enrol_id`) VALUES
    //     ('$reg_Num','$name','$p_num','$email','$agency','$rank','$gender','$course_enrol_id')";
    //     $result = mysqli_query($dbc, $sql);
    //     if (mysqli_affected_rows($dbc) == 1) {
    //         $message = 'Record Added Successfully';
    //         $alert = 'alert alert-info alert-dismissible';
    //     } else {
    //         $message = 'Something went wrong, try again';
    //         $alert = 'alert alert-danger alert-dismissible';
    //     }
}
//}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Add Student</h1>

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

  
    <section class="content">
        <div class="container-fluid">
        <div id="user_note">

                </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
               
                <div class="col-sm-12">
                
                    <!-- message -->
                    
                    <!-- end of message -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add User Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" id='enrol_student' action="" name="enrol_student">
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="RegistrationNumber">Registration Number</label>
                                            <input type="text" class="form-control" id="reg_Num"
                                                placeholder="Enter Course Name" name='reg_Num'>
                                        </div>
                                    </div> -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name">Student Name</label> <span class='indicator'>*</span>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Enter Name" name='name' required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="gender"> Gender </label> <span class='indicator'> *</span>
                                            <select name="gender" id="gender" class="form-control select2bs4"
                                                required>
                                                <option value="">Select Gender</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="p_num">Phone Number</label>
                                            <input type="text" class="form-control" id="p_num"
                                                placeholder="Enter Name" name='p_num'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    
                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter Name" name='email'>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Agency">Agency/Organiyation</label>

                                            <select id="agency_id" class="form-control select2bs4" name='agency'>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="rank">Rank </label>
                                            <input type="rank" class="form-control" id="rank"
                                                placeholder="Enter Rank" name='rank'>
                                        </div>
                                    </div>





                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="course_enrol_id">Course Enrolment ID </label><span
                                                class='indicator'> *</span>
                                            <select id="" class="form-control select2bs4"
                                                name='course_enrol_id' required>
                                                <option value="">Select Course Enrolment ID </option>
                                                <?php
                                                $query = "SELECT tblcourse_enrolment.id , concat (tblcourses.course, ' (' , tblcourse_enrolment.start_date, ')') as course_name  FROM `tblcourse_enrolment` inner join tblcourses on tblcourse_enrolment.course_id = tblcourses.course_id";
                                                
                                                $result = mysqli_query($dbc, $query);
                                                
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo '<option value = ' . $row[0] . '>' . $row[1] . '</option>';
                                                }
                                                ?>


                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>




                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="user_submit" class="btn btn-primary">Submit</button> &nbsp<a
                                    class="btn btn-info" href="students.php">Back</a>
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

<script type="text/javascript" src="./dist/js/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        // alert("ds");
        //add category
        //add category

        $("#agency_id").load("getters\\getAgencies.php");



        // save to database
        //users form
        var user_form = $('#enrol_student'); //user's form name = $()
        var user_submit = $('#user_submit'); // user submit button
        var user_note = $('#user_note');

        user_submit.on('click', function(e) {
            e.preventDefault(); // prevent default form submit
            $.ajax({
                url: 'process\\process_students.php', // form action url
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
<!-- /.content-wrapper -->
<?php include 'inc/footer.php'; ?>
