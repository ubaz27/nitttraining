 <?php
 
 include 'inc/db.php';
 $page = 'report';
 include 'inc/top-menu.php';
//  $role = $_SESSION['role'];
$role = 4;
 //  <!-- Main Sidebar Container -->
 include 'inc/aside.php';
 
 if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
     if (isset($_POST['sdate'])) {
         $sdate = mysqli_real_escape_string($dbc, $_POST['sdate']);
         $starting = mysqli_real_escape_string($dbc, $_POST['sdate']);
         $sdate = date_create($sdate);
         $sdate = date_format($sdate, 'Y-m-d');
         // $check = mysqli_query($dbc,"DELETE FROM tblstudent where course_enrol_id = '$course_enrol_id'");
     } else {
         $sdate = '';
     }
 
     if (isset($_POST['edate'])) {
         $edate = mysqli_real_escape_string($dbc, $_POST['edate']);
         $ending = mysqli_real_escape_string($dbc, $_POST['edate']);
         $edate = date_create($edate);
         $edate = date_format($edate, 'Y-m-d');
         // $check = mysqli_query($dbc,"DELETE FROM tblstudent where course_enrol_id = '$course_enrol_id'");
     } else {
         $edate = '';
     }
 }
 
 if (isset($starting)) {
     $starting2 = date_create($starting);
     $start = date_format($starting2, 'd/m/Y');
 
     $ending2 = date_create($ending);
     $end = date_format($ending2, 'd/m/Y');
 }
 
 ?>

 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-12">
                     <h1 class="m-0">Courses History:</h1>


                 </div><!-- /.col -->

             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <div class="card">
                 <div class="card-header bg-primary">
                     <h3 class="card-title">Search Data</h3>
                 </div>
                 <?php
                 
                 ?>
                 <form action="report_course_enrolment.php" method="POST" enctype="multipart/form-data"
                     name="upload_students">

                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Starting Date</label>

                                     <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                         <input type="text" class="form-control datetimepicker-input"
                                             data-target="#reservationdate" name='sdate' />
                                         <div class="input-group-append" data-target="#reservationdate"
                                             data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Ending Date</label>
                                     <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                         <input type="text" class="form-control datetimepicker-input"
                                             data-target="#reservationdate1" name='edate' />
                                         <div class="input-group-append" data-target="#reservationdate1"
                                             data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div>
                     <div class="card-footer">
                         <button type="submit" id="user_submit" class="btn btn-primary">Search</button>
                     </div>
                 </form>

                 

             </div>

             <!-- Main row -->
             <div class="row">
                 <div class="col-sm-12">




                     <div class="card">
                         <div class="card-header">
                             <h3 class="card-title">List of Enrolled Courses: </h3>
                             <?php
                             if (!empty($start) and !empty($end)) {
                                 echo " <b> $start to $end </b>";
                             } else {
                                 // echo " All";
                             }
                             ?>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>S/N</th>
                                         <th>Course Name</th>
                                         <th>Fee</th>
                                         <th>No Of Participants</th>
                                         <th>Revenue</th>
                                         <th>Course Budget</th>
                                         <th>% Inst.</th>
                                         <th>Starting Date</th>
                                         <th>Ending Date</th>
                                         <!-- <th>coordinator</th> -->
                                         <!-- <th>Course Classification</th> -->
                                         <th>Venue</th>
                                         
                                         <th>Agency Name</th>


                                     </tr>
                                 </thead>
                                 <tbody>

                                     <?php
                                     $saving_institution = $revenue_generated = $course_budget = 0;
                                     if (!empty($sdate)) {
                                         $sql = "SELECT  tblcourse_enrolment.id, tblcourses.course, tblusers.fullname, tblcourse_enrolment.course_classification,tblcourse_enrolment.no_participants, tblvenue.venue_name, course_fee,per_institution,start_date,ending_date, tblagencies.name, tblcourse_enrolment.course_budget FROM `tblcourse_enrolment` 
                                                                                          inner join tblcourses on tblcourse_enrolment.course_id = tblcourses.course_id 
                                                                                          inner join tblusers on tblusers.id = tblcourse_enrolment.coordinator_id 
                                                                                          inner join tblvenue on tblvenue.id =tblcourse_enrolment.venue_id
                                                                                          inner join tblagencies on tblagencies.id = tblcourse_enrolment.agency_id
                                                                                          where  tblcourse_enrolment.start_date >= '$sdate' and tblcourse_enrolment.ending_date <= '$edate'";
                                         // $rs = mysqli_query($dbc, $sql);
                                     
                                         // $sql = "SELECT tblcourses.course, tblusers.fullname, tblcourse_enrolment.course_classification,
                                         // tblcourse_enrolment.no_participants, tblvenue.venue_name, course_fee,per_institution,
                                         // start_date,ending_date, tblagencies.name, tblcourse_enrolment.course_budget
                                         // FROM `tblcourse_enrolment`
                                         // inner join tblcourses on tblcourse_enrolment.course_id = tblcourses.course_id
                                         // inner join tblusers on tblusers.id = tblcourse_enrolment.coordinator_id
                                         // inner join tblvenue on tblvenue.id =tblcourse_enrolment.venue_id
                                         // inner join tblagencies on tblagencies.id = tblcourse_enrolment.agency_id
                                         // where tblcourse_enrolment.start_date >= '2023-03-01' and tblcourse_enrolment.ending_date <= '2023-08-01'";
                                         // // {}
                                     } else {
                                         $sql = "SELECT tblcourse_enrolment.id, tblcourses.course, tblusers.fullname, tblcourse_enrolment.course_classification,tblcourse_enrolment.no_participants, tblvenue.venue_name, course_fee,per_institution,start_date,ending_date, tblagencies.name, tblcourse_enrolment.course_budget FROM `tblcourse_enrolment` 
                                                                                          inner join tblcourses on tblcourse_enrolment.course_id = tblcourses.course_id 
                                                                                          inner join tblusers on tblusers.id = tblcourse_enrolment.coordinator_id 
                                                                                          inner join tblvenue on tblvenue.id =tblcourse_enrolment.venue_id
                                                                                          inner join tblagencies on tblagencies.id = tblcourse_enrolment.agency_id";
                                     }
                                     
                                     $r = mysqli_query($dbc, $sql);
                                     if (mysqli_num_rows($r) >= 1) {
                                         $sn = 1;
                                     
                                         while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                             $revenue = $row['no_participants'] * $row['course_fee'];
                                             echo '<tr>
                                                                                          <td>' .
                                                 $sn .
                                                 '</td>
                                                                                          <td><a href="course_details.php?id='.$row['id'].'">' .
                                                 $row['course'] .
                                                 '</a></td><td>' .
                                                 number_format($row['course_fee'], 2) .
                                                 '</td>
                                                                                          <td>' .
                                                 number_format($row['no_participants'], 2) .
                                                 '</td>
                                                                                          <td>' .
                                                 number_format($revenue, 2) .
                                                 '</td>
                                                                                          <td>' .
                                                 number_format($row['course_budget'], 2) .
                                                 '</td>
                                                                                          <td>' .
                                                 number_format($row['per_institution'], 2) .
                                                 '</td> <td>' .
                                                 $row['start_date'] .
                                                 '</td>
                                                                                          
                                                                                          <td>' .
                                                 $row['ending_date'] .
                                                 '</td>';
                                             //   echo '<td>'.$row['fullname'].'</td>';
                                     
                                             echo '
                                                                                          <td>' .
                                                 $row['venue_name'] .
                                                 '</td>
                                                                                          
                                                                                          <td>' .
                                                 $row['name'] .
                                                 '</td>
                                                                                         ';
                                     
                                             echo '</tr>';
                                             $saving_institution += $row['per_institution'];
                                             $course_budget += $row['course_budget'];
                                             $revenue_generated += $revenue;
                                             $sn += 1;
                                         }
                                     }
                                     
                                     ?>




                                 </tbody>
                                 <tfoot>
                                     <tr>
                                         <th>S/N</th>
                                         <th>Course Name</th>
                                         <th>Fee</th>
                                         <th>No Of Participants</th>
                                         <th>Revenue</th>
                                         <th>Course Budget</th>
                                         <th>% Inst.</th>
                                         <!-- <th>coordinator</th> -->
                                         <th>Starting Date</th>
                                         <th>Ending Date</th>
                                         <!-- <th>Course Classification</th> -->
                                         <th>Venue</th>
                                         
                                         <th>Agency Name</th>

                                     </tr>
                                 </tfoot>
                             </table>
                         </div>
                         <?php 
                         if($role == 4){
                            ?>

                         <div class="callout callout-info">
                             <h5>Total Amount Generated for this period:<b> <?php if (!empty($start)) {
                                 echo " $start to $end";
                             } else {
                                 echo ' All';
                             } ?>
                                 </b></h5>

                             <p><?php echo 'Total Budget ₦ ' . number_format($course_budget, 2); ?><br>
                                 <?php echo 'Revenue Generated ₦ ' . number_format($revenue_generated, 2); ?><br>
                                 <?php echo 'Savings for Institution ₦ ' . number_format($saving_institution, 2); ?></p>
                                 <?php


                                    if (!empty($sdate) and !empty($edate)) {
                                        echo '<form action="pdf.php" name = "pdf_report" method= "POST">
                                                                    <input type="text" name = "sdate" hidden value="';
                                        if (isset($sdate)) {
                                            echo $sdate;
                                        }
                                        echo '">
                                                                    <input type="text" name = "edate" hidden value="';
                                        if (isset($edate)) {
                                            echo $edate;
                                        }
                                        echo '">';
                                    
                                        echo '<div class="card-footer">
                                                    <button type="submit" id="user_submit_pdf" class="btn btn-success">Print</button> 
                                                    </div>
                                                    
                                                                </form>';
                                    }
                                    else
                                    {
                                        // echo "<a  href='pdf.php'   class='btn btn-success' style='text-decoration:none;color:white;'>Print</a>";
                                    }
                 
                 ?>
                         </div>


                         <?php
                         }
                         
                         
                         ?>
                        

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
