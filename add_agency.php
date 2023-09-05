 <?php
 if (isset($_GET['id'])) {
     $id = $_GET['id'];
 } else {
     $id = 2;
 }
 
 include 'inc/top-menu.php'; ?>


 <!-- Main Sidebar Container -->
 <?php
 $page = 'director';
 include 'inc/aside.php';
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
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title">Add User Form</h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->
                     <form>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-sm-6">
                                     <div class="form-group">
                                         <label for="exampleInputFullName">Full Name</label>
                                         <input type="text" class="form-control" id="exampleInputEmail1"
                                             placeholder="Enter Full Name">
                                     </div>
                                 </div>

                                 <div class="col-sm-6">
                                     <div class="form-group">
                                         <label for="exampleInputEmail1">Email address</label>
                                         <input type="email" class="form-control" id="exampleInputEmail1"
                                             placeholder="Enter email">
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-sm-6">
                                     <div class="form-group">
                                         <label for="exampleInputPassword1">Phone Number</label>
                                         <input type="text" class="form-control" id="exampleInputPassword1"
                                             placeholder="Enter Number">
                                     </div>
                                 </div>

                                 <div class="col-sm-6">
                                     <div class="form-group">
                                         <label for="exampleInputPassword1"> Role </label>
                                         <select name="role" id="" class="form-control">
                                             <option value="">Admin</option>
                                             <option value="">Coordinator</option>
                                             <option value="">Director</option>
                                             <option value="">Management</option>
                                             <option value="">SA</option>
                                             <option value="">TA</option>


                                         </select>

                                     </div>
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="col-sm-12">
                                     <label for="">Status</label><br>
                                     <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch
                                         data-off-color="danger" data-on-color="success">
                                 </div>

                                 <div class="col-sm-6">
                                 </div>
                             </div>



                         </div>
                         <!-- /.card-body -->

                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary">Submit</button>
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
 <?php include 'inc/footer.php'; ?>
