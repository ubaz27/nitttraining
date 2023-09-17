 <?php
 
include ("inc/db.php");
$page="report";
 include 'inc/top-menu.php';
 
 //  <!-- Main Sidebar Container -->
 include 'inc/aside.php';
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

                <form action="students.php" method="POST" enctype="multipart/form-data" name="upload_students">

                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-6">
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ending Date</label>

                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" name='edate' />
                                                <div class="input-group-append" data-target="#reservationdate"
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
        <h3 class="card-title">List of Enrolled Courses</h3> 
        
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Course Name</th>
                    <!-- <th>coordinator</th> -->
                    <th>Course Classification</th>
                    <th>Venue</th>
                    <th>Fee</th>
                    <th>No Of Participants</th>
                    <th>Revenue</th>
                    <th>Course Budget</th>
                    <th>% Inst.</th>
                    <th>Agency Name</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                   
                </tr>
            </thead>
            <tbody>

            <?php
            
            $q = "SELECT tblcourses.course, tblusers.fullname, tblcourse_enrolment.course_classification,tblcourse_enrolment.no_participants, tblvenue.venue_name, course_fee,per_institution,start_date,ending_date, tblagencies.name, tblcourse_enrolment.course_budget FROM `tblcourse_enrolment` 
            inner join tblcourses on tblcourse_enrolment.course_id = tblcourses.course_id 
            inner join tblusers on tblusers.id = tblcourse_enrolment.coordinator_id 
            inner join tblvenue on tblvenue.id =tblcourse_enrolment.venue_id
            inner join tblagencies on tblagencies.id = tblcourse_enrolment.agency_id" ;
            $r = mysqli_query($dbc, $q);
            if (mysqli_num_rows($r) >= 1) 
            {
                $sn=1;
                
             while( $row = mysqli_fetch_array($r, MYSQLI_ASSOC))   
             {
                $revenue = $row["no_participants"] *   $row['course_fee'] ;
                echo '<tr>
                <td>'.$sn.'</td>
                <td>'.$row['course'].'</td>';
            //   echo '<td>'.$row['fullname'].'</td>';
                
             echo   '<td>'.$row['course_classification'].'</td>
                <td>'.$row['venue_name'].'</td>
                <td>'.number_format($row['course_fee'],2).'</td>
                <td>'.number_format($row['no_participants'],2).'</td>
                <td>'.number_format($revenue,2).'</td>
                <td>'.number_format($row['course_budget'],2).'</td>
                <td>'.number_format($row['per_institution'],2).'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['start_date'].'</td>
                
                <td>'.$row['ending_date'].'</td>';
                
           echo '</tr>';
            $sn+=1;
             }
              
            }
            
            ?>
                
                
              
               
            </tbody>
            <tfoot>
                <tr>
                    <th>S/N</th>
                    <th>Course Name</th>
                    <!-- <th>coordinator</th> -->
                    <th>Course Classification</th>
                    <th>Venue</th>
                    <th>Fee</th>
                    <th>No Of Participants</th>
                    <th>Revenue</th>
                    <th>Course Budget</th>
                    <th>% Inst.</th>
                    <th>Agency Name</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                </tr>
            </tfoot>
        </table>
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
