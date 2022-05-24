<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid = $_GET['scid'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php"; ?>
</head>

<body class="cnt-home">

    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->
        <?php include('includes/top-header.php'); ?>
        <!-- ============================================== TOP MENU : END ============================================== -->
        <?php include('includes/main-header.php'); ?>
        <!-- ============================================== NAVBAR ============================================== -->
        <?php include('includes/menu-bar.php'); ?>
        <!-- ============================================== NAVBAR : END ============================================== -->

    </header>
    <!-- ============================================== HEADER : END ============================================== -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row outer-bottom-sm'>
                <div class='col-md-3 sidebar'>
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                    <div class="sidebar-module-container">

                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
                                <div class="widget-header m-t-20">
                                    <h4 class="widget-title">Category</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10">
                                    <?php $sql = mysqli_query($con, "select id,categoryName  from category");
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <div class="accordion">
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="category.php?cid=<?php echo $row['categoryName']; ?>"
                                                    class="accordion-toggle collapsed">
                                                    <?php echo $row['categoryName']; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->




                            <!-- ============================================== COLOR: END ============================================== -->

                        </div><!-- /.sidebar-filter -->
                    </div><!-- /.sidebar-module-container -->
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="category" class="category-carousel hidden-xs">
                        <div class="item">
                            <div class="image">
                                <img src="assets/images/banners/cat-banner-2.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="container-fluid">
                                <div class="caption vertical-top text-left">
                                    <div class="big-text">
                                        <br />
                                    </div>

                                    <?php $sql = mysqli_query($con, "SELECT *  from subcategory where categoryid='$cid'");
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <?php } ?>

                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div>
                    </div>

                    <div class="search-result-container">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product  inner-top-vs">
                                    <div class="row">
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * from products where subcategory='$cid'");
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
                                                        <br> <span style="color:purple; font-weight: 600;">Sub-category
                                                            :
                                                            <?php echo  $row['subCategory']; ?></span>
                                                        <div class="description"></div>
                                                        <span style="font-weight: 600; display:flex;">Closing In :
                                                            <div class="time" style="color:#d21470; font-weight:600;">
                                                                <?php echo  $row['updationDate']; ?>
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