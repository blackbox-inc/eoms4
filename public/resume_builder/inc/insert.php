<a href="#" class="float saveInfobtn">
    <i class="fas fa-save my-float"></i>
</a>
 

<section>
   <div class="card" style="margin: 0 auto;">
   
      <h5 class="card-header"><i class="fas fa-info-circle dIcon"></i>
         Candidates Information
      </h5>
      <div class="card-body">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-6">
                     <label for="">Barcode Category</label>
                     <select class="custom-select" id="barcode" >
                        <option selected>Open this select menu</option>
                        <option value="WALK IN">CREATE NEW</option>
                        <option value="ONLINE">ONLINE</option>
                     </select>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="">Barcode</label>
                        <input type="text" id="bcode" class="form-control" readonly>
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
               <h1 class="text-center" id="dfullname">JAYSON F SAMSON</h1>
			    <h6 style="color: red; text-align: center;" class="duptext"></h6>
               <div class="card">
                  <div class="card-body">
                           
                     <div class="row">
                        <div class="col-lg-4">
                           <label for="">Passport</label>
                           <input type="text" id="pnumber" class="form-control">
                        </div>
                        <div class="col-lg-4">
                           <label for="">Gender</label>
                           <select class="custom-select" id="gender">
                              <option value="" selected>Open this select menu</option>
                              <option value="His">HIS</option>
                              <option value="Her">HER</option>
                           </select>
                        </div>
                        <div class="col-lg-4">
                           <label for="">Birthdate</label>
                           <input type="date" id="birthday" class="form-control">
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-lg-6">
                           <label for="">Height(cm)</label>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" id="height" >
                              <div class="input-group-append">
                                 <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal" type="button" id="button-addon2">Convert</button>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <label for="">Class</label>
                           <select class="custom-select" id="class">
                              <option value="" selected>Open this select menu</option>
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
                  <textarea name="editor1" id="editor101" class="form-control" cols="20" rows="5"></textarea>
               </div>
               <br>

               
                  <input type="file"  id="sortpicture" class="dropify" data-allowed-file-extensions="jpg jpeg png bmp JPG PNG" />
            
            </div>
         </div>
         <!-- CONTACT INFO --><br><br>
         <div class="card">
            <h5 class="card-header"><i class="fas fa-id-card dIcon"></i>
               Contact Information
            </h5>
            <div class="card-body">
                     <label for="">Address</label>
                     <input type="text" id="address" class="form-control">
                     <br>
               <div class="row">
                  <div class="col-lg-6">
                     <!-- CNO1 -->
                     <div class="form-group">
                        <label for="">Contact Number (Primary)</label>
                        <input type="number" class="form-control" id="cno1">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- CNO2 -->
                     <div class="form-group">
                        <label for="">Contact Number (Secondary)</label>
                        <input type="number" class="form-control" id="cno2">
                     </div>
                  </div>
               </div>
               <!--END ROW -->
               <div class="row">
                  <div class="col-lg-6">
                     <!-- EMAIL1 -->
                     <div class="form-group">
                        <label for="">Email (Primary)</label>
                        <input type="email" class="form-control" id="email1">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- EMAIL2 -->
                     <div class="form-group">
                        <label for="">Email (Secondary)</label>
                        <input type="email" class="form-control" id="email2">
                     </div>
                  </div>
               </div>
               <!--END ROW -->
               <div class="row">
                  <div class="col-lg-4">
                     <!-- Skype -->
                     <div class="form-group">
                        <label for="">Facebook</label>
                        <input type="text" class="form-control" id="skype">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <!-- Contact Person -->
                     <div class="form-group">
                        <label for="">Contact Person</label>
                        <input type="text" class="form-control" id="contact_person">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <!-- Contact Number -->
                     <div class="form-group">
                        <label for="">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number1">
                     </div>
                  </div>
               </div>
               <!--END ROW -->
            </div>
            <!--END  CARD BODY -->
         </div>
         <br><br>
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
                     <input type="text" class="form-control" id="cat2">
                  </div>    
               </div>
               <div class="col-lg-4">
                  <!-- Position 2 -->
                  <div class="form-group">
                     <label for="">Position 2</label>
                     <input type="text" class="form-control" id="cat3">
                  </div>
               </div>
               <div class="col-lg-4">
                  <!-- Position 3 -->
                  <div class="form-group">
                     <label for="">Position 3</label>
                     <input type="text" class="form-control" id="cat4">
                  </div>
               </div>
            </div>
         
            </div>
         </div>
         <button class="btn btn-success btn-lg  mt-2 saveInfobtn" >SAVE</button>
      </div>
      <!--END CARD BODY -->
</section><br><br>

<div class="card w-200" id="suggestion" style="display: none;">
      <div class="card-body" >
        <h5 class="card-title" style="background: red; color:white; padding: 10px; border-radius: 5px" >WARNING!!! Existing names available in database</h5>
         <ul class="list-group list-group-flush suggestlist">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
         </ul>
      </div>
    </div>

