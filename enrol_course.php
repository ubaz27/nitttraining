<?php
include 'inc/db.php';
include 'inc/top-menu.php';

$page = 'coordinator';
include 'inc/aside.php';

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    // $course_id = $_POST['course_id'];
    // $user_id = $_POST['user_id'];
    // $fees = $_POST['fees'];
    // $sdate = ($_POST['sdate']);
    // // $sd = date_format($sdate, 'Y-m-d');
   
    // $edate = ($_POST['edate']);
    // // $ed = date_format($edate, 'Y-m-d');
    // $venue_name = $_POST['venue_name'];
    // $category_id = $_POST['category_id'];

  
    // if (!empty($course_id) and !empty($user_id) and !empty($sdate)) {
    //     $sql = "INSERT INTO `tblcourse_enrolment`(`course_id`, `coordinator_id`, `course_classification`, 
    //     `venue_id`, `course_fee`, `start_date`, `ending_date`) 
    //     VALUES ('$course_id','$user_id','$category_id','$venue_name','$fees', '$sdate', '$edate')";
    //     $result = mysqli_query($dbc, $sql);
    //     if (mysqli_affected_rows($dbc) == 1) {
    //         $message = 'Record Added Successfully';
    //         $alert = 'alert alert-info alert-dismissible';
    //     } else {
    //         $message = 'Something went wrong, try again';
    //         $alert = 'alert alert-danger alert-dismissible';
    //     }
    // }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Enrol Courses</h1>
                    
                   
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
                    <p id= "user_note">
                    
                    </p>
                    <!-- end of message -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Enrol Course Forms</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="enrol_course.php" id="enrole_course"  name="enrol_course">
                            <input type="number" value="2" hidden name='user_id'>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputFullName">Course Name</label>
                                            <select id=""  class="form-control select2bs4" name='course_id'>
                                                <option value="select">Select</option>
                                                <?php
                                                $result = mysqli_query($dbc, 'SELECT * FROM `tblcourses` ORDER BY `tblcourses`.`course` ASC');
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo '<option value=' . $row['course_id'] . '>' . $row['course'] . '</option>';
                                                }
                                                
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Course Clasification </label>
                                            <select  id="category_id"  class="form-control select2bs4"  name='category_id'>
                                               
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Course Participating </label>
                                            <select  id="course_participating"  class="form-control select2bs4"  name='course_participating'>
                                               <option value="Combination">Combination</option>
                                               <option value="Single">Single</option>
                                            </select>

                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Starting Date</label>

                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" name='sdate' />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ending Date</label>
                                            <div class="input-group date" id="reservationdate1"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate1" name='edate' />
                                                <div class="input-group-append" data-target="#reservationdate1"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Venue</label><br>
                                        <select id="venue_id"  class="form-control select2bs4" name='venue_name'>
                                          
                                            
                                        </select>

                                    </div>
                                </div>

                                <div class="row">
                                   
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fees</label>
                                            <input type="number" class="form-control" id="course_fee"
                                                placeholder="Enter Fees" name='fees'>
                                        </div>
                                    </div>
                                  

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Course Budget</label>
                                            <input type="number" class="form-control" id="course_budget"
                                                placeholder="Enter Course Budget" name='course_budget'>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Of Participants</label>
                                            <input type="text" class="form-control" id="no_participants" onchange="getRevenue()" 
                                                placeholder="Enter No Of Participants" name='no_participants' >
                                        </div>
                                    </div>

                                </div>

                            
                                <div class="row">
                               
                                  

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Revenue Generated</label>
                                            <input type="number" class="form-control" id="revenue"
                                                placeholder="Enter Fees" name='revenue' readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Savings for Institution</label>
                                            <input type="number" class="form-control" id="institute_savings"
                                                placeholder="Get Institution Percentage" name='inst_percentage' readonly>
                                        </div>
                                    </div>
                                  

                                    <div class="col-sm-4">
                                        <label for="">Agency</label><br>
                                        <select id="agency_id"  class="form-control select2bs4" name='agency'>
                                          
                                        </select>

                                    </div>
                                </div>
                                </div>

                                <div class="row">
                               
                               

                            </div>






                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="user_submit" class="btn btn-primary">Submit</button> &nbsp<a class="btn btn-info" href="courses_his.php">Back</a>
                            </div>
                        </form>
                    </div>
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


        $("#category_id").load("getters\\getCategory.php");
        $("#agency_id").load("getters\\getAgencies.php");
        $("#venue_id").load("getters\\getVenues.php");



        var user_form = $('#enrole_course'); //user's form name = $()
         var user_submit = $('#user_submit');  // user submit button
         var user_note = $('#user_note');

          user_submit.on('click', function(e) {
            e.preventDefault(); // prevent default form submit
            $.ajax({
                url: 'process\\process_enrol_course.php', // form action url
                type: 'POST', // form submit method get/post
                //dataType: 'html', // request type html/json/xml
                data: user_form.serialize(), // serialize form data
                beforeSend: function() {
                    //alert.fadeOut();
                    // alert("sdd");
                    user_submit.html('Sending....'); // change submit button text
                },
                success: function(data) {
                    user_note.html(data).fadeIn(); //fade in response data
                    // user_submit.hide();
                    user_submit.html('Submit');
                    // alert("sdd");
                },
                error: function(e) {
                    console.log(e)
                }
            });
        });

     });


  function getRevenue()
	{
        var course_budget = document.getElementById('course_budget').value;
		var no_participants = document.getElementById('no_participants').value;
		var revenue_generated  = 0;
        var fee= document.getElementById('course_fee').value;

        revenue_generated = no_participants*1*fee;
        var savings_to_institution = 0;
        savings_to_institution = revenue_generated*1-course_budget;

        // alert(revenue_generated);
        document.getElementById('revenue').value = revenue_generated;
        document.getElementById('institute_savings').value = savings_to_institution;


	}
   
</script>
<?php include 'inc/footer.php'; ?>
