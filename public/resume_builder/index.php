<?php include 'header.php'?>
<?php include 'inc/navbar.php'?>
<div class="container">
<br><br>

<?php



$mode = "";

if(isset($_GET['barcode'])){

   $mode = "UPDATE";
   $mainBarcode = $_GET['barcode'];

   include 'inc/update_resume.php';


}else{

   $mode = "NEW";
   include 'inc/insert.php';
}








?>





</div>
<?php include 'inc/modal.php'?>
<?php include 'footer.php'?>