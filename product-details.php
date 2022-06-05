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
            echo "<script>alert('Tender booking has been added')</script>";
            echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
        } else {
            $message = "Product ID is invalid";
        }
    }
}
$pid = intval($_GET['pid']);
if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
    if (strlen($_SESSION['login']) == 0) {
        header('location:login.php');
    } else {
        mysqli_query($con, "insert into wishlist(userId,productId) values('" . $_SESSION['id'] . "','$pid')");
        echo "<script>alert('Product aaded in wishlist');</script>";
        header('location:my-wishlist.php');
    }
}
if (isset($_POST['submit'])) {
    $qty = $_POST['quality'];
    $price = $_POST['price'];
    $value = $_POST['value'];
    $name = $_POST['name'];
    $summary = $_POST['summary'];
    $review = $_POST['review'];
    mysqli_query($con, "insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
}


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
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <?php
                $ret = mysqli_query($con, "select category.categoryName as catname,subCategory.subcategory as subcatname,products.productName as pname from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
                while ($rw = mysqli_fetch_array($ret)) {

                ?>


                <ul class="list-inline list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li><?php echo htmlentities($rw['catname']); ?></a></li>
                    <li><?php echo htmlentities($rw['subcatname']); ?></li>
                    <li class='active'><?php echo htmlentities($rw['pname']); ?></li>
                </ul>
                <?php } ?>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product outer-bottom-sm '>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">


                        <!-- ==============================================CATEGORY============================================== -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">Category</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">

                                    <?php $sql = mysqli_query($con, "select id,categoryName  from category");
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="category.php?cid=<?php echo $row['categoryName']; ?>"
                                                class="accordion-toggle collapsed">
                                                <?php echo $row['categoryName']; ?>
                                            </a>
                                        </div>

                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================== CATEGORY : END ============================================== -->
                        <!-- ============================================== HOT DEALS ============================================== -->


                        <!-- ============================================== COLOR: END ============================================== -->
                    </div>
                </div><!-- /.sidebar -->
                <?php
                $ret = mysqli_query($con, "select * from products where id='$pid'");
                while ($row = mysqli_fetch_array($ret)) {

                ?>


                <div class='col-md-9'>
                    <div class="row  wow fadeInUp">
                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">

                                    <div class="single-product-gallery-item" id="slide1">
                                        <a data-lightbox="image-1"
                                            data-title="<?php echo htmlentities($row['productName']); ?>"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                width="370" height="350" />
                                        </a>
                                    </div>




                                    <div class="single-product-gallery-item" id="slide1">
                                        <a data-lightbox="image-1"
                                            data-title="<?php echo htmlentities($row['productName']); ?>"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                width="370" height="350" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->

                                    <div class="single-product-gallery-item" id="slide2">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->

                                    <div class="single-product-gallery-item" id="slide3">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>">
                                            <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>" />
                                        </a>
                                    </div>

                                </div><!-- /.single-product-slider -->




                            </div>
                        </div>




                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name"><?php echo htmlentities($row['productName']); ?></h1>
                                <?php $rt = mysqli_query($con, "select * from productreviews where productId='$pid'");
                                    $num = mysqli_num_rows($rt); {
                                    ?>

                                <?php } ?>
                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value"
                                                    style="color:black; font-weight: 600; font-size:14px;"><?php echo htmlentities($row['productAvailability']); ?></span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>



                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="stock-box">
                                                <span class="label">Company offering : </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value"
                                                    style="color:black; font-weight: 600; font-size:14px;"><?php echo htmlentities($row['productCompany']); ?></span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>


                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="stock-box">
                                                <span class="label">Expiry Date: </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value"
                                                    style="font-weight: 600; font-size:14px;"><?php echo $row['updationDate'];
                                                                                                                    ?></span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>

                                <div class="price-container info-container m-t-20">
                                    <div class="row">



                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->






                                <div class="quantity-container info-container">
                                    <div class="row">




                                        <div class="col-sm-7">
                                            <a href="admin/pdfs/<?php echo $row['pdfName']; ?>" class="btn btn"
                                                style="background:#265605; color:white;"><i
                                                    class="fa fa-download inner-right-vs"></i>
                                                Download Tender Details</a>

                                        </div>


                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->

                                <!-- <div class="product-social-link m-t-20 text-right">
                                    <span class="social-label">Share :</span>
                                    <div class="social-icons">
                                        <ul class="list-inline">
                                            <li><a class="fa fa-facebook" href="http://facebook.com/transvelo"></a></li>
                                            <li><a class="fa fa-twitter" href="#"></a></li>
                                            <li><a class="fa fa-linkedin" href="#"></a></li>
                                            <li><a class="fa fa-rss" href="#"></a></li>
                                            <li><a class="fa fa-pinterest" href="#"></a></li>
                                        </ul>
                                    </div>
                                </div> -->




                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->


                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text"><?php echo $row['productDescription']; ?></p>
                                        </div>
                                    </div><!-- /.tab-pane -->


                                </div><!-- /.product-add-review -->

                            </div><!-- /.product-tab -->
                        </div><!-- /.tab-pane -->



                    </div><!-- /.tab-content -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.product-tabs -->

        <?php $cid = $row['category'];
                    $subcid = $row['subCategory'];
                } ?>
        <!-- ============================================== UPSELL PRODUCTS ============================================== -->

        <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

    </div><!-- /.col -->
    <div class="clearfix"></div>
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