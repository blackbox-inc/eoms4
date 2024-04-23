
<?php


$skillId = $_GET['bcode'];

 $washing = $rows['washing'];
 $cleaning =  $rows['cleaning'];
 $ironing =  $rows['ironing'];
 $sewing = $rows['sewing'];
 $cooking = $rows['cooking'];
 $baby_care = $rows['baby_care'];



if($washing == 1){
   $wash = "checked";
}else{
   $wash = "";
}

if($cleaning == 1){
   $clean = "checked";
}else{
   $clean = "";
}

if($ironing == 1){
   $iron = "checked";
}else{
   $iron = "";
}

if($sewing == 1){
   $sew = "checked";
}else{
   $sew = "";
}

if($cooking == 1){
   $cook = "checked";
}else{
   $cook = "";
}

if($baby_care == 1){
   $baby = "checked";
}else{
   $baby = "";
}





 $english = $rows['english'];
 $arabic = $rows['arabic'];
 $mandarin = $rows['mandarin'];


if($english==1){
   $English_flexRadioDefault1 = "checked";
   $English_flexRadioDefault2 = "";
   $English_flexRadioDefault3 = "";
}else if($english == 2){
   $English_flexRadioDefault2 = "checked";
   $English_flexRadioDefault1 = "";
   $English_flexRadioDefault3 = "";

}else if($english == 3){
   $English_flexRadioDefault3 = "checked";
   $English_flexRadioDefault1 = "";
   $English_flexRadioDefault2 = "";
}else{

   $English_flexRadioDefault1  = "";
   $English_flexRadioDefault2 = "";
   $English_flexRadioDefault3 = "";

}



if($arabic==1){
   $arabic_flexRadioDefault1 = "checked";
   $arabic_flexRadioDefault2 = "";
   $arabic_flexRadioDefault3 = "";
}else if($arabic == 2){
   $arabic_flexRadioDefault2 = "checked";
   $arabic_flexRadioDefault1 = "";
   $arabic_flexRadioDefault3 = "";

}else if($arabic == 3){
   $arabic_flexRadioDefault3 = "checked";
   $arabic_flexRadioDefault1 = "";
   $arabic_flexRadioDefault2 = "";
}else{

   $arabic_flexRadioDefault1  = "";
   $arabic_flexRadioDefault2 = "";
   $arabic_flexRadioDefault3 = "";

}


if($mandarin==1){
   $mandarin_flexRadioDefault1 = "checked";
   $mandarin_flexRadioDefault2 = "";
   $mandarin_flexRadioDefault3 = "";
}else if($mandarin == 2){
   $mandarin_flexRadioDefault2 = "checked";
   $mandarin_flexRadioDefault1 = "";
   $mandarin_flexRadioDefault3 = "";

}else if($mandarin == 3){
   $mandarin_flexRadioDefault3 = "checked";
   $mandarin_flexRadioDefault1 = "";
   $mandarin_flexRadioDefault2 = "";
}else{

   $mandarin_flexRadioDefault1  = "";
   $mandarin_flexRadioDefault2 = "";
   $mandarin_flexRadioDefault3 = "";

}











?>

<section>
         <div class="card border-secondary mt-3">
            <input type="hidden" class="skillId" value="<?php echo $skillId?>">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-6">
                     <section>
                        <div class="card  mb-3">
                           <div class="card-header text-center">
                              <h5>HOUSEHOLD WORK EXPERIENCE(S)</h5>
                           </div>
                           <div class="card-body text-dark">
                              <div class="row">
                                 <div class=" col-md-4">
                                    <div class="form-group">
                                       <div class="form-check">
                                          <input class="form-check-input washing" type="checkbox" id="u_c_washing" <?php echo $wash?> >
                                          <label class="form-check-label" for="u_c_washing">
                                             <h6>WASHING</h6>
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class=" col-md-4">
                                    <div class="form-group">
                                       <div class="form-check">
                                          <input class="form-check-input sewing" type="checkbox" id="u_c_sewing" <?php echo $sew?> >
                                          <label class="form-check-label" for="u_c_sewing">
                                             <h6>SEWING</h6>
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class=" col-md-4">
                                    <div class="form-group">
                                       <div class="form-check">
                                          <input class="form-check-input cleaning" type="checkbox" id="u_c_cleaning" <?php echo $clean?> >
                                          <label class="form-check-label" for="u_c_cleaning">
                                             <h6>CLEANING</h6>
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class=" col-md-4">
                                    <div class="form-group">
                                       <div class="form-check">
                                          <input class="form-check-input cooking" type="checkbox" id="u_c_cooking" <?php echo $cook?> >
                                          <label class="form-check-label" for="u_c_cooking">
                                             <h6>COOKING</h6>
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class=" col-md-4">
                                    <div class="form-group">
                                       <div class="form-check">
                                          <input class="form-check-input ironing" type="checkbox" id="u_c_ironing" <?php echo $iron?> >
                                          <label class="form-check-label " for="u_c_ironing">
                                             <h6>IRONING</h6>
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class=" col-md-4">
                                    <div class="form-group">
                                       <div class="form-check">
                                          <input class="form-check-input babycare" type="checkbox" id="u_c_babycare" <?php echo $baby?> >
                                          <label class="form-check-label" for="u_c_babycare">
                                             <h6>BABYCARE</h6>
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <button class="btn btn-warning btn-block btn-lg update_skills">UPDATE</button>
                     </section>
                  </div>
                  <div class="col-lg-6">
                     <section>
                        <div class="card">
                           <div class="card-header text-center">
                              <h5>LANGUAGE YOU CAN SPEAK OR WRITE</h5>
                           </div>
                           <div class="card-body">
                              <table class="table table-bordered">
                                 <thead>
                                    <!-- <tr>
                                       <th scope="col">#</th>
                                       <th colspan="3" scope="col"></th>
                                    </tr> -->
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <th scope="row">English</th>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="English_flexRadioDefault" id="u_English_flexRadioDefault1"  <?php echo $English_flexRadioDefault1?>>
                                             <label class="form-check-label" for="u_English_flexRadioDefault1">
                                             Fluent
                                             </label>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="English_flexRadioDefault" id="u_English_flexRadioDefault2"  <?php echo $English_flexRadioDefault2?>>
                                             <label class="form-check-label" for="u_English_flexRadioDefault2">
                                             Fair
                                             </label>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="English_flexRadioDefault" id="u_English_flexRadioDefault3" <?php echo $English_flexRadioDefault3?>>
                                             <label class="form-check-label" for="u_English_flexRadioDefault3">
                                             Poor
                                             </label>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <th scope="row">Arabic</th>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="arabic_flexRadioDefault" id="u_arabic_flexRadioDefault1" <?php echo $arabic_flexRadioDefault1?>>
                                             <label class="form-check-label" for="u_arabic_flexRadioDefault1">
                                             Fluent
                                             </label>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="arabic_flexRadioDefault" id="u_arabic_flexRadioDefault2" <?php echo $arabic_flexRadioDefault2?>>
                                             <label class="form-check-label" for="u_arabic_flexRadioDefault2">
                                             Fair
                                             </label>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="arabic_flexRadioDefault" id="u_arabic_flexRadioDefault3" <?php echo $arabic_flexRadioDefault3?>>
                                             <label class="form-check-label" for="u_arabic_flexRadioDefault3">
                                             Poor
                                             </label>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <th scope="row">Mandarin</th>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="mandarin_flexRadioDefault" id="u_mandarin_flexRadioDefault1"  <?php echo $mandarin_flexRadioDefault1 ?> >
                                             <label class="form-check-label" for="u_mandarin_flexRadioDefault1">
                                             Fluent
                                             </label>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="mandarin_flexRadioDefault" id="u_mandarin_flexRadioDefault2" <?php echo $mandarin_flexRadioDefault2 ?>>
                                             <label class="form-check-label" for="u_mandarin_flexRadioDefault2">
                                             Fair
                                             </label>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="mandarin_flexRadioDefault" id="u_mandarin_flexRadioDefault3" <?php echo $mandarin_flexRadioDefault3 ?>>
                                             <label class="form-check-label" for="u_mandarin_flexRadioDefault3">
                                             Poor
                                             </label>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </section>
                  </div>
               </div>
            </div>
         </div>
      </section>