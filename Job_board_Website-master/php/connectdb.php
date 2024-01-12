<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $emailid = $_POST['emailid'];
    $password = $_POST['password'];
    $contactno = $_POST['contactno'];

    $con = mysqli_connect('localhost', 'root', '', 'user', '3308');
    if ($con == false) {
        echo "Error in database connection!!";
    } else {
        $select = "SELECT * FROM `user_info` WHERE `emailid`='$emailid'";
        $result = mysqli_query($con, $select);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
?>
            <script>
                alert("Emailid already exists! Register with different email");
                window.open('../service-pages/signup.html', '_self');
            </script>
            <?php
        } else {
            $insert = "INSERT INTO `user_info`(`username`, `emailid`, `password`,`contactno`) VALUES ('$username','$emailid','$password','$contactno')";
            $row = mysqli_query($con, $insert);
            if ($row == true) {

            ?>
                <script>
                    alert('Register Successfully!');
                    window.open('../service-pages/login.html', '_self');
                </script>
<?php

            } else {
                echo "error";
            }
        }
    }
}
?>