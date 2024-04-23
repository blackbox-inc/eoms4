<!DOCTYPE html>
<html lang="en">

<head>
    <?php
		require("../connect.php");

		if(isset($_GET['bcode'])){
			$bcode = $_GET['bcode'];

		}
		$getPersonal = $db -> query("select * from c_information where bcode = '$bcode'");
			while($rows = $getPersonal -> fetch_assoc()){
				$name = $rows['fullname'];
				$gender = $rows['gender'];
				$bday = $rows['birthday'];
				$height = $rows['height'];
				$objective = $rows['objectives'];
				$img = $rows['idpic'];
			}

	?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title><?php echo $bcode; echo $name;?></title>

    <!-- favicon -->
    <link rel="shortcut icon" href="images/ico/favicon.png">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/materialdesignicons.min.css" />
    <link rel="stylesheet" type="text/css" href="css/template.css" />

    <!-- <link rel="stylesheet" type="text/css" href="css/print.css" media="print"/> -->


    <style>
    .nino-sectionContent {
        position: relative;
    }

    .img-wrapper {}

    .img-wrapper img {
        position: absolute;
        left: 300px;
        top: 10px;
        height: 100%;
        width: 280px;
        border-bottom: 1px solid black;
        mix-blend-mode: multiply;
    }
    </style>

</head>

<body>


    <!-- Wrapper
    ================================================== -->
    <!-- <button class="btn btn-danger" id="print" style="margin-left: 1180px;"><i class="fa fa-upload"></i>Print</button> -->
    <div id="nino-cvWrap">
        <div layout="row" class="fw">
            <div id="nino-leftSide" class="fsr">
                <div layout="row" class="fw">
                    <header class="col-md-12 col-sm-6 col-xs-12">


                        <?php
					$file_pointer = $_SERVER['DOCUMENT_ROOT'] . '/v2/resume_builder/upload/'.$img;
					
					

					if (file_exists($file_pointer)) {
						$imgpath = '/v2/resume_builder/upload/'.$img;
						echo '<img src="'.$imgpath.'" alt="" height="150px;" width="150px;"  >';
					}else {
						$imgpath = 'https://eomsinc.com/EOMS%20Queue/img/'.$img;
						echo '<img src="'.$imgpath.'" alt="" height="150px;" width="150px;"  >';	
					}
					
					?>








                        <!-- <img src="../img/<?php echo $img?>" alt="" height="150px;" width="150px;"> -->


                        <h1 class="name"><?php echo $name; ?></h1>
                        <!-- <h3 class="regency">Sales Executive</h3> -->
                    </header>
                    <section class="nino-aboutMe col-md-12 col-sm-6 col-xs-12">
                        <h2 class="nino-sectionHeading1">
                            <i class="mdi mdi-account nino-icon1"></i>Personal Data
                        </h2>
                        <div class="nino-sectionContent">
                            <ul class="nino-listWithIcon">
                                <li layout="row">
                                    <div class="fsr">
                                        <i class="mdi mdi-calendar nino-icon"></i>
                                    </div>
                                    <div class="fg">
                                        <?php echo $bday; ?>
                                    </div>
                                </li>
                                <li layout="row">
                                    <div class="fsr">
                                        <i class="mdi mdi-gender-male-female nino-icon"></i>
                                    </div>
                                    <div class="fg">
                                        <?php 
									    if($gender == "His"){
									        echo 'Male';
									    }else{
									        echo 'Female';
									    }
									?>
                                    </div>
                                </li>
                                <li layout="row">
                                    <div class="fsr">
                                        <i class="mdi mdi-format-line-spacing nino-icon"></i>
                                    </div>
                                    <div class="fg">
                                        <?php echo $height;?> cm
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <section class="nino-contactInfo col-md-12 col-sm-6 col-xs-12">
                        <h2 class="nino-sectionHeading1">
                            <i class="mdi mdi-school nino-icon1"></i>Education
                        </h2>
                        <ul class="nino-listWithIcon">
                            <?php
								$getEducation = $db -> query("select * from c_educ where u_num = '$bcode'");
									while($rows = $getEducation -> fetch_assoc()){
										$degree = $rows['degree'];
										$school = $rows['school'];
										$year = $rows['year'];

										echo '
											<li layout="row">
												<div class="fsr">
													<i class="mdi mdi-school nino-icon"></i>
												</div>
												<div class="fg">
													'.$degree.'<br>
													'.$school.'<br>
													'.$year.'
												</div>
											</li>
										';
									}
							?>
                        </ul>
                    </section>
                </div>
            </div>
            <div id="nino-rightSide" class="fg">
                <main id="nino-mainContent">

                    <svg id="barcode" style="margin-top: -20px; margin-left: 360px;"></svg>
                    <input type="hidden" id="bcode" value="<?php echo $bcode;?>">

                    <?php
		                if($objective == ""){
		                    
		                }else{
		                    echo '
		                        <section>
            						<h2 class="nino-sectionHeading">
            							<i class="mdi mdi-account nino-icon"></i>Career Profile
            						</h2>
            						<div class="nino-sectionContent">
            							<div class="inner">
            								<article>
            									<div class="nino-articleContent">
            										<p style="text-align: justify;">'.$objective.'</p>
            									</div>
            								</article>
            							</div>
            						</div>
            					</section>
		                    ';
		                }
		            
		            ?>




                    <?php
								$getExperience = $db -> query("select * from c_experience where u_num = '$bcode'");
								    if($getExperience->num_rows != 0){
								        echo '
								            <section>
                        						<h2 class="nino-sectionHeading">
                        							<i class="mdi mdi-briefcase nino-icon"></i>Work Experience
                        						</h2>
                        						<div class="nino-sectionContent">
                        							<div class="inner">
								        ';
								        while($rows = $getExperience -> fetch_assoc()){
    										$position = $rows['cposition'];
    										$company = $rows['ccompany'];
    										$date = $rows['cdate'];
    										$desc = $rows['cdesc'];
    
    										echo '
    											<article>
    												<h3 class="nino-articleTitle">'.$position.'</h3>
    												<div class="nino-articleMeta">
    													<span><i class="mdi mdi-domain nino-icon"></i>'.$company.'</span>
    													<span><i class="mdi mdi-calendar-text nino-icon"></i>'.$date.'</span>
    												</div>
    												<div class="nino-articleContent">
    													<p style="text-align: justify;"> '.$desc.'</p>
    												</div>
    											</article>
    										';
    									}
    									echo '
    									        </div>
                    						</div>
                    					</section>
    									';
								    }else{
								        
								    }
									

							?>


                    <?php

									$getSkills = $db -> query("select * from c_skills where u_num = '$bcode' and sdesc != ''");
									    if($getSkills->num_rows != 0){
									       echo '
									            <section>
                            						<h2 class="nino-sectionHeading">
                            							<i class="mdi mdi-trophy-award nino-icon"></i>Skills
                            						</h2>
                            						<div class="nino-sectionContent">
                            							<div class="inner">
									       ';
									        while($rows = $getSkills -> fetch_assoc()){
    											$sdesc = $rows['sdesc'];
    
    											echo '
    												<article>
    													<div class="nino-articleContent">
    														<p style="text-align: justify;"> '.$sdesc.'</p> 
    													</div>
    												</article>
    											';
    										}
    										echo '
    										    </div>
                        						</div>
                        					</section>
    										';
									    }else{
									        
									    }
										

								?>



                    <?php

									$getSkills = $db -> query("select * from c_st where u_num = '$bcode' and st_desc != ''");
									    if($getSkills->num_rows != 0){
									        echo '
									            <section>
                            						<h2 class="nino-sectionHeading">
                            							<i class="mdi mdi-trophy-award nino-icon"></i>Seminars/ Trainings
                            						</h2>
                            						<div class="nino-sectionContent">
                            							<div class="inner">
									        ';
									        while($rows = $getSkills -> fetch_assoc()){
    											$stdesc = $rows['st_desc'];
    
    											echo '
    												<article>
    													<div class="nino-articleContent">
    														<p style="text-align: justify;"> '.$stdesc.'</p> 
    													</div>
    												</article>
    											';
									    	}
									    	echo '
    									    	        </div>
                            						</div>
                            					</section>
									    	';
									    }else{
									        
									    }
										

								?>

                    <section>
                        <div class="nino-sectionContent">
                            <div class="inner">
                                <article>
                                    <div class="nino-articleContent">
                                        <p style="text-align: justify;"><b><i>I hereby signify that the above
                                                    information is true and correct to the best of my knowledge and
                                                    belief.</i></b></p>

                                        <?php 
										ini_set('display_errors', '1');
										ini_set('display_startup_errors', '1');
										error_reporting(E_ALL);
										
										$image_url = "https://eomsinc.com/v2/upload/".$bcode.".png"; // Found
										// $image_url = "https://www.google.com/logos/doodles/2015/googles-new-logo-5078286822539264.3-hp2x%20404.gif"; // Not Found
										$ch = curl_init($image_url);
										curl_setopt($ch, CURLOPT_NOBODY, true);
										curl_exec($ch);
										$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
										curl_close($ch);
										
										if($httpCode != 404 ){
										   echo ' <div class="img-wrapper"><img src="https://eomsinc.com/v2/upload/'.$bcode.'.png" alt=""></div>';
										}else{
										   echo '<p style="text-align: right;"><b>NO SIGNATURE ATTACHED</b></p>';
										}
										
										
										?>






                                    </div>

                                </article>

                            </div>
                            <p style="text-align: right; margin-right: 40px"><b><?php echo $name;?></b></p>
                        </div>
                        <p style="text-align: right;"><b>Signature over Printed Name</b></p>
                    </section>



                </main>
            </div>
        </div>
    </div>
    <div id="editor"></div>
    <!-- Scroll to top
    ================================================== -->
    <a href="#" id="nino-scrollToTop">Go to Top</a>

    <!-- javascript -->
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="js/JsBarcode.code128.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/template.js"></script>
    <script>
    var bcode = $("#bcode").val();
    JsBarcode("#barcode", bcode, {
        format: "CODE128A",
        width: 1,
        height: 30,
        fontSize: 14
    });


    $(document).ready(function() {
        window.print();
    });
    </script>

</body>

</html>