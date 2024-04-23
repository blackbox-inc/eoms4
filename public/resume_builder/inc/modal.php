<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="row">
      
        <div class="col-lg-6">
          
            <div class="form-group">
                <label for="">ft</label>
                <input type="number" id="feet" class="form-control">
            </div>
        
        </div>
        <div class="col-lg-6">

            <div class="form-group">
                <label for="">inch</label>
                <input type="number" id="inches" class="form-control">
            </div>

        </div>

        
        
      </div>
       
  

      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary" id="btnConvert">Convet</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL FOR EDUCATION -->
<div class="modal fade" id="educModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Educational Attainment....</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <!-- School -->
        <div class="form-group">
            <label for="">School</label>
            <input type="text" class="form-control" id="school">
        </div>


         <!-- Degree -->
         <div class="form-group">
            <label for="">Degree</label>
            <input type="text" class="form-control" id="degree">
        </div>


         <!-- Year -->
         <div class="form-group">
            <label for="">School Year</label>
            <input type="text" class="form-control" id="school_year">
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="educBtnSave">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL FOR EDIT EDUCATION -->
<div class="modal fade" id="editeducModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editing Educational Attainment....</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <input type="hidden" id="editid" >
        
        <!-- School -->
        <div class="form-group">
            <label for="">School</label>
            <input type="text" class="form-control" id="Eschool">
        </div>


         <!-- Degree -->
         <div class="form-group">
            <label for="">Degree</label>
            <input type="text" class="form-control" id="Edegree">
        </div>


         <!-- Year -->
         <div class="form-group">
            <label for="">School Year</label>
            <input type="text" class="form-control" id="Eschool_year">
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="educBtnUpdate">Update</button>
      </div>
    </div>
  </div>
</div>













<!-- MODAL FOR EXPERIENCE -->
<div class="modal fade bd-example-modal-lg" id="expModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Working Experience....</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
          <div class="col-lg-6">
             <!-- Position -->
            <div class="form-group">
                <label for="">Position</label>
                <input type="text" class="form-control" id="cposition">
            </div>

          </div>
          <div class="col-lg-6">
            <!-- ccompany -->
            <div class="form-group">
              <label for="">Company Name</label>
              <input type="text" class="form-control" id="ccompany">
            </div>

          </div>
       </div>
          
            
            <!-- cdate -->
            <div class="form-group">
              <label for="">Inclusive Date</label>
              <input type="text" class="form-control" id="cdate">
            </div>

            <!-- cdesc -->
            <div class="form-group">
              <label for="">Job Description</label>
              <textarea class="form-control" name="" id="editor102" ></textarea>
            </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary expBtnSave">Save</button>
      </div>
    </div>
  </div>
</div>



<!-- MODAL FOR EXPERIENCE FOR EDIT -->
<div class="modal fade bd-example-modal-lg" id="expEditModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editing Working Experience....</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
          <div class="col-lg-6">
            <input type="hidden" id="expEditid">
             <!-- Position -->
            <div class="form-group">
                <label for="">Position</label>
                <input type="text" class="form-control" id="Editcposition">
            </div>

          </div>
          <div class="col-lg-6">
            <!-- ccompany -->
            <div class="form-group">
              <label for="">Company Name</label>
              <input type="text" class="form-control" id="Editccompany">
            </div>

          </div>
       </div>
          
            
            <!-- cdate -->
            <div class="form-group">
              <label for="">Inclusive Date</label>
              <input type="text" class="form-control" id="Editcdate">
            </div>

            <!-- cdesc -->
            <div class="form-group">
              <label for="">Job Description</label>
              <textarea class="form-control" name="" id="Editeditor102" ></textarea>
            </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary expBtnupdate">Update</button>
      </div>
    </div>
  </div>
</div>