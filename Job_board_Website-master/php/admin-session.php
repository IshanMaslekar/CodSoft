<html>

<head>
    <title>TaxHeal - Online HR Portal</title>
</head>

<body>

    <?php

    session_start();
    if ($_SESSION['username']) {
        echo '<script>alert("Hello ' . $_SESSION['username'] . '");</script>';
    ?>

        <script>
            window.open('../php/admin-panel.php', '_self');
        </script>

    <?php

    } else {
        echo "error!!";
    }

    ?>

</body>

</html>