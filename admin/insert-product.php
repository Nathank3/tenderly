<?php
session_start();
include('include/config.php');
$now = date_create();
$eaa = date_timestamp_get($now);
$time = $eaa + 10800;
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $subcat = $_POST['subcategory'];
        $productname = $_POST['productName'];
        $productcompany = $_POST['productCompany'];
        $productdescription = $_POST['productDescription'];
        $productavailability = $_POST['productAvailability'];
        $productimage1 = $_FILES["productimage1"]["name"];
        $productimage2 = $_FILES["productimage2"]["name"];
        $productimage3 = $_FILES["productimage3"]["name"];
        $pdfsub = $_FILES["pdf"]["name"];
        //for getting product id
        $query = mysqli_query($con, "select max(id) as pid from products");
        $result = mysqli_fetch_array($query);
        $productid = $result['pid'] + 1;
        $dir = "productimages/$productid";
        if (!is_dir($dir)) {
            mkdir("productimages/" . $productid);
        }
        $exp = $time + (86400 * 3);
        move_uploaded_file($_FILES["pdf"]["tmp_name"], "pdfs/" . $pdfsub);
        move_uploaded_file($_FILES["productimage1"]["tmp_name"], "productimages/$productid/" . $_FILES["productimage1"]["name"]);
        move_uploaded_file($_FILES["productimage2"]["tmp_name"], "productimages/$productid/" . $_FILES["productimage2"]["name"]);
        move_uploaded_file($_FILES["productimage3"]["tmp_name"], "productimages/$productid/" . $_FILES["productimage3"]["name"]);
        //send msg
        include('sendmessage.php');
        $getUsers = mysqli_query($con, "SELECT * FROM  users");
        if (mysqli_num_rows($getUsers) > 0) {
            while ($userInfo = mysqli_fetch_array($getUsers)) {
                $messagesent = "A new tender has been posted :  Product name :  $productname , Category : $category , Company Name : $productcompany";
                $phone = '254' . $userInfo['contactno'];
                sendMsg($messagesent, $phone);
            }
        }

        $sql = mysqli_query($con, "insert into products(category,subCategory,productName,productCompany,productDescription,productAvailability,productImage1,productImage2,productImage3,postingDate,updationDate,pdfName) values('$category','$subcat','$productname','$productcompany','$productdescription','$productavailability','$productimage1','$productimage2','$productimage3','$time','$exp','$pdfsub')");
        $_SESSION['msg'] = "Product Inserted Successfully !!";
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Insert Tenders</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>

    <script>
    function getSubcat(val) {
        $.ajax({
            type: "POST",
            url: "get_subcat.php",
            data: 'cat_id=' + val,
            success: function(data) {
                $("#subcategory").html(data);
            }
        });
    }

    function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }
    </script>


</head>

<body>
    <?php include('include/header.php'); ?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include('include/sidebar.php'); ?>
                <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Insert Tenders</h3>
                            </div>
                            <div class="module-body">

                                <?php if (isset($_POST['submit'])) { ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Well done!</strong>
                                    <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                </div>
                                <?php } ?>


                                <?php if (isset($_GET['del'])) { ?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Yikes</strong>
                                    <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                </div>
                                <?php } ?>

                                <br />

                                <form class="form-horizontal row-fluid" name="insertproduct" method="post"
                                    enctype="multipart/form-data">

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Category</label>
                                        <div class="controls">
                                            <select name="category" class="span8 tip" onChange="getSubcat(this.value);"
                                                required>
                                                <option value="">Select Category</option>
                                                <?php $query = mysqli_query($con, "select * from category");
                                                    while ($row = mysqli_fetch_array($query)) { ?>

                                                <option value="<?php echo $row['categoryName']; ?>">
                                                    <?php echo $row['categoryName']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Sub Category</label>
                                        <div class="controls">
                                            <select name="subcategory" id="subcategory" class="span8 tip" required>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Tender Name</label>
                                        <div class="controls">
                                            <input type="text" name="productName" placeholder="Enter Tender Name"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput"> Company</label>
                                        <div class="controls">
                                            <input type="text" name="productCompany" placeholder="Enter Comapny Name"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput"> Description</label>
                                        <div class="controls">
                                            <textarea name="productDescription" placeholder="Enter Description" rows="6"
                                                class="span8 tip">
</textarea>
                                        </div>
                                    </div>



                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Product Availability</label>
                                        <div class="controls">
                                            <select name="productAvailability" id="productAvailability"
                                                class="span8 tip" required>
                                                <option value="">Select</option>
                                                <option value="In Stock">Open</option>
                                                <option value="out of stock">Closed</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Closing Date</label>
                                        <div class="controls">
                                            <input type="date" name="expdate" required>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Document</label>
                                        <div class="controls">
                                            <input type="file" type="pdf" name="pdf" value="" class="span8 tip"
                                                required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Tender Image1</label>
                                        <div class="controls">
                                            <input type="file" name="productimage1" id="productimage1" value=""
                                                class="span8 tip" required>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Tender Image2</label>
                                        <div class="controls">
                                            <input type="file" name="productimage2" class="span8 tip" required>
                                        </div>
                                    </div>



                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Tender Image3</label>
                                        <div class="controls">
                                            <input type="file" name="productimage3" class="span8 tip">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Insert</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->

    <?php include('include/footer.php'); ?>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    });
    </script>
</body>
<?php } ?>