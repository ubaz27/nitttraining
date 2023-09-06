 <?php
 
include ("inc/db.php");
$page="coordinator";
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

             <!-- Main row -->
             <div class="row">
                 <div class="col-sm-12">
                    



<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Enrolled Courses</h3> <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i><a href="enrol_course.php" style="color:white;"> Enroll Course</a></button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Coord Name</th>
                    <th>Course</th>
                    <th>Venue</th>
                    <th>Fee</th>
                    <th>Status</th>
                   
                </tr>
            </thead>
            <tbody>

            <?php
            
            $q = 'SELECT tblcourse_enrolment.*, tblvenue.venue_name, tblusers.fullname, tblcourses.course FROM 
            `tblcourse_enrolment` 
            inner join tblusers on tblusers.id = tblcourse_enrolment.coordinator_id 
            inner join tblvenue on tblvenue.id = tblcourse_enrolment.venue_id 
            inner join tblcourses on tblcourses.course_id = tblcourse_enrolment.course_id';
            $r = mysqli_query($dbc, $q);
            if (mysqli_num_rows($r) >= 1) 
            {
                $sn=1;
                
             while( $row = mysqli_fetch_array($r, MYSQLI_ASSOC))   
             {
                echo '<tr>
                <td>'.$sn.'</td>
                <td>'.$row['fullname'].'</td>
                <td>'.$row['course'].'</td>
                <td>'.$row['venue_name'].'</td>
                <td>'.$row['course_fee'].'</td>';
                $status = $row['status']==1 ? "Approved" : "Not Approved";
                echo '<td>'.$status.'</td>
               
            </tr>';
            $sn+=1;
             }
              
            }
            
            ?>
                
                
              
               
            </tbody>
            <tfoot>
                <tr>
                <th>S/N</th>
                    <th>Coord Name</th>
                    <th>Course</th>
                    <th>Venue</th>
                    <th>Fee</th>
                    <th>Status</th>
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
