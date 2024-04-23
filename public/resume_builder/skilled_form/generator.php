<?php include 'header.php';



 

function NextBarcodH($Code){
   
    include 'connect.php';
    $today = date("y"); 
    $bcodestringformat = "EOMS".$today.$Code."%";
    $getLast = $db -> query("SELECT * FROM f_skl where barcode LIKE '". $bcodestringformat ."' ORDER BY id DESC LIMIT 1");
  
    if($getLast->num_rows != 0){
        while($rows = $getLast->fetch_assoc()){
            $bcode = $rows['barcode'];
            list($q, $w) = explode("EOMS".$today.$Code, $bcode);
            $new2 = $w+1;
            $results = ltrim($new2, '0');
            return $results;
        }
   
    }else{
           
            return  9999999999999;
    }
  }

    
  function UserAccount($Code){
   
    include 'connect.php';
    $today = date("y"); 
    $bcodestringformat = "EOMS".$today.$Code."%";
    $getLast = $db -> query("SELECT * FROM f_skl where barcode LIKE '". $bcodestringformat ."' ORDER BY id DESC LIMIT 1");
    
        if($getLast->num_rows != 0){
            while($rows = $getLast->fetch_assoc()){
                $bcode = $rows['barcode'];
                list($q, $w) = explode("EOMS".$today.$Code, $bcode);
                $new2 = $w;
                $results = "EOMS".$today.$Code.str_pad($new2, 5, "0", STR_PAD_LEFT);
        
                return $results;
            }
        
        }else{
            return "Please edit manually in the database to fix EOMS(YEAR)00001";
        }
    }








?>


<div class="box-wrapper ">

    <div class="card ">
        <div class="card-body">


            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-title">Last Barcode Generated</h5><br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-qrcode"></i></span>
                        </div>
                        <input type="text" class="form-control lst_bcode" value="<?php echo UserAccount($code)?>"
                            readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5 class="card-title">Custom Year</h5><br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-qrcode"></i></span>
                        </div>
                        <input type="number" class="form-control year_yr" value="<?php echo $year_yr?>">
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="card text-center">
        <div class="card-body">

            <br>

            <div class="row">
                <div class="col-lg-6">
                    <label for="">Next Number to be generated</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-qrcode"></i></span>
                        </div>
                        <input type="number" class="form-control nxt_bcode" value="<?php echo NextBarcodH($code)?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="">Add number to generate</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-qrcode"></i></span>
                        </div>
                        <input type="number" class="form-control add_higher_num"
                            value="<?php echo NextBarcodH($code)?>">
                    </div>
                </div>
            </div>

            <button class="btn btn-success btn-sm gen_me_save mb-1"><i class="fas fa-microchip"></i> | GENERATE AND
                SAVE</button>

            <button class="btn btn-info btn-sm preview_only mb-1"><i class="fas fa-eye"></i> | PREVIEW ONLY</button>
            <button class="btn btn-danger btn-sm mb-1"><i class="fas fa-eye"></i> | FORM BACK</button>
            <a href="#" class="btn btn-warning btn-sm mb-1"><i class="fas fa-home"></i> | RETURN HOME</a>


        </div>
    </div>

</div>





<?php include 'footer.php'?>