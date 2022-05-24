<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_p = "SELECT * FROM products WHERE id={$id}";
        $query_p = mysqli_query($con, $sql_p);
        if (mysqli_num_rows($query_p) != 0) {
            $row_p = mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
        } else {
            $message = "Product ID is invalid";
        }
    }
    echo "<script>alert('Tender booking has been added')</script>";
    echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}


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
            <div class="furniture-container homepage-container">
                <div class="row">

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

                    <div class='col-md-9'>
                        <!-- ========================================== SECTION – HERO ========================================= -->

                        <div class="search-result-container">
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane active " id="grid-container">
                                    <div class="category-product  inner-top-vs">
                                        <div class="row">
                                            <?php
                                            $ret = mysqli_query($con, "SELECT * from products ORDER BY  id DESC");
                                            $num = mysqli_num_rows($ret);
                                            if ($num > 0) {
                                                while ($row = mysqli_fetch_array($ret)) { ?>

                                            <div class="col-sm-4 col-md-6 wow fadeInUp"
                                                style="background-color:rgb(255, 255, 255);   box-shadow: 0 0 10px;">

                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a
                                                                    href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><img
                                                                        src="assets/images/blank.gif"
                                                                        data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                                        alt="" width="100%" height="200"></a>
                                                            </div><!-- /.image -->
                                                        </div><!-- /.product-image -->
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                            </h3>

                                                            <span
                                                                style="color:black; font-weight: 600; font-size:14px;">Company
                                                                :
                                                                <?php echo  $row['productCompany']; ?></span><br>
                                                            <span style="color:green; font-weight: 600;">Category :
                                                                <?php echo  $row['category']; ?></span>

                                                            <div class="description"></div>
                                                            <span style="font-weight: 600; display:flex;">Closing In :
                                                                <div class="time"
                                                                    style="color:#d21470; font-weight:600;"
                                                                    id="<?php echo 'trip_' . gmdate("Y/m/d h:i:s:a", $row['updationDate']);
                                                                                                                                        ?>">
                                                                </div>
                                                            </span>


                                                        </div><!-- /.product-info -->

                                                    </div>
                                                </div>

                                            </div>

                                            <?php }
                                            } else { ?>

                                            <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                <h3>no tender found</h3>
                                            </div>

                                            <?php } ?>

                                        </div><!-- /.row -->
                                    </div><!-- /.category-product -->

                                </div><!-- /.tab-pane -->



                            </div><!-- /.search-result-container -->

                        </div><!-- /.col -->
                    </div>




                </div>
            </div>
            <!-- ============================================== TABS : END ============================================== -->

            <?php include('includes/brands-slider.php'); ?>
        </div>
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