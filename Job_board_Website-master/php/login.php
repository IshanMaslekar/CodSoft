<?php
session_start();
if (isset($_POST['login'])) {
    $emailid = $_POST['emailid'];
    $password = $_POST['password'];

    $con = mysqli_connect('localhost', 'root', '', 'user', '3308');
    if ($con == false) {
        echo "Error in connection";
    } else {
        $select = "SELECT * FROM `user_info` WHERE `emailid`='$emailid'  AND `password`='$password'";
        $query = mysqli_query($con, $select);
        $row = mysqli_num_rows($query);
        if ($row == 1) {
            $data = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $data['username'];
            header("Location:../php/mydashboard.php");
        } else {
?>
            <script>
                alert('Wrong Emailid and Password!! Try Again');
                window.open('../service-pages/login.html', '_self');
            </script>
<?php
        }
    }
}

?>