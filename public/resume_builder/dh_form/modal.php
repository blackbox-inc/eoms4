
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Adding Working Experience....
</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">POSITION</span>
            </div>
            <input type="text" class="form-control prev_position" placeholder="Example. Dometic Helper" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">COUNTRY</span>
            </div>
            <input type="text" class="form-control prev_country" placeholder="Example. KUWAIT" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        
       <div class="row">
        <div class="col-lg-6">
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">From:</span>
              </div>
              <input type="date" class="form-control frm_date" placeholder="Example. August 16, 2000 to January 27, 2003" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>


        <div class="col-lg-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">To:</span>
            </div>
            <input type="date" class="form-control to_date" placeholder="Example. August 16, 2000 to January 27, 2003" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        
        </div>
       
       </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary exp_save">SAVE</button>
      </div>
    </div>
  </div>
</div>






<!-- Modal Adding other info -->

<div class="modal fade other_info_modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Other Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card border-secondary">
         <div class="card-header">
            <h3>Other Information (c_contactinfo)</h3>
         </div>
         <div class="card-body">
           
            <div class="row">
               
               <div class="col-lg-4">
                  <div class="form-group">
                     <label for="">Marital Status</label>
                     <input type="text"
                        class="form-control marital_status" placeholder="Enter Marital Status">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label for="">Number of Childer</label>
                     <input type="number"
                        class="form-control no_children" value="0">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label for="">Contact Number Primary</label>
                     <input type="text"
                        class="form-control cno1" placeholder="Enter Contact Number">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label for="">Contact Number Secondary</label>
                     <input type="text"
                        class="form-control cno2" placeholder="Enter Contact Secondary">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label for="">Email Address (Optional)</label>
                     <input type="text"
                        class="form-control email1" placeholder="Enter Email">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label for="">Facebook Account</label>
                     <input type="text"
                        class="form-control skype" placeholder="Enter facebook account">
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="">Address</label>
               <input type="text"
                  class="form-control address" placeholder="Enter Permanent Address">
            </div>
            <div class="row">
               <div class="col-lg-6">
                  <div class="form-group">
                     <label for="">Contact Person Name</label>
                     <input type="text"
                        class="form-control contact_name" placeholder="Enter Contact Name">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <label for="">Relation</label>
                     <input type="text"
                        class="form-control c_relation" placeholder="Enter relationship">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <label for="">Contact Person No.</label>
                     <input type="text"
                        class="form-control contact_no" placeholder="Enter Contact Person No">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <label for="">Contact Address</label>
                     <input type="text"
                        class="form-control c_address" placeholder="Enter Contact Address">
                  </div>
               </div>
            </div>
           
         </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save_other_info">Save</button>
      </div>
    </div>
  </div>
</div>





<!-- Modal Updating other info -->

<div class="modal fade update_other_info_modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Other Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card border-secondary">
         <div class="card-header">
            <h3>Other Information update(c_contactinfo)</h3>
         </div>
         <div class="card-body">
         <input type="text" class="id_other">
            <div class="row">
               <div class="col-lg-4">
                  <div class="form-group">
                     <label for="">Marital Status</label>
                     <input type="text"
                        class="form-control u_marital_status" placeholder="Enter Marital Status">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label for="">Number of Childer</label>
                     <input type="number"
                        class="form-control u_no_children" value="0">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label for="">Contact Number Primary</label>
                     <input type="text"
                        class="form-control u_cno1" placeholder="Enter Contact Number">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label for="">Contact Number Secondary</label>
                     <input type="text"
                        class="form-control u_cno2" placeholder="Enter Contact Secondary">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label for="">Email Address (Optional)</label>
                     <input type="text"
                        class="form-control u_email1" placeholder="Enter Email">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label for="">Facebook Account</label>
                     <input type="text"
                        class="form-control u_skype" placeholder="Enter facebook account">
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="">Address</label>
               <input type="text"
                  class="form-control u___address" placeholder="Enter Permanent Address">
            </div>
            <div class="row">
               <div class="col-lg-6">
                  <div class="form-group">
                     <label for="">Contact Person Name</label>
                     <input type="text"
                        class="form-control u_contact_name" placeholder="Enter Contact Name">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <label for="">Relation</label>
                     <input type="text"
                        class="form-control u_c_relation" placeholder="Enter relationship">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <label for="">Contact Person No.</label>
                     <input type="text"
                        class="form-control u_contact_no" placeholder="Enter Contact Person No">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <label for="">Contact Address</label>
                     <input type="text"
                        class="form-control u_c_address" placeholder="Enter Contact Address">
                  </div>
               </div>
            </div>
           
         </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_other_info">Save</button>
      </div>
    </div>
  </div>
</div>




<!-- MODAL FOR DH EXP IN OTHER EXPERIENCE -->
<div class="modal fade modal_dh_exp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding previous work abroad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="row">
      
         <div class="col-lg-6">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control ccountry" placeholder="Enter Country">
         </div>
         </div>

         <div class="col-lg-6">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control cposition" placeholder="Enter Position">
         </div>
         </div>

         <div class="col-lg-6">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control cdate" placeholder="Enter Period">
         </div>
         </div>

         <div class="col-lg-6">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control ccompany" placeholder="Employer Name (Optional)">
         </div>
         </div>
      
      </div>
        
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save_exp_dh">Save</button>
      </div>
    </div>
  </div>
</div>







<!-- UPDATE EXPERIENCE -->
<div class="modal fade u_modal_dh_exp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Updating previous work abroad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="text" class="update_id">
      <div class="row">

     
      
         <div class="col-lg-6">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">@</span>
            </div>

            <input type="text" class="form-control u_ccountry" placeholder="Enter Country">
         </div>
         </div>

         <div class="col-lg-6">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control u_cposition" placeholder="Enter Position">
         </div>
         </div>

         <div class="col-lg-6">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control u_cdate" placeholder="Enter Period">
         </div>
         </div>

         <div class="col-lg-6">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control u_ccompany" placeholder="Employer Name (Optional)">
         </div>
         </div>
      
      </div>
        
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_exp_dh">Save</button>
      </div>
    </div>
  </div>
</div>






<!-- HEIGHT CONVERTER -->

<div class="modal fade height_converter_modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Feet to Centimeter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="">Ft</label>
          <input type="number"
            class="form-control" placeholder="Feet" id="feet" >
        </div>

        <div class="form-group">
          <label for="">Inch.</label>
          <input type="number"
            class="form-control" placeholder="Inch" id="inches">
        </div>


      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary" id="btnConvert">Convert</button>
      </div>
    </div>
  </div>
</div>





<!-- MODAL OF KGS to LBS -->
<div class="modal fade" id="lbs_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">KGS to LBS CONVERTER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="">Kilogram</label>
          <input type="number" class="form-control kgs_input"  placeholder="Enter Kilograms">
        </div>

      </div>
      <div class="modal-footer">  
        <button type="button" class="btn btn-primary convert_kgs">Convert</button>
      </div>
    </div>
  </div>
</div>




<!-- Adding Education Attainment  -->
<div class="modal fade addEducModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Education Attainment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <div class="form-group"> 
            <input type="text"
            class="form-control u_num"  readonly>
         </div>
         
         <div class="form-group"> 
            <input type="text"
            class="form-control degree"  placeholder="Enter Degree">
         </div>

         <div class="form-group"> 
            <input type="text"
            class="form-control school"  placeholder="Enter Name of School">
         </div>

         <div class="form-group"> 
            <input type="text"
            class="form-control year"  placeholder="Enter year graduated">
         </div>
      
      
      </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary educ_Save">Save changes</button>
      </div>
    </div>
  </div>
</div>





<!-- Updating Education Attainment  -->
<div class="modal fade updateEducModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Updating Education Attainment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <div class="form-group"> 
            <input type="hidden"
            class="form-control id_update_educ">
         </div>

         <div class="form-group"> 
            <input type="text"
            class="form-control update_u_num"  readonly>
         </div>
         
         <div class="form-group"> 
            <input type="text"
            class="form-control update_degree"  placeholder="Enter Degree">
         </div>

         <div class="form-group"> 
            <input type="text"
            class="form-control update_school"  placeholder="Enter Name of School">
         </div>

         <div class="form-group"> 
            <input type="text"
            class="form-control update_year"  placeholder="Enter year graduated">
         </div>
      
      
      </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update__educ">Save changes</button>
      </div>
    </div>
  </div>
</div>








<!-- Small modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      ...
    </div>
  </div>
</div> -->