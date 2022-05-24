<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php"; ?>
</head>

<body class="cnt-home">

    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/main-header.php'); ?>
        <?php include('includes/menu-bar.php'); ?>
    </header>

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">

        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->
                <?php include('includes/side-menu.php'); ?>

                <!-- ================================== TOP NAVIGATION : END ================================== -->
            </div><!-- /.sidemenu-holder -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <center>
                    <h1 style="align-items: center; font-size:50px;  font-weight: 600;">WELCOME TO TENDERLY</h1>


                </center>
            </div>


            <?php include('includes/brands-slider.php'); ?>

        </div>
        <?php include('includes/footer.php'); ?>

        <script src="assets/js/jquery-1.11.1.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>

        <script src="assets/js/echo.min.js"></script>
        <script src="assets/js/jquery.easing-1.3.min.js"></script>
        <script src="assets/js/bootstrap-slider.min.js"></script>
        <script src="assets/js/jquery.rateit.min.js"></script>
        <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        <!-- For demo purposes – can be removed on production -->

        <script src="switchstylesheet/switchstylesheet.js"></script>

        <script>
        $(document).ready(function() {
            $(".changecolor").switchstylesheet({
                seperator: "color"
            });
            $('.show-theme-options').click(function() {
                $(this).parent().toggleClass('open');
                return false;
            });
        });

        $(window).bind("load", function() {
            $('.show-theme-options').delay(2000).trigger('click');
        });
        </script>
        <!-- For demo purposes – can be removed on production : End -->



</body>

</html>


</style>