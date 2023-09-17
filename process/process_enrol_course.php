<?php
require '../inc/db.php';
$user_id =1;
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = $_POST['course_id'];
    $category_id    = $_POST['category_id'];
    // $category_classification = $_POST['category_classification'];
    $course_participating = $_POST['course_participating'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $venue_name = $_POST['venue_name'];
    $fees = $_POST['fees'];
    $course_budget = $_POST['course_budget'];
    $no_participants = $_POST['no_participants'];
    $revenue = $_POST['revenue'];
    $inst_percentage = $_POST['inst_percentage'];
    $agency = $_POST['agency'];

    $revenue= $no_participants * $fees;

    $inst_percentage = $no_participants * $fees - $course_budget;

    if (!empty($course_name) and !empty($user_id) and !empty($sdate) and !empty($edate)) {
        $sql = "INSERT INTO `tblcourse_enrolment`( `course_id`, `coordinator_id`, 
        `course_classification`, `venue_id`, `agency_id`,no_participants, `course_fee`,course_budget, 
        `per_institution`, `start_date`, `ending_date`)
        
        VALUES ('$course_name','$user_id','$category_id','$venue_name',
        '$agency','$no_participants','$fees','$course_budget','$inst_percentage', '$sdate', '$edate')";
        $result = mysqli_query($dbc, $sql);
        if (mysqli_affected_rows($dbc) == 1) {
            $message = 'Record Added Successfully';
            $alert = 'alert alert-info alert-dismissible';
        } else {
            $message = 'Something went wrong, try again1 '. $agency;
            $alert = 'alert alert-danger alert-dismissible';
        }
    }
   else {
        $message = 'Check the inputs and try again2';
        $alert = 'alert alert-danger alert-dismissible';
    }
}
echo ' <div style="width:100%; margin-left:0%"> <div class="' .
    $alert .
    '"> <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-info"></i> Alert!</h5>' .
    $message .
    '</div></div>';

?>
