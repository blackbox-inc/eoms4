<?php 
   include "connect.php";



   
   if(isset($_GET['bcode'])){
   
     
       $barcode  = $_GET['bcode'];
   
       // C_INFORMATION
       $c_information = $db -> query("SELECT * FROM c_information WHERE bcode='$barcode'");
       $rows = $c_information->fetch_assoc();
   
       $id  = $rows['id'];
       $bcode  = $rows['bcode'];
       $fullname = $rows['fullname'];
       $pnumber = $rows['pnumber'];
       $gender = $rows['gender'];
       $birthday = $rows['birthday'];
       $height = $rows['height'];
       $resume = $rows['resume'];
       $objectives = $rows['objectives'];
       $idpic = $rows['idpic'];
       $status = $rows['status'];
       $class = $rows['class'];
       $scomment = $rows['scomment'];
       $contact_person = $rows['contact_person'];
       $religion = $rows['religion'];
       $place_of_birth = $rows['place_of_birth'];
       $weight = $rows['weight'];
       $blood_type = $rows['blood_type'];
       $pcountry = $rows['pcountry'];
       $msalary = $rows['msalary'];
       $first_or_ex = $rows['first_or_ex'];
       $ex_agency = $rows['ex_agency'];
    
   
   
   
   
   }else{
       header("Location: /v2/resume_builder");
   }
   
   


   function split_name($name) {
      $parts = array();
  
      while ( strlen( trim($name)) > 0 ) {
          $name = trim($name);
          $string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
          $parts[] = $string;
          $name = trim( preg_replace('#'.preg_quote($string,'#').'#', '', $name ) );
      }
  
      if (empty($parts)) {
          return false;
      }
  
      $parts = array_reverse($parts);
      $name = array();
      $name['first_name'] = $parts[0];
      $name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
      $name['last_name'] = (isset($parts[2])) ? $parts[2] : ( isset($parts[1]) ? $parts[1] : '');
      
      return $name;
  }

  $split_name = split_name($fullname);

   $r_lastname =   $split_name['last_name'];
   $r_middlename =   $split_name['middle_name'];
   $r_firstname =   $split_name['first_name'];
   
   
   
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
    <title>Update Applicant</title>



    <script>
    var counter_validator = 1;
    var completed_data = 5;
    </script>


    <style>
    .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #0C9;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
    }


    .float_validator {
        position: fixed;

        /* bottom: 200px;
        right: 5px; */
        bottom: 2%;
        left: 0;
        background-color: white;
        color: #202020;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
    }



    .my-float {
        margin-top: 22px;
    }

    .my-float2 {
        margin-top: 22px;
    }

    .correct {
        color: green;
        font-size: 1.5em;
    }

    .wrong {
        color: red;
        font-size: 1.5em;
    }
    </style>
</head>

<body>

    <div class="float_validator">

        <div class="card">
            <div class="card-header" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                aria-controls="collapseExample">
                <i class="fas fa-angle-down"></i>
                <i class="fas fa-angle-up"></i> VALIDATOR
            </div>
            <div class="card-body " id="collapseExample">
                <h5 class="card-title title__status">Incomplete Information</h5>
                <ul>
                    <li><i class="far fa-check-circle correct"></i> PERSONAL INFORMATION</li>
                    <li><i class="far fa-times-circle wrong o_i"></i> OTHER INFORMATION</li>


                    <?php $c_information = $db -> query("SELECT * FROM c_experience WHERE u_num='$barcode'");
                   $rowcount=mysqli_num_rows($c_information);

                   if($rowcount > 0){ ?>
                    <li><i class="far fa-check-circle correct"></i> PREVIOUS EMPLOYMENT ABROAD</li>
                    <script>
                    counter_validator += 1;
                    </script>
                    <?php }else{ ?>
                    <li><i class="far fa-times-circle wrong"></i> PREVIOUS EMPLOYMENT ABROAD</li>
                    <?php   } ?>





                    <li><i class="far fa-times-circle wrong h_w_e"></i> HOUSEHOLD WORK EXPERIENCE(S) / LANGUAGE YOU CAN
                        SPEAK OR WRITE</li>




                    <?php $c___educ = $db -> query("SELECT * FROM c_educ WHERE u_num='$barcode'");
                        $rowcount_educ=mysqli_num_rows($c___educ); ?>

                    <?php   if($rowcount_educ > 0){ ?>
                    <li><i class="far fa-check-circle correct"></i> EDUCATIONAL ATTAINMENT</li>
                    <script>
                    counter_validator += 1;
                    </script>
                    <?php  }else{ ?>
                    <li><i class="far fa-times-circle wrong"></i> EDUCATIONAL ATTAINMENT</li>
                    <?php  } ?>







                    <!-- <i class="far fa-times-circle wrong"></i> -->
                </ul>

                <div class="view_application_form" style="display: none;">

                    <a href="/v2/resume_builder/dh_form/resume_preview.php?bcode=<?php echo $barcode?>"
                        class="btn btn-success " target='_blank'>
                        <i class="fa fa-plus my-float123"></i>
                        VIEW RESUME FORM
                    </a>

                    <a href="/v2/resume_builder/dh_form/resume_preview_arabic.php?bcode=<?php echo $barcode?>"
                        class="btn btn-warning " target='_blank'>
                        <i class="fa fa-plus my-float123"></i>
                        VIEW RESUME IN ARABIC
                    </a>

                </div>






            </div>
        </div>

    </div>






    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/v2">EOMSINC</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/v2">Home <span class="sr-only">(current)</span></a>
                </li>


            </ul>

        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Update Applicant</h1>
        </div>
    </div>
    <div class="container">
        <div class="card border-secondary mb-3">
            <div class="card-header">
                <h3>PERSONAL INFORMATION</h3>
            </div>
            <!-- BARCODE -->
            <div class="container">
                <h4 class="float-left mt-4 ml-4 recent_fullname"><?php echo $fullname?></h4>
                <div class="float-right center-block input-group mt-3" style="width: 40%">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-qrcode"></i></span>
                    </div>
                    <input type="hidden" class="hidden_id" value="<?php echo $id?>">
                    <input type="text" class="form-control form-control-lg bcode" placeholder="Barcode" readonly
                        value="<?php echo $bcode?>">
                </div>
            </div>
            <div class="card-body text-secondary">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-signature"></i></span>
                                    </div>
                                    <input readonly type="password" class="form-control surname" placeholder="Surname"
                                        aria-label="Apelyido" aria-describedby="basic-addon1"
                                        value="<?php echo $r_lastname?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-signature"></i></span>
                                    </div>
                                    <input readonly type="password" class="form-control firstname"
                                        placeholder="Firstname" aria-label="Name" aria-describedby="basic-addon1"
                                        value="<?php echo $r_firstname?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-signature"></i></span>
                                    </div>
                                    <input readonly type="password" class="form-control middlename"
                                        placeholder="Middlename" aria-label="middlename" aria-describedby="basic-addon1"
                                        value="<?php echo $r_middlename?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="fas fa-passport"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control passport"
                                                        placeholder="Passport Number" value="<?php echo $pnumber?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">



                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                style="cursor: pointer"
                                                                class="fas fa-ruler convert_height" data-toggle="modal"
                                                                data-target=".height_converter_modal"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control height"
                                                        placeholder="Enter Height" value="<?php echo $height?>"
                                                        readonly>
                                                </div>


                                            </div>
                                            <div class="col-lg-6">


                                                <!-- <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-md"></i></span>
                                       </div>
                                       <input type="text" class="form-control blood_type"  placeholder="Enter Blood Type" value="<?php echo $blood_type ?>">
                                     </div>
                                    </div> -->

                                                <select class="custom-select blood_type mb-3">
                                                    <option value="<?php echo $blood_type ?>" selected>
                                                        <?php echo $blood_type ?></option>
                                                    <option value="A+">A+</option>
                                                    <option value="O+">O+</option>
                                                    <option value="B+">B+</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="O-">O-</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB-">AB-</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                style="cursor:pointer;" class="fas fa-weight"
                                                                data-toggle="modal" data-target="#lbs_modal"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control weight_dh"
                                                        placeholder="Enter Weight" value="<?php echo $weight ?>"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <select class="custom-select country mb-3">
                                                    <option value="<?php echo $pcountry ?>" selected>
                                                        <?php echo  $pcountry ?></option>
                                                    <option value="KSA">KSA</option>
                                                    <option value="QATAR">QATAR</option>
                                                    <option value="SINGAPORE">SINGAPORE</option>
                                                    <option value="UAE">UAE</option>
                                                    <option value="KUWAIT">KUWAIT</option>
                                                    <option value="HONGKONG">HONGKONG</option>
                                                    <option value="MALAYSIA">MALAYSIA</option>
													<option value="JORDAN">JORDAN</option>
														<option value="MONGOLIA">MONGOLIA</option>
															<option value="TAIWAN">TAIWAN</option>
															<option value="OMAN">OMAN</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <select class="custom-select gender mb-3">
                                                    <option value="<?php echo $gender ?>" selected>
                                                        <?php echo  $gender ?></option>
                                                    <option value="MALE">MALE</option>
                                                    <option value="FEMALE">FEMALE</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"> <i
                                                        class="fas fa-money-check-alt"></i> -salary</span>
                                            </div>
                                            <input type="number" class="form-control msalary" value="0">
                                        </div>
                                        <?php 
                                 if($first_or_ex > 0){
                                     $isEx = "checked";
                                     $isFirst = "";
                                 }else{
                                     $isEx = "";
                                     $isFirst = "checked";
                                 }
                                 
                                 
                                 
                                 ?>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>APPLICANT CATEGORY</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input " type="radio" name="rdio"
                                                                id="radio_first" value="0" <?php echo $isFirst?>>
                                                            <label class="form-check-label" for="radio_first">
                                                                <strong>I'M FIRST TIMER</strong>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input " type="radio" name="rdio"
                                                                id="radio_ex" value="1" <?php echo $isEx?>>
                                                            <label class="form-check-label" for="radio_ex">
                                                                <strong>I'M EX-ABROAD</strong>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Previous Agency Name</label>
                                                            <input type="text" class="form-control previous_agency"
                                                                value="<?php echo $ex_agency?>">
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
                                                                <span class="input-group-text"
                                                                    id="inputGroup-sizing-lg"><i
                                                                        class="far fa-flag"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control nationality"
                                                                value="FILIPINO">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-group input-group-default mb-1">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    id="inputGroup-sizing-lg"><i
                                                                        class="fas fa-church"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control religion"
                                                                placeholder="Religion" value="<?php echo $religion?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-group input-group-default mb-1">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text "
                                                                    id="inputGroup-sizing-lg"><i
                                                                        class="fas fa-birthday-cake"></i></span>
                                                            </div>
                                                            <input type="date" class="form-control dob"
                                                                placeholder="Date of Birth"
                                                                value="<?php echo $birthday?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-group input-group-default mb-1">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    id="inputGroup-sizing-lg"><i
                                                                        class="fas fa-location-arrow"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control place_of_birth"
                                                                placeholder="Place of Birth"
                                                                value="<?php echo $place_of_birth?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input type="file" class="dropify whole_body_pic"
                                    
                                    data-height="450" data-recentPhoto="<?php echo $idpic?>"
                                    data-default-file="<?php echo "../upload/".$idpic?>" />
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-warning btn-lg btn-block mt-3 update_first">UPDATE</button>
                </div>
            </div>
        </div>
        <?php
         $findbarcode = $db -> query("SELECT * FROM c_contactinfo WHERE u_num='$barcode'");
         $rowcount=mysqli_num_rows($findbarcode);
         $rows = $findbarcode->fetch_assoc();
          if($rowcount > 0){ ?>
        <div class="card border-secondary">
            <div class="card-header">
                <h3>Other Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <h5>CONTACT INFORMATION</h5>
                                    </th>
                                    <th scope="col">
                                        <h5>DETAILS</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Contact Number:</th>
                                    <td><?php echo $rows['cno1']?> / <?php echo $rows['cno2']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email:</th>
                                    <td><?php echo $rows['email1']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Facebook Username:</th>
                                    <td><?php echo $rows['skype']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Permanent Address:</th>
                                    <td><?php echo $rows['address']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">No. of Children:</th>
                                    <td><?php echo $rows['no_of_children']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Marital Status:</th>
                                    <td><?php echo $rows['marital_status']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <h5>EMERGENCY CONTACT</h5>
                                    </th>
                                    <th scope="col">
                                        <h5>DETAILS</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Contact Person:</th>
                                    <td><?php echo $rows['name']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Relation:</th>
                                    <td><?php echo $rows['crelationship']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Contact Number:</th>
                                    <td><?php echo $rows['cno']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Contact Address:</th>
                                    <td><?php echo $rows['caddress']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <button class="btn btn-warning u_add_____other" data-id="<?php echo $rows['id'] ?>"
                    data-cno1="<?php echo $rows['cno1'] ?>" data-cno2="<?php echo $rows['cno2'] ?>"
                    data-email1="<?php echo $rows['email1'] ?>" data-skype="<?php echo $rows['skype'] ?>"
                    data-address="<?php echo $rows['address'] ?>" data-name="<?php echo $rows['name'] ?>"
                    data-cno="<?php echo $rows['cno'] ?>" data-marital_status="<?php echo $rows['marital_status'] ?>"
                    data-no_of_children="<?php echo $rows['no_of_children'] ?>"
                    data-crelationship="<?php echo $rows['crelationship'] ?>"
                    data-caddress="<?php echo $rows['caddress'] ?>" data-toggle="modal"
                    data-target=".update_other_info_modal">
                    Update Info
                </button>
            </div>
        </div>
        <?php }else{ ?>
        <div class="card border-secondary">
            <div class="card-header">
                <h3>Other Information</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">No Information added yet</h5>
                <button class="btn btn-success add_____other" data-toggle="modal" data-bcode="<?php echo $barcode?>"
                    data-target=".other_info_modal"> Add New</button>
            </div>
        </div>
        <?php   } ?>
        <section>
            <?php
            $findbarcodeExp = $db -> query("SELECT * FROM c_experience WHERE u_num='$barcode'");
            $rowcount=mysqli_num_rows($findbarcodeExp);
            
             if($rowcount > 0){ ?>
            <div class="card border-secondary mt-3">
                <div class="card-header">
                    <h4>PREVIOUS EMPLOYMENT (ABROAD)</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Details of Experience </h5>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Country</th>
                                <th scope="col">Position</th>
                                <th scope="col">Period</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $num = 0;
                        while( $rows = $findbarcodeExp->fetch_assoc()){ 
                        
                        $num++;
                        
                        ?>
                            <tr>
                                <th scope="row"><?php echo $num?></th>
                                <td><?php echo $rows['ccountry'];?></td>
                                <td><?php echo $rows['cposition'];?></td>
                                <td><?php echo $rows['cdate'];?></td>
                                <td>
                                    <button class="btn btn-outline-warning sk_update"
                                        data-id="<?php echo $rows['id']; ?>"
                                        data-ccountry="<?php echo $rows['ccountry']; ?>"
                                        data-cposition="<?php echo $rows['cposition']; ?>"
                                        data-cdate="<?php echo $rows['cdate']; ?>"
                                        data-employer="<?php echo $rows['ccompany']; ?>" data-toggle="modal"
                                        data-target=".u_modal_dh_exp">Update</button>


                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <?php 
                  if($rowcount >= 3){ ?>
                    <?php }else{ ?>
                    <button class="btn btn-success" data-toggle="modal" data-target=".modal_dh_exp">Add New</button>
                    <?php } ?>
                </div>
            </div>
            <?php }else{ ?>
            <div class="card border-secondary mt-3">
                <div class="card-header">
                    <h4>PREVIOUS EMPLOYMENT ABROAD</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">No Details of Experience yet</h5>
                    <button class="btn btn-success" data-toggle="modal" data-target=".modal_dh_exp">Add New</button>
                </div>
            </div>
            <?php }?>
        </section>



        <?php 
                  $findbarcodeskills = $db -> query("SELECT * FROM c_skills WHERE u_num='$barcode'");
                  $rowcount=mysqli_num_rows($findbarcodeskills);
                  $rows = $findbarcodeskills->fetch_assoc();               
                  if($rowcount > 0){      
                     include 'update_skills.php';  ?>
        <?php  }else{ 
                     include 'new_skills.php';   ?>
        <?php } ?>


        <?php    
               $findbarcode = $db -> query("SELECT * FROM c_educ WHERE u_num='$barcode'");
               $rowcount=mysqli_num_rows($findbarcode);
              
               if($rowcount > 0){  
            ?>

        <!-- MERON -->


        <section>
            <div class="card border-dark mt-3">
                <div class="card-header">
                    <h3>Educational Attainment</h3>
                </div>
                <img class="card-img-top">
                <div class="card-body">

                    <div class="row">
                        <?php 
                              while( $rows = $findbarcode->fetch_assoc()){              
                           ?>
                        <div class="col-lg-4">

                            <div class="card">
                                <button class="btn btn-outline-warning update_________educ"
                                    data-id="<?php echo $rows['id']; ?>" data-unum="<?php echo $rows['u_num']; ?>"
                                    data-degree="<?php echo $rows['degree']; ?>"
                                    data-school="<?php echo $rows['school']; ?>"
                                    data-year="<?php echo $rows['year']; ?>" data-toggle="modal"
                                    data-target=".updateEducModal">Update</button>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span>Degree: </span> <?php echo $rows['degree']; ?>
                                    </li>
                                    <li class="list-group-item"><span>School: </span> <?php echo $rows['school']; ?>
                                    </li>
                                    <li class="list-group-item"><span>School_Year: <?php echo $rows['year']; ?></span>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <?php }?>
                    </div>


                    <br>
                    <button class="btn btn-success add______education" data-barccode="<?php echo $barcode?>"
                        data-toggle="modal" data-target=".addEducModal">Add Education</button>

                </div>
            </div>
        </section>



        <?php }else{?>

        <section>
            <div class="card border-dark mt-3">
                <div class="card-header">
                    <h3>Educational Attainment</h3>
                </div>
                <img class="card-img-top">
                <div class="card-body">

                    <button class="btn btn-success add______education" data-barccode="<?php echo $barcode?>"
                        data-toggle="modal" data-target=".addEducModal">Add Education</button>

                </div>
            </div>
        </section>


        <?php }?>




        <!-- REMARKS -->
        <section>

            <div class="card border-dark mt-3 mb-3">

                <div class="card-body">

                    <div class="form-group">
                        <label for="">
                            <h3>Remarks</h3>
                        </label>
                        <input type="hidden" class="barcode_remarks" value="<?php echo $barcode?>">
                        <textarea class="form-control remarks_textarea" rows="4"><?php echo $scomment ?></textarea>
                    </div>
                    <button class="btn btn-success remark_update">Save Remarks</button>
                </div>

            </div>

        </section>



        <!-- 
        <a href="/v2/resume_builder/dh_form/resume_preview.php?bcode=<?php echo $barcode?>" class="float"
            target='_blank'>
            <i class="fa fa-plus my-float"></i>
        </a> -->




        <?php include 'modal.php';?>
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="node_modules/dropify/dist/js/dropify.min.js"></script>
        <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="node_modules/@fortawesome/fontawesome-free/js/all.js"></script>
        <script src="script.js"></script>
        <script>
        var update_barcode = "<?php echo $barcode ; ?>";
        </script>
		
		
		<script>
		
		
		onInactive(60000 * 15 , function() {
			let timerInterval
			Swal.fire({
				title: 'You are now automatically logout',
				html: 'Redirecting....',
				timer: 5000,
				timerProgressBar: true,
				didOpen: () => {
					Swal.showLoading()
					const b = Swal.getHtmlContainer().querySelector('b')
					timerInterval = setInterval(() => {
						b.textContent = Swal.getTimerLeft()
					}, 100)
				},
				willClose: () => {
					clearInterval(timerInterval)
				}
			}).then((result) => {
				/* Read more about handling dismissals below */
				if (result.dismiss === Swal.DismissReason.timer) {
					console.log('I was closed by the timer')
					window.location.replace("v2/../../../logout.php");
				}
			})


			$('.swal2-confirm').on('click', function() {
				window.location.replace("v2/../../../logout.php");
			});
		});
		
		
		

		function onInactive(ms, cb) {

			var wait = setTimeout(cb, ms);

			document.onmousemove = document.mousedown = document.mouseup = document.onkeydown = document.onkeyup = document
				.focus = function() {
					clearTimeout(wait);
					wait = setTimeout(cb, ms);

				};
		}
		
		
		
		
		</script>
		
		
		
</body>

</html>