<?php 
session_start();
$user____name = $_SESSION["username"];


if(isset($_GET['bcodeget'])){
    $barcodeGet = $_GET['bcodeget'];
}else{
    $barcodeGet = "";
}

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




    <title>New Applicant</title>

</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">New Applicant</h1>

            <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
        </div>
    </div>
    <div class="container">
        <div class="card border-secondary mb-3">
            <div class="card-header">
                <h3>PERSONAL INFORMATION</h3>
            </div>

            <!-- BARCODE -->
            <div class="container">


                <div class="float-right center-block input-group mt-3" style="width: 40%">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-qrcode"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-lg bcode" placeholder="Barcode" readonly>
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
                                    <input type="text" class="form-control surname" placeholder="Surname"
                                        aria-label="Apelyido" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-signature"></i></span>
                                    </div>
                                    <input type="text" class="form-control firstname" placeholder="Firstname"
                                        aria-label="Name" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-signature"></i></span>
                                    </div>
                                    <input type="text" class="form-control middlename" placeholder="Middlename"
                                        aria-label="middlename" aria-describedby="basic-addon1">
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
                                                        placeholder="Passport Number">
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
                                                    <input type="text" class="form-control height"
                                                        placeholder="Enter Height" readonly>
                                                </div>

                                            </div>


                                            <div class="col-lg-6">




                                                <select class="custom-select blood_type mb-3">
                                                    <option value="" selected>Blood Type</option>
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
                                                    <input type="text" class="form-control weight_dh"
                                                        placeholder="Enter Weight" readonly>
                                                </div>

                                            </div>



                                            <div class="col-lg-6">

                                                <select class="custom-select country mb-3">
                                                    <option value="" selected>Preferred Country</option>
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

                                            <div class="col-lg-7">

                                                <select class="custom-select gender mb-3">
                                                    <option selected value="FEMALE">FEMALE</option>
                                                    <option value="MALE">MALE</option>
                                                </select>

                                            </div>

                                            <div class="col-lg-5">

                                                <select class="custom-select position_applied mb-3">
                                                    <option selected value="DOMESTIC HELPER">DOMESTIC HELPER</option>
                                                    <option value="DOMESTIC HELPER">HSW</option>
                                                    <option value="DOMESTIC HELPER">NANNY</option>
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
                                                            <input class="form-check-input " type="radio" name="rdio"
                                                                id="radio_first" value="First Timer" checked>
                                                            <label class="form-check-label" for="radio_first">
                                                                <strong>I'M FIRST TIMER</strong>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input " type="radio" name="rdio"
                                                                id="radio_ex" value="Ex Abroad">
                                                            <label class="form-check-label" for="radio_ex">
                                                                <strong>I'M EX-ABROAD</strong>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Previous Agency Name</label>
                                                            <input type="text" class="form-control previous_agency">
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
                                                                placeholder="Religion">
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
                                                                placeholder="Date of Birth">
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
                                                                placeholder="Place of Birth">
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
                                    data-allowed-file-extensions='["jpg", "JPG", "png", "PNG", "bmp","BMP", "gif", "txt"]'
                                    data-height="450" data-default-file="default.jpg" />
                            </div>

                        </div>
                    </div>
                    <button class="btn btn-success btn-lg btn-block mt-3 save_first">SAVE</button>
                </div>
            </div>
        </div>




        <div class="barcode_card">
            <a href="/v2/" class="btn btn-outline-danger m-3 ">CANCEL</a>
            <div class="barcode-content">
                <label class="label_barcode" for="">Enter Barcode</label>
                <input class="form-control form-control-lg barcode_check" type="text" id="barcode" value="<?php echo $barcodeGet?>">
              
            </div>

        </div>




        <?php include 'modal.php';?>
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="node_modules/dropify/dist/js/dropify.min.js"></script>
        <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="node_modules/@fortawesome/fontawesome-free/js/all.js"></script>

        <script>
        var contactperson = "<?php echo $user____name ?>";
        </script>


        <script src="script.js"></script>
		<script>
		
		
		
		// onInactive(60000 * 30 , function() {
			// let timerInterval
			// Swal.fire({
				// title: 'You are now automatically logout',
				// html: 'Redirecting....',
				// timer: 5000,
				// timerProgressBar: true,
				// didOpen: () => {
					// Swal.showLoading()
					// const b = Swal.getHtmlContainer().querySelector('b')
					// timerInterval = setInterval(() => {
						// b.textContent = Swal.getTimerLeft()
					// }, 100)
				// },
				// willClose: () => {
					// clearInterval(timerInterval)
				// }
			// }).then((result) => {
				// /* Read more about handling dismissals below */
				// if (result.dismiss === Swal.DismissReason.timer) {
					// console.log('I was closed by the timer')
					// window.location.replace("v2/../../../logout.php");
				// }
			// })


			// $('.swal2-confirm').on('click', function() {
				// window.location.replace("v2/../../../logout.php");
			// });
		// });
		
		
		

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