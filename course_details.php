<?php

include 'inc/db.php';
$page = 'report';
include 'inc/top-menu.php';
$role = 4;

//  <!-- Main Sidebar Container -->
include 'inc/aside.php';

$course_id = $_GET['id'];
$total_no_participants = $total_budget = $total_courses = $total_renveue_generated = $total_saving = 0;

$sql = "SELECT  tblcourse_enrolment.id,tblusers.fullname, tblcourses.course, tblusers.fullname, 
tblcourse_enrolment.course_classification,tblcourse_enrolment.no_participants,
 tblvenue.venue_name, course_fee,per_institution,start_date,ending_date, 
 tblagencies.name, tblcourse_enrolment.course_budget FROM `tblcourse_enrolment` 
 inner join tblcourses on tblcourse_enrolment.course_id = tblcourses.course_id 
 inner join tblusers on tblusers.id = tblcourse_enrolment.coordinator_id 
 inner join tblvenue on tblvenue.id =tblcourse_enrolment.venue_id
 inner join tblagencies on tblagencies.id = tblcourse_enrolment.agency_id
 where  tblcourse_enrolment.id = '$course_id' ";
$result = mysqli_query($dbc, $sql);
if (mysqli_num_rows($result) == 1) {
    if ($row = mysqli_fetch_array($result)) {
        $course_name = $row['course'];
        $revenu_generated = $row['no_participants'] * $row['course_fee'];
        $total_renveue_generated += $revenu_generated;
        $total_budget += $row['course_budget'];
        $total_courses += 1;
        $total_no_participants += $row['no_participants'];
        $total_saving += $row['per_institution'];
        $start = $row['start_date'];
        $end = $row['ending_date'];
        $coordinator_name = $row['fullname'];
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<style>
    #details {
        float: left;
        height: 470px;
        width: 45%;
        padding: 0 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Courses Details:</h1>


                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" >
        <div class="container-fluid" >


            <!-- Main row -->
            <div class="row">
                <div class="col-sm-12">




                    <div class="card" style="height: 1000px;">
                        <div class="card-header">
                            <h3 class="card-title">List of Enrolled Courses: </h3><button type="button"
                                class="btn btn-primary float-right btn-sm"><i class="fas fa-plus"></i><a
                                    href="report_course_enrolment.php" style="color:white;"> Back</a></button>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div>
                                <h3><?php echo $course_name; ?></h3>
                                <hr>
                            </div>

                            <div id="details" style="border:none;">
                                <h3>Course Summary</h3>
                                <p>
                                    <strong>Course Coordinator: <?php echo $coordinator_name; ?></strong><br>
                                    <strong>Number of Participants: <?php echo number_format($total_no_participants); ?></strong><br>
                                    <strong>Revenue Generated: <?php echo number_format($total_renveue_generated); ?></strong><br>
                                    <strong>Course Budget: <?php echo number_format($total_budget); ?></strong><br>
                                    <strong>Savings to The Institute: <?php echo number_format($total_saving); ?></strong><br>
                                    <strong>Course Commencement Date: <?php echo date_format(date_create($start), 'd-m-Y'); ?></strong><br>
                                    <strong>Course Finishing Date: <?php echo date_format(date_create($end), 'd-m-Y'); ?></strong><br>
                                    <button type="button" class="btn btn-primary float-left btn-sm" style="margin-right: 1px;">
                                    <i class="fas fa-download"></i> <a style="color: white;"
                                        href="pdf.php?type=course_details&id=<?php echo $course_id; ?>">Print</a>
                                </button>
                                <button type="button" class="btn btn-success float-left btn-sm" style="margin-right: 0px;">
                                    <i class="fas fa-download "></i> <a style="color: white;"
                                        href="documents.php?id=<?php echo $course_id; ?>">Documents</a>
                                </button>
                                <br>
                                <div>
                                    <h3>List of Participants</h3>
                                    <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Full Name</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                               

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $r = mysqli_query($dbc,"select * from tblstudent where course_enrol_id = '$course_id'") or die(mysqli_error($dbc));
                                    $sn = 1;
                                        while ($row = mysqli_fetch_array($r)) {
                                        echo '<tr>
                                        <td>'.$sn.'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['gender'].'</td>
                                        <td>'.$row['phone'].'</td>
                                       
                                    </tr>';
                                    $sn+=1;
                                    }

                                    ?>


                                        </body>         

                                    </table>
                                    
                                </div>






                                

                                </p>
                            </div>
                            <div id="details" style="border:none;">
                                <img src="./imgs/logo.png" style="height:50%; width:50%;" alt="">
                            </div>

                        </div>




                        <!-- /.card-body -->

                    </div>

                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'inc/footer.php'; ?>
