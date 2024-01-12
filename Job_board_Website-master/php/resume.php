<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $jobposition = $_POST['jobposition'];
    $profession = $_POST['profession'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $contactno = $_POST['contactno'];
    $emailid = $_POST['emailid'];
    $position = $_POST['position'];
    $jobcity = $_POST['jobcity'];
    $jobstate = $_POST['jobstate'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $schoolname = $_POST['schoolname'];
    $schoollocation = $_POST['schoollocation'];
    $degree = $_POST['degree'];
    $field = $_POST['field'];
    $schoolstartdate = $_POST['schoolstartdate'];
    $schoolenddate = $_POST['schoolenddate'];
    $skills = $_POST['skills'];
    $hirequestion = $_POST['hirequestion'];

    $con = mysqli_connect('localhost', 'root', '', 'user', '3308');
    if ($con == false) {
        echo "Error in database connection!!";
    } else {
        $select = "SELECT * FROM `user_resume` WHERE `emailid`='$emailid'";
        $result = mysqli_query($con, $select);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
?>
            <script>
                alert("Emailid already exists! Register with different email");
                window.open('../service-pages/resume.html', '_self');
            </script>
            <?php
        } else {
            $insert = "INSERT INTO `user_resume`(`fullname`,`jobposition`,`profession`,`city`,`state/province`,`zipcode`,`phone`,`emailid`,`prejobposition`,`jobcity`,`jobstate`,`jobstartingdate`,`jobendingdate`,`schoolname`,`schoollocation`,`degree`,`fieldofstudy`,`schoolstartingdate`,`schoolendingdate`,`skills`,`finalanswer`) VALUES('$username','$jobposition','$profession','$city','$state','$zipcode','$contactno','$emailid','$position','$jobcity','$jobstate','$startdate','$enddate','$schoolname','$schoollocation','$degree','$field','$schoolstartdate','$schoolenddate','$skills','$hirequestion')";
            $row = mysqli_query($con, $insert);
            if ($row == true) {

            ?>
                <script>
                    alert('Register Successfully!');
                    window.open('../service-pages/candidate-final-response.html', '_self');
                </script>
<?php

            } else {
                echo "error";
            }
        }
    }
}
?>