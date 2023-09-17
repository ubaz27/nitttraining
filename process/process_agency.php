<?php
require('../inc/db.php');

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    $agency_name = $_POST['agency_name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $state = $_POST['state'];
     $fullname = $_POST['fullname'];

     $get_result = mysqli_query($dbc,"select * from tblagencies where name = '$agency_name'");
     if ($get_result->num_rows > 0) {
        $message = 'Record Exist';
        $alert = 'alert alert-danger alert-dismissible';
     }
      else 
     {

 
     if (!empty($agency_name) and !empty($state) and !empty($fullname)) {
         $sql = "INSERT INTO `tblagencies`(`name`, `state`, `contact_person`, `phone`, `email`, `address`) VALUES
          ('$agency_name','$state','$fullname','$phone','$email', '$address')";
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
}
echo ' <div style="width:100%; margin-left:0%"> <div class="' .
         $alert .'"> <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-info"></i> Alert!</h5>' .
         $message .'</div></div>';
 

?>




