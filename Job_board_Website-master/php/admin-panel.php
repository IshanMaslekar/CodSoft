<!doctype html>
<html lang="en">

<head>
    <title>TaxHeal - Online HR Portal</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <link rel="shortcut icon" href="../assets/logo and favicon/favicon.png" type="image/x-icon" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link rel="stylesheet" href="../css/navbar.css">

    <link rel="stylesheet" href="../css/common-navbar-style.css">

    <link rel="stylesheet" href="../css/job-list.css">

    <link rel="stylesheet" href="../css/footer.css">

</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.html">
            <img class="logo-one" src="../assets/logo and favicon/logo.jpeg" alt="Navbar logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.html">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../service-pages/job-list.html">Job Opportunities</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../index.html#about">About Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link btn btn-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>Login / SignUp</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../service-pages/admin-login.html">As Admin</a>
                        <a class="dropdown-item" href="../service-pages/signup.html">As Candidate</a>
                        <a class="dropdown-item" href="../php/logout.php">Log Out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>



    <?php

    $con = mysqli_connect('localhost', 'root', '', 'user', '3308');
    if ($con == false) {
        echo "Error in database connection!!";
    } else {
        $select = "SELECT * FROM `user_resume`";
        $query = mysqli_query($con, $select);
        echo "<div class='row job-section'>";
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<div class='job-card col-lg-4 col-md-6'>";
            echo "<div class='card shadow rounded'>";
            echo "<h3 class='p-3'>" . $row["fullname"] . "</h3>";
            echo "<div class='card-body'";
            echo "<h4>" . $row["jobposition"] . "</h4>";
            echo "<hr />";
            echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target=#" . $row["fullname"] . ">See Details</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            // Modal
            echo "<div class='modal fade' id=" . $row["fullname"] . "tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5  class='modal-title' id='exampleModalLongTitle'>" . $row["fullname"] . "</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
            echo "<div class='modal-body'>";

            echo "<h4>Profile : " . $row["jobposition"] . "</h4>";

            echo "<h4>Address : </h4>";
            echo "<ul>";
            echo "<li>City : " . $row["city"] . "</li>";
            echo "<li>State/Province : " . $row["state/province"] . "</li>";
            echo "<li>Zipcode : " . $row["zipcode"] . "</li>";
            echo "</ul>";

            echo "<h4>Contact Details : </h4>";
            echo "<ul>";
            echo "<li>Phone : " . $row["phone"] . "</li>";
            echo "<li>Email Address : " . $row["emailid"] . "</li>";
            echo "</ul>";

            echo "<h4>Details about previous job : </h4>";
            echo "<ul>";
            echo "<li>Previous Job Position : " . $row["prejobposition"] . "</li>";
            echo "<li>Job City : " . $row["jobcity"] . "</li>";
            echo "<li>Job State : " . $row["jobstate"] . "</li>";
            echo "<li>Job Starting Date : " . $row["jobstartingdate"] . "</li>";
            echo "<li>Job Ending Date : " . $row["jobendingdate"] . "</li>";
            echo "</ul>";

            echo "<h4>Details about education : </h4>";
            echo "<ul>";
            echo "<li>School Name : " . $row["schoolname"] . "</li>";
            echo "<li>School Location : " . $row["schoollocation"] . "</li>";
            echo "<li>Degree : " . $row["degree"] . "</li>";
            echo "<li>Field of Study : " . $row["fieldofstudy"] . "</li>";
            echo "<li>School Starting Date : " . $row["schoolstartingdate"] . "</li>";
            echo "<li>School Ending Date : " . $row["schoolendingdate"] . "</li>";
            echo "</ul>";

            echo "<h4>Skills : </h4>";
            echo $row['skills'] . "<br />";

            echo "<h4>Why should you be hired for this role?</h4>";
            echo $row["finalanswer"];

            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-dark' data-dismiss='modal'>Close</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    }

    ?>



    <footer id="contact">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <a href="../index.html">
                            <img class="logo2" src="../assets/logo and favicon/logo.jpeg" alt="footer logo" />
                        </a>
                        <p class="content1">
                            TaxHeal.in (a unit of Smilyo Private Limited) started as an ERP
                            solution provider in 2016, now serving clients across 18
                            different industries including manufacturers, traders,
                            wholesalers, shops, contractors, housekeeping, security,
                            builders, logistics, schools, hospitals, chemists, resturants,
                            hotels, professionals, software, finance and chit-fund
                            companies. <br /><br />
                            Proudly associated with a 30 years old Chartered Accountants
                            firm for expertise and professional solutions, our primary focus
                            is client satisfaction and peace of mind.
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <h6 class="content2">CONTACT US</h6>
                        <div class="social-icons">
                            <a class="icon-link" href="https://www.facebook.com/taxhealdotin/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a class="icon-link" href="https://www.instagram.com/taxhealin/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a class="icon-link" href="https://twitter.com/taxhealin"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a class="icon-link" href="https://www.linkedin.com/company/gst-n-it/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>

                            <br /><br />
                            <p class="contact-details">
                                <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;
                                taxhealin@gmail.com <br /><br />
                                <i class="fa fa-phone" aria-hidden="true"></i> &nbsp;
                                +91-7428701901 <br /><br />
                                <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;
                                404, 4th-Floor, 93 Ashok Bhawan, Nehru Place, Delhi - 110019
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-3">
                        <h4>TaxHeal.in</h4>
                        <div>
                            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.713516667254!2d77.25054961455767!3d28.548329494638878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce30c95555543%3A0x4893017bf990f99e!2sSrivastava%20Kumar%20%26%20Co.%20Chartered%20Accountants!5e0!3m2!1sen!2sin!4v1594877981766!5m2!1sen!2sin" width="440" height="440" frameborder="0" style="border: 0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer2">
                TaxHeal.in&nbsp;&copy;&nbsp;2020 All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>