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
                    <th>Reg Number</th>
                    <th>Student Name</th>
                    <th>Gender</th>
                    <th>Phne</th>
                    <th>Email</th>
                    <th>Rank</th>
                    <th>Agency Name</th>
                    <th>Course</th>
                   
                </tr>
            </thead>
            <tbody>

            <?php
            
            $q = 'SELECT a.`reg_number`, a.`name`, a.`phone`, a.`email`, b.`name` as agency, a.`rank`, a.`gender`, c.`course` FROM `tblstudent` a 
            JOIN tblagencies b ON a.agency = b.id join tblcourses c ON c.course_id = a.course_enrol_id' ;
            $r = mysqli_query($dbc, $q);
            if (mysqli_num_rows($r) >= 1) 
            {
                $sn=1;
                
             while( $row = mysqli_fetch_array($r, MYSQLI_ASSOC))   
             {
                echo '<tr>
                <td>'.$sn.'</td>
                <td>'.$row['reg_number'].'</td>
                <td>'.$row['name'].'</td>';
                $gender = $row['gender']=='M' ? "Male" : "Female";
             echo   '<td>'.$gender.'</td>
                <td>'.$row['phone'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['rank'].'</td>
                <td>'.$row['agency'].'</td>
                
                <td>'.$row['course'].'</td>';
                
           echo '</tr>';
            $sn+=1;
             }
              
            }
            
            ?>
                
                
              
               
            </tbody>
            <tfoot>
                <tr>
                <th>S/N</th>
                <th>Reg Number</th>
                    <th>Student Name</th>
                    <th>Gender</th>
                    <th>Phne</th>
                    <th>Email</th>
                    <th>Rank</th>
                    <th>Agency Name</th>
                    <th>Course</th>
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
