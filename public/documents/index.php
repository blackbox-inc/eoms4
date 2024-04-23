<?php
    include '../connect.php';
   
   
     // PATH TO EOMS QUEUE UPLOAD FOLDER
     $hostname = getenv('HTTP_HOST');
     $uploadPath = $hostname.'/admin/EOMS Queue/upload/';
   
     $path = "../portfolio/";
   //   $path = "https://eomsinc.com/EOMS%20Queue/upload/";
   
   
     if($_GET['cat'] && $_GET['bcode']){
          $category = $_GET['cat'];
          $barcode = $_GET['bcode'];
		  
		   $getFullname = $db->query("SELECT * FROM c_information WHERE bcode='$barcode'");
          $rows = $getFullname->fetch_assoc();

          $fullname = $rows['fullname'];
     }
     
      
     
     
     ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>EOMS | DOCS</title>
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <!-- FANCYBOX -->
      <link rel="stylesheet" href="/v2/node_modules/@fancyapps/fancybox/dist/jquery.fancybox.css">
   </head>

   <style>
/* 

 * {
   background: #000 !important;
   color: #0f0 !important;
   outline: solid #f00 1px !important;
   } */





   .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 100%;
   }  

   .flex-container {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
   }

   .header-logo {
      margin-top: 10px;
      height: 150px;
      width: 135px;
   }

   .header-logo img {
      height: 100%;
   }

   .golden-line {
      background-color: red;
      height: 130px;
      width: 5px;
      margin-left: 10px;
      margin-top: 20px;
   }

   .golden-line img {
      height: 100%;
      width: 100%;
   }

   .header-text {
      font-family: 'Quicksand', sans-serif;
      margin-top: 10px;
      padding: 20px;
   }

   .header-text h3 {
      line-height: 20px;
      font-size: 25px;
   }

   .header-text h2 {
      line-height: 40px;
      font-size: 40px;
   }

   </style>

   
   <body>
      <div class="container">

      <div class="flex-container">
            <div class="header-logo"><img src="../img/logo.png" alt=""></div>
            <div class="golden-line"><img src="../img/line.png" alt=""></div>
            <div class="header-text"  style="flex-grow: 8">
            <h3><?php echo $category?></h3>

                   <h2><?php echo  $fullname?></h2>
                  <svg id="barcode1"></svg>
            </div>
      </div>

     
        
         <div class="row">
            <?php
               $getItem = $db->query("SELECT * FROM portfolio WHERE bcode='$barcode' AND category='$category'");
               while( $rows = $getItem->fetch_assoc()) { 
                  $ext = pathinfo($rows['filename'], PATHINFO_EXTENSION); 
                  
                  if($ext == 'pdf'){
                     echo '  
                     <div class=" col-sm-4 col-lg-3 mb-3">
                        <a href="'.$path.$rows['filename'].'" data-fancybox="images" data-caption="'.$rows['filename'].'">
                           <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" class="center"  height="180px" />
                        </a>
                     </div>
                     ';
                  }else if($ext == 'mp4' || $ext == 'avi' ){
                     echo '  
                        <div class=" col-sm-4 col-lg-3 mb-3">
                           <a data-fancybox="images" data-fancybox data-type="video" data-caption="#" data-src="'.$path.$rows['filename'].'" href="javascript:;">                 
                              <img src="http://clipart-library.com/images/8i65XBAbT.jpg" class="center"  height="180px" >        
                           </a>
                           
                        </div>
                     ';
                  }else{?>


                  <div class=" col-sm-4 col-lg-3 mb-3">
                     <a href="<?php echo $path.$rows['filename']?>" data-fancybox="images" data-caption="<?php echo $rows['filename']?>">
                        <img src="<?php echo $path.$rows['filename']?>" class="center"  height="180px" />
                     </a>
                  </div>

                     
               <?php  }?>

              
               
                          
                  <!-- <div  style="border: 1px solid gray; margin: 1px;"  class="col-lg-4">
                     <a href="<?php echo $path.$rows['filename']?>" data-fancybox="images" data-caption="<?php echo $rows['filename']?>">
                        <img src="<?php echo $path.$rows['filename']?>" class="center" height="180px" />
                     </a>
                  </div> -->
             
               <?php } ?>
            <!-- <a data-fancybox="images" data-fancybox data-type="iframe" data-src="http://www.poea.gov.ph/laws&rules/files/Revised%20POEA%20Rules%20And%20Regulations.pdf" href="javascript:;">
               PDF
               </a> -->
         </div>
      </div>
      <!-- https://docs.google.com/gview?url=http://localhost/admin/EOMS%20Queue/upload/200%20-%20600%20Skilled%20Forms.docx-RESUME-1558335529.docx&embedded=true -->
      <script
         src="https://code.jquery.com/jquery-3.4.1.js"
         integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
         crossorigin="anonymous"></script>
      <!-- FANCYBOX -->
      <script src="/v2/node_modules/@fancyapps/fancybox/dist/jquery.fancybox.js"></script>
      <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/barcodes/JsBarcode.code128.min.js"></script>

     

      <script>
      
      JsBarcode("#barcode1", "<?php echo $barcode?>", {
         format: "CODE128A",
         width: 1,
         height: 30,
         fontSize: 14,
         margin: 1,
         textAlign	: "left",	
      });
      
      </script>
   </body>
</html>