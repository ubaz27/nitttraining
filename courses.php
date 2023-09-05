<?php
 

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
                     <h1 class="m-0">Courses:</h1>
                     

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
        <h3 class="card-title">DataTable with default features</h3> <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i><a href="add_course.php" style="color:white;"> Add Course</a></button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Reset Passord</th>
                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Internet
                        Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td><input type="checkbox"  name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success"></td>
                    <td><input type="submit"  class="btn btn-success btn-sm" value="Reset"></td>
                </tr>
                
                <tr>
                    <td>13</td>
                    <td>Netscape 7.2</td>
                    <td>Win 95+ / Mac OS 8.6-9.2</td>
                    <td>1.7</td>
                    <td><input type="checkbox"  name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success"></td>
                    <td><input type="submit"  class="btn btn-success btn-sm" value="Reset"></td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Netscape Browser 8</td>
                    <td>Win 98SE+</td>
                    <td>1.7</td>
                    <td><input type="checkbox"  name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success"></td>
                    <td><input type="submit"  class="btn btn-success btn-sm" value="Reset"></td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Netscape Navigator 9</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.0</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>1</td>
                    <td>A</td>
                    <td>A</td>
                </tr>
               
            </tbody>
            <tfoot>
                <tr>
                    <th>S/N</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Reset Passord</th>
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
