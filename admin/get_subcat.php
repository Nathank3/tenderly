<?php
include('include/config.php');
if (!empty($_POST["cat_id"])) {
    $id = $_POST['cat_id'];
    $getSub = mysqli_query($con, "SELECT * FROM subcategory WHERE categoryid='$id'");;
?>
<option value="">Select Subcategory</option>
<?php
    while ($sub = mysqli_fetch_array($getSub)) {
    ?>
<option value='<?php echo $sub['subcategory']; ?><'><?php echo $sub['subcategory']; ?></option>

<?php
    }
}
?>