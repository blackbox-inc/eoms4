
<a target="_blank" href="/v2/resume_builder/resume-cv/resume-app.php?bcode=<?php echo $_GET['barcode']?>" class="float renderResume">
   	<i class="far fa-eye my-float"></i>
</a>
 
<section>
 

   <div class="card" style="margin: 0 auto;">

  
      <h5 class="card-header"><i class="fas fa-info-circle dIcon"></i>
         Candidates Information 
				 
		  <a class="btn btn-success btn-sm" href="/v2/resume_builder/">CREATE NEW</a>
      </h5>
      <div class="card-body">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-6">
                     <label for="">Barcode Category</label>
                     <select class="custom-select" id="barcode" >
                        <option selected>Open this select menu</option>
                        <option value="WALK IN">WALK IN</option>
                        <option value="ONLINE">ONLINE</option>
                     </select>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="">Barcode</label>
                        <input type="text" id="bcode" class="form-control" value="<?php echo $mainBarcode?>"readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-4">
                     <label for="">Lastname</label>
                     <input type="text" id="dlastname" class="form-control" onkeyup="this.value = this.value.toUpperCase();">
                  </div>
                  <div class="col-lg-4">
                     <label for="">Firstname</label>
                     <input type="text" id="dfirstname" class="form-control" onkeyup="this.value = this.value.toUpperCase();">
                  </div>
                  <div class="col-lg-4">
                     <label for="">Middlename</label>
                     <input type="text" id="dmiddlename" class="form-control" onkeyup="this.value = this.value.toUpperCase();">
                  </div>
               </div>
               <br>
               <?php
               
               $getInfo = $db->query("SELECT * FROM c_information WHERE bcode='$mainBarcode'");
               if($getInfo->num_rows != 0){
                    $rows = $getInfo->fetch_assoc();
                    $fullname = $rows['fullname'];
                    $pnumber = $rows['pnumber'];
                    $gender = $rows['gender'];
                    $birthdate = $rows['birthday'];
                    $height = $rows['height'];
                    $class = $rows['class'];
                    $objective = $rows['objectives'];
                    $idpic = $rows['idpic'];
                  //   $sitepath = "https://pbs.twimg.com/profile_images/749050206587539456/OXVq-SWd.jpg";
                  //   $sitepath = 'http://eomsinc.com/EOMS Queue/img/'. $rows['idpic'];
                    $sitepath = 'upload/'. $rows['idpic'];

               }
               ?>
               <h1 class="text-center" id="dfullname"><?php echo $fullname?></h1>
               <div class="card">
                  <div class="card-body">
                           
                     <div class="row">
                        <div class="col-lg-4">
                           <label for="">Passport</label>
                           <input type="text" id="pnumber"  value="<?php echo $pnumber?>" class="form-control">
                        </div>
                        <div class="col-lg-4">
                           <label for="">Gender</label>
                           <select class="custom-select" id="gender">
                              <option value="<?php echo $gender ?>" selected><?php echo $gender ?></option>
                              <option value="His">His</option>
                              <option value="Her">Her</option>
                           </select>
                        </div>
                        <div class="col-lg-4">
                           <label for="">Birthdate</label>
                           <input type="date" id="birthday" value="<?php echo $birthdate?>" class="form-control">
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-lg-6">
                           <label for="">Height(cm)</label>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" value="<?php echo $height?>" id="height" >
                              <div class="input-group-append">
                                 <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal" type="button" id="button-addon2">Convert</button>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <label for="">Class</label>
                           <select class="custom-select" id="class">
                              <option value="<?php echo $class?>" selected><?php echo $class?></option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="D">D</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <br>
               <div class="form-group">
                  <label for="">Career Objectives</label>
                  <textarea name="editor1" id="editor101" class="form-control" cols="20" rows="5"><?php echo $objective?></textarea>
               </div>
               <br>
                  <input type="hidden" id="default_image" value="<?php echo $idpic?>">

               <?php

                 
                  $imgz = $rows['idpic'];
                  $file_pointer = $_SERVER['DOCUMENT_ROOT'] . '/v2/resume_builder/upload/'.$imgz;

                  if (file_exists($file_pointer)) {
                     $imgpath = '/v2/resume_builder/upload/'.$imgz;
          
                  }else {
                     $imgpath = 'https://eomsinc.com/EOMS%20Queue/img/'.$imgz;    
                  }
					?>

                  <input type="file"  id="sortpicture" data-default-file="<?php echo $imgpath ?>" class="dropify" data-allowed-file-extensions="jpg jpeg png  JPG PNbmpG" />
            
            </div>
         </div>
         <!-- CONTACT INFO --><br><br>
         <?php 

            $getContactInfo = $db->query("SELECT * FROM c_contactinfo WHERE u_num='$mainBarcode'");
            if($getContactInfo->num_rows != 0){
                $rows = $getContactInfo->fetch_assoc();

                $address = $rows['address'];
                $cno1 = $rows['cno1'];
                $cno2 = $rows['cno2'];

                $email1 = $rows['email1'];
                $email2 = $rows['email2'];

                $skype = $rows['skype'];
                $name = $rows['name'];
                $cno = $rows['cno'];
               
            }
         
         ?>
         <div class="card">
            <h5 class="card-header"><i class="fas fa-id-card dIcon"></i>
               Contact Information
            </h5>
            <div class="card-body">
                     <label for="">Address</label>
                     <input type="text" id="address" value="<?php echo $address?>" class="form-control">
                     <br>
               <div class="row">
                  <div class="col-lg-6">
                     <!-- CNO1 -->
                     <div class="form-group">
                        <label for="">Contact Number (Primary)</label>
                        <input type="number" value="<?php echo $cno1?>" class="form-control" id="cno1">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- CNO2 -->
                     <div class="form-group">
                        <label for="">Contact Number (Secondary)</label>
                        <input type="number" value="<?php echo  $cno2?>" class="form-control" id="cno2">
                     </div>
                  </div>
               </div>
               <!--END ROW -->
               <div class="row">
                  <div class="col-lg-6">
                     <!-- EMAIL1 -->
                     <div class="form-group">
                        <label for="">Email (Primary)</label>
                        <input type="email" value="<?php echo $email1 ?>" class="form-control" id="email1">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- EMAIL2 -->
                     <div class="form-group">
                        <label for="">Email (Secondary)</label>
                        <input type="email" value="<?php echo $email2 ?>" class="form-control" id="email2">
                     </div>
                  </div>
               </div>
               <!--END ROW -->
               <div class="row">
                  <div class="col-lg-4">
                     <!-- Skype -->
                     <div class="form-group">
                        <label for="">Facebook</label>
                        <input type="text" value="<?php echo $skype ?>" class="form-control" id="skype">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <!-- Contact Person -->
                     <div class="form-group">
                        <label for="">Contact Person</label>
                        <input type="text" value="<?php echo $name ?>" class="form-control" id="contact_person">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <!-- Contact Number -->
                     <div class="form-group">
                        <label for="">Contact Number</label>
                        <input type="text" value="<?php echo $cno ?>" class="form-control" id="contact_number1">
                     </div>
                  </div>
               </div>
               <!--END ROW -->
            </div>
            <!--END  CARD BODY -->
         </div>
         <br><br>

                <?php 

                $c_category = $db->query("SELECT * FROM c_category WHERE u_num='$mainBarcode'");
                if($c_category->num_rows != 0){
                    $rows = $c_category->fetch_assoc();

                    $cat2 = $rows['cat2'];
                    $cat3 = $rows['cat3'];
                    $cat4 = $rows['cat4'];

            

                }

                ?>



         <div class="card">
            <h5 class="card-header"><i class="fas fa-suitcase dIcon"></i>
               Positions Applied 
            </h5>
            <div class="card-body">
            <div class="row">
               <div class="col-lg-4">
                  <!-- Position 1 -->
                  <div class="form-group">
                     <label for="">Position 1</label>
                     <input type="text" class="form-control" value="<?php echo $cat2?>" id="cat2">
                  </div>    
               </div>
               <div class="col-lg-4">
                  <!-- Position 2 -->
                  <div class="form-group">
                     <label for="">Position 2</label>
                     <input type="text" class="form-control" value="<?php echo $cat3?>" id="cat3">
                  </div>
               </div>
               <div class="col-lg-4">
                  <!-- Position 3 -->
                  <div class="form-group">
                     <label for="">Position 3</label>
                     <input type="text" class="form-control" value="<?php echo $cat4?>" id="cat4">
                  </div>
               </div>
            </div>
         
            </div>
         </div><br><br>
         <button class="btn btn-success btn-lg btn-block mt-2 UpdateInfobtn" >Update</button>
      </div>
      <!--END CARD BODY -->
</section><br><br>

<section>
   <div class="card">
      <h5 class="card-header">Education Attainment</h5>
      <div class="card-body">
         <button class="btn btn-success btnl-lg mb-2" data-toggle="modal" data-target="#educModal">Add Education +</button>
         <table class="table table-hover">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Degree</th>
                  <th scope="col">School</th>
                  <th scope="col">Year</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody  id="educBody">

            <?php 
            
            $c_educ = $db->query("SELECT * FROM c_educ WHERE u_num='$mainBarcode'");
            if($c_educ->num_rows != 0){
                while($rows = $c_educ->fetch_assoc()){
                $id = $rows['id'];
                $degree = $rows['degree'];
                $school = $rows['school'];
                $year = $rows['year'];
            ?>

                <tr>
                  <th scope="row">1</th>
                  <td><?php echo $school?></td>
                  <td><?php echo $degree?></td>
                  <td><?php echo $year?></td>
                  <td>
                     <button class="btn btn-danger educDeleteBtn" data-delete="<?php echo $id?>">DEL</button>
                     <button class="btn btn-info educEditBtn" data-toggle="modal" data-target="#editeducModal"  data-year="<?php echo $year?>" data-degree="<?php echo $degree?>" data-school="<?php echo $school?>" data-id="<?php echo $id?>">EDIT</button>
                  </td>
               </tr>
               
            <?php } } ?>
               
            </tbody>
         </table>
      </div>
   </div> 
</section><br><br>
 
<section>
   <div class="card">
      <h5 class="card-header">Work Experience</h5>
      <div class="card-body">
         <button class="btn btn-success  mb-2" data-toggle="modal" data-target="#expModal">Add Experience +</button>
         <?php $getExp = $db->query("SELECT * FROM c_experience WHERE u_num='$mainBarcode'");
            if($getExp->num_rows != 0){
               while($rows = $getExp->fetch_assoc()){?>

               <div class="card  mb-2">
                  <div class="card-body">
                     <h5 class="card-title expTitle" data-toggle="collapse" data-target="#demo<?php echo $rows['id']?>"><?php echo $rows['cposition']."."?></h5>

                     <div id="demo<?php echo $rows['id']?>" class="collapse">
                        <h5><span class="expCompany">Company Name: </span>  <?php echo $rows['ccompany']?></h5>
                        <h5><span class="expDate">Inclusive Date: </span> <?php echo $rows['cdate']?></h5>
                        <h5><span class="expjDescription">Job Description: </span></h6>
                        <p><?php echo $rows['cdesc']?></p>
                        <hr>
                        <button data-id="<?php echo $rows['id']?>"class="btn btn-info expeditbtn" data-toggle="modal" data-target="#expEditModal">Edit</button>
                        <button data-id="<?php echo $rows['id']?>"  class="btn btn-danger expDelete">Delete</button>
                     
                     
                     </div>
                    
                  </div>
               </div>

           <?php    }
            }
         ?>
        

      </div>
   </div>
</section><br><br>

<section>
   <div class="card">
      <h5 class="card-header">Skills</h5>
      <div class="card-body">
        <?php 
        
        $skill = $db->query("SELECT * FROM c_skills WHERE u_num='$mainBarcode' ");
       

         if($skill->num_rows != 0){
            $rows = $skill->fetch_assoc();

            echo '<textarea name="editorskill" id="editorskill101" class="form-control" cols="20" rows="5">'.$rows['sdesc'].'</textarea>
            
            <button class="btn btn-success btn-block mt-3 btnSkillsUpdate">UPDATE</button>
            
            ';
            
         }else{

            echo '<textarea name="editorskill" id="editorskill101" class="form-control" cols="20" rows="5"></textarea>
            
            <button class="btn btn-success btn-block mt-3 skillbtnSave">SAVE</button>
            
            ';

         }
        ?>
         

         
      </div>
   </div>
</section><br><br>

<section>
   <div class="card">
      <h5 class="card-header">Trainings and Seminar</h5>
      <div class="card-body">


      <div class="card-body">
        <?php 
        
        $skill = $db->query("SELECT * FROM c_st WHERE u_num='$mainBarcode' ");
       

         if($skill->num_rows != 0){
            $rows = $skill->fetch_assoc();

            echo '<textarea name="seminarANDtraining" id="seminarANDtraining" class="form-control" cols="20" rows="5">'.$rows['st_desc'].'</textarea>
            
            <button class="btn btn-success btn-block mt-3 seminarbtnUpdate">UPDATE</button>
            
            ';
            
         }else{

            echo '<textarea name="seminarANDtraining" id="seminarANDtraining" class="form-control" cols="20" rows="5"></textarea>
            
            <button class="btn btn-success btn-block mt-3 seminarbtnSave">SAVE</button>
            
            ';

         }
        ?>

      </div>
   </div>
</section>