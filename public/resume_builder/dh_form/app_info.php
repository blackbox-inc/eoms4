
<?php 
include 'connect.php';

$general_barcode = $_GET['bcode'];


?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="node_modules/dropify/dist/css/dropify.min.css">
      <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
      <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.css">
      <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="style.css">
      <style>
      </style>
      <title>Applicant</title>
   </head>
   <body>
      <div class="jumbotron jumbotron-fluid">
         <div class="container">
            <h1 class="display-4">Applicant</h1>
         </div>
      </div>
      <div class="container">
         <div class="card border-secondary mb-3">
            <div class="card-header">
               <h3>PERSONAL INFORMATION</h3>
            </div>
            <!-- BARCODE -->
            <div class="container">
               <div  class="float-right center-block input-group mt-3" style="width: 40%">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1"><i class="fas fa-qrcode"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-lg u_bcode" placeholder="Barcode" value="<?php echo $general_barcode?>" readonly >
               </div>
            </div>
            <div class="card-body text-secondary">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="fas fa-signature"></i></span>
                              </div>
                              <input type="text" class="form-control u_surname" placeholder="Surname" aria-label="Apelyido" value="1">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="fas fa-signature"></i></span>
                              </div>
                              <input type="text"  class="form-control u_firstname" placeholder="Firstname" aria-label="Name" value="1" >
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="fas fa-signature"></i></span>
                              </div>
                              <input type="text"  class="form-control u_middlename" placeholder="Middlename" aria-label="middlename" value="1" >
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="card">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-lg-6">
                                       <div class="input-group input-group-default mb-3">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-phone-square"></i></i></span>
                                          </div>
                                          <input type="text"  class="form-control u_contact_number" placeholder="Contact Number" value="1" >
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text" id="basic-addon1"><i class="fas fa-passport"></i></span>
                                          </div>
                                          <input type="text"  class="form-control u_passport" placeholder="Passport Number" value="1" >
                                       </div>
                                    </div>

                                    <div class="col-lg-6">
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-md"></i></span>
                                          </div>
                                          <input type="text" class="form-control u_position" value="DOMESTIC HELPER" placeholder="Position Applying">
                                       </div>
                                    </div>



                                       <div class="col-lg-6">

                                          <div class="input-group mb-3">
                                             <div class="input-group-prepend">
                                             <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-md"></i></span>
                                             </div>
                                             <input type="text" class="form-control u_weight"  placeholder="Enter Weight" value="1">
                                          </div>

                                       </div>

                                       <div class="col-lg-6">

                                          <div class="input-group mb-3">
                                             <div class="input-group-prepend">
                                             <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-md"></i></span>
                                             </div>
                                             <input type="text" class="form-control u_height"  placeholder="Enter Height" value="1">
                                          </div>

                                       </div>
                     

                                       <div class="col-lg-6">

                                          <div class="input-group mb-3">
                                             <div class="input-group-prepend">
                                             <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-md"></i></span>
                                             </div>
                                             <input type="text" class="form-control u_blood_type"  placeholder="Enter Blood Type" value="1">
                                          </div>

                                       </div>
                                    
                                    <div class="col-lg-6">
                                       <select class="custom-select u_country mb-3">
                                          <option value="" >Preferred Country</option>
                                          <option selected value="KSA">KSA</option>
                                          <option value="QATAR">QATAR</option>
                                          <option value="SINGAPORE">SINGAPORE</option>
                                          <option value="UAE">UAE</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="card">
                                    <div class="card-header">
                                       <h4>APPLICANT CATEGORY</h4>
                                    </div>
                                    <div class="card-body">
                                       <div class="row">
                                          <div class="col-lg-6">
                                             <div class="form-check">
                                                <input class="form-check-input " type="radio" name="rdio" id="u_radio_first" >
                                                <label class="form-check-label" for="u_radio_first">
                                                <strong>I'M FIRST TIMER</strong>
                                                </label>
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="form-check">
                                                <input class="form-check-input " type="radio" name="rdio" id="u_radio_ex" checked >
                                                <label class="form-check-label" for="u_radio_ex">
                                                <strong>I'M EX-ABROAD</strong>
                                                </label>
                                             </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Previous Agency Name</label>
                                                <input type="text" class="form-control u_previous_agency" value="1" >
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <br>
                                 <div class="card">
                                    <div class="card-body">
                                       <div class="row">
                                          <div class="col-lg-6">
                                             <div class="input-group input-group-default mb-1">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroup-sizing-lg"><i class="far fa-flag"></i></span>
                                                </div>
                                                <input type="text" class="form-control u_nationality" value="FILIPINO" >
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="input-group input-group-default mb-1">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-church"></i></span>
                                                </div>
                                                <input type="text" class="form-control u_religion" placeholder="Religion" value="1" >
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="input-group input-group-default mb-1">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text " id="inputGroup-sizing-lg"><i class="fas fa-birthday-cake"></i></span>
                                                </div>
                                                <input type="date" class="form-control u_dob" placeholder="Date of Birth" value="01/01/2021" >
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="input-group input-group-default mb-1">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-location-arrow"></i></span>
                                                </div>
                                                <input type="text" class="form-control u_place_of_birth" placeholder="Place of Birth" value="1" >
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="input-group input-group-default mb-1">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-location-arrow"></i></span>
                                                </div>
                                                <input type="text" class="form-control u_perma_address" placeholder="Address" value="1" >
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="input-group input-group-default mb-1">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-user-friends"></i></span>
                                                </div>
                                                <input type="text" class="form-control u_marital_status" placeholder="Marital Status" value="1" >
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="input-group input-group-default mb-1">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-baby"></i></span>
                                                </div>
                                                <input type="number"  class="form-control u_no_of_children" placeholder="No. of Children" value="1" >
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <select class="custom-select u_educational_status">
                                                <option value="" >Educational Status</option>
                                                <option value="HIGH SCHOOL GRAD">HIGH SCHOOL GRAD</option>
                                                <option value="COLLEGE GRAD" selected>COLLEGE GRAD</option>
                                                <option value="COLLEGE UNDERGRAD.">COLLEGE UNDERGRAD.</option>
                                                <option value="ELEMENTARY">ELEMENTARY</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <input type="file" class="dropify u_whole_body_pic" data-allowed-file-extensions='["jpg", "JPG", "png", "PNG", "bmp","BMP", "gif", "txt"]' data-height="450" data-default-file="default.jpg" />
                           <div class="card" >
                              <div class="card-body">
                              </div>
                              <section>
                                 <div class="container">
                                    <div class="card  mb-3">
                                       <div class="card-header text-center">
                                          <h5>HOUSEHOLD WORK EXPERIENCE(S)</h5>
                                       </div>
                                       <div class="card-body text-dark">
                                          <div class="row">
                                             <div class=" col-md-4">
                                                <div class="form-group">
                                                   <div class="form-check">
                                                      <input class="form-check-input u_washing" type="checkbox" id="u_washing" value="1" checked>
                                                      <label class="form-check-label" for="u_washing">
                                                         <h6>WASHING</h6>
                                                      </label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" col-md-4">
                                                <div class="form-group">
                                                   <div class="form-check">
                                                      <input class="form-check-input u_sewing" type="checkbox" id="u_sewing" value="1" checked>
                                                      <label class="form-check-label" for="u_sewing">
                                                         <h6>SEWING</h6>
                                                      </label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" col-md-4">
                                                <div class="form-group">
                                                   <div class="form-check">
                                                      <input class="form-check-input u_cleaning" type="checkbox" id="u_cleaning" value="1">
                                                      <label class="form-check-label" for="u_cleaning">
                                                         <h6>CLEANING</h6>
                                                      </label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" col-md-4">
                                                <div class="form-group">
                                                   <div class="form-check">
                                                      <input class="form-check-input u_cooking" type="checkbox" id="u_cooking" value="1" checked>
                                                      <label class="form-check-label" for="u_cooking">
                                                         <h6>COOKING</h6>
                                                      </label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" col-md-4">
                                                <div class="form-group">
                                                   <div class="form-check">
                                                      <input class="form-check-input u_ironing" type="checkbox" id="u_ironing" value="1" checked>
                                                      <label class="form-check-label " for="u_ironing">
                                                         <h6>IRONING</h6>
                                                      </label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" col-md-4">
                                                <div class="form-group">
                                                   <div class="form-check">
                                                      <input class="form-check-input u_babycare" type="checkbox" id="u_babycare" value="1" checked>
                                                      <label class="form-check-label" for="u_babycare">
                                                         <h6>BABYCARE</h6>
                                                      </label>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </section>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <button class="btn btn-success btn-lg btn-block mt-3 update_now">UPDATE</button>
            </div>
         </div>
      </div>
      <section>
         <div class="container">
            <div class="card border-dark mb-3" >
               <div class="card-header">
                  <h3>PREVIOUS EMPLOYMENT</h3>
               </div>
               <div class="card-body text-dark">
                  <button class="btn btn-success btn-lg"data-toggle="modal" data-target="#staticBackdrop" >ADD PREVIOUS EMPLOYMENT +</button>
               </div>
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                       
                     <!-- //////////////////////////////////////////////////////////// -->

                     <?php  $getExp = $db -> query("SELECT * FROM c_hsw_exp WHERE bcode='$general_barcode' ORDER BY id DESC");
                     while($rows = $getExp->fetch_assoc()){ ?>


                        <div class="col-lg-4">
                           <div class="wrapper_pe">
                              <div class="card border-dark mb-3">
                                 <div class="card-header">
                                    <h3><?php echo $rows['country']?></h3>
                                  </div>
                                 <div class="card-body text-dark">
                                    <h5 class="card-title"><?php echo $rows['exp_position']?></h5>
                                    <small class="card-text"><?php echo $rows['frm']?> to <?php echo $rows['to_exp']?></small>
                                 </div>
                              </div>
                           </div>
                        </div>

                     <?php }?>
                       
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

 
<!-- CONTACT PERSON -->
      <section>
         <div class="container">
            <div class="card border-dark mb-3" >
               <div class="card-header">
                  <h3>CONTACT PERSON <a href="#" class="btn btn-success btn-lg"data-toggle="modal" data-target="#static_ContactPerson">+</a></h3>
               </div>
               <div class="card-body text-dark">
                  <button class="btn btn-success btn-lg"data-toggle="modal" data-target="#static_ContactPerson" >+</button>
               </div>
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                       
                     <!-- //////////////////////////////////////////////////////////// -->

                     <!-- <?php  $getExp = $db -> query("SELECT * FROM c_hsw_exp WHERE bcode='$general_barcode' ORDER BY id DESC");
                     while($rows = $getExp->fetch_assoc()){ ?> -->


                        <!-- <div class="col-lg-4">
                           <div class="wrapper_pe">
                              <div class="card border-dark mb-3">
                                 <div class="card-header">
                                    <h3><?php echo $rows['country']?></h3>
                                  </div>
                                 <div class="card-body text-dark">
                                    <h5 class="card-title"><?php echo $rows['exp_position']?></h5>
                                    <small class="card-text"><?php echo $rows['frm']?> to <?php echo $rows['to_exp']?></small>
                                 </div>
                              </div>
                           </div>
                        </div> -->

                     <!-- <?php }?> -->
                       asdasdasdsadasdsadasd
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>


     

      <?php include 'modal.php';?>
      <script src="node_modules/jquery/dist/jquery.min.js"></script>
      <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="node_modules/dropify/dist/js/dropify.min.js"></script>
      <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
      <script src="node_modules/@fortawesome/fontawesome-free/js/all.js"></script>
      <script src="script.js"></script>


      <script>

         var general_barcode = "<?php echo $general_barcode?>";

      </script>
   </body>
</html>