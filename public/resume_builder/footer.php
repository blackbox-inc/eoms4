
<!-- JQUERY -->
<script src="assets/js/jquery-3.4.1.js" ></script>    

<script src="assets/js/bootstrap.js"></script>


<!-- DROPIFY  -->
<script src="assets/js/dropify.js"></script>

<!-- FONT AWESOME JS -->
<script src="assets/js/all.js"></script>


<!-- CK EDITOR -->
<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>



<!-- SWEET ALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>

var username = '<?php echo $username ?>';


$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});



// var feet = 5
// var inches = 2

// var height = feet * 12 + inches;

// var result = height *= 2.54;
// alert(result)


$('#btnConvert').on('click', function(){
    var feet = $('#feet').val();
    var inches = $('#inches').val();
    var height = feet * 12 + parseInt(inches, 10);  
    var result = height *= 2.54;
    $('#height').val(parseFloat(Math.round(result * 100) / 100).toFixed(2));
    $('#exampleModal').modal('toggle');

    


});


CKEDITOR.replace( 'editor101' );

CKEDITOR.replace( 'editor102' );
CKEDITOR.replace( 'Editeditor102' );
CKEDITOR.replace( 'editorskill101' );
CKEDITOR.replace( 'seminarANDtraining' );




var mode = '<?php echo $mode?>';


if(mode =="NEW"){
	
	
	
DupChecker();
function DupChecker(){

  var fullnameZo1 =   $('#dfullname').text();

  $.ajax({
            url: 'processor.php',
            type: 'POST',
            data: {
            'fullnameZo1' : fullnameZo1,
          
            },
            success: function( data ){
				
				


			if(data==1){
				$('.duptext').text("THIS NAME IS ALREADY ENCODED!!!");
				 $('.saveInfobtn').prop('disabled', true);
			}else{
				$('.duptext').text("");
				 $('.saveInfobtn').prop('disabled', false);
			}
			
			
            
            // $('.swal2-confirm').on('click', function(){
            //     location.reload();
            // });

            }   
        });







setTimeout(DupChecker, 1000);

}


    
$('#barcode').on('change', function(){

    $.ajax({
            url: 'processor.php',
            type: 'POST',
            data: {
                'username' : username,
            },
            success: function( data ){

            var walkin = $('#barcode').val();
  
            if(walkin =="WALK IN"){
                    $("#bcode").prop('readonly', false);
                    $("#bcode").val("");
                    $("#bcode").focus();
            }else{
                $("#bcode").prop('readonly', true);
                $("#bcode").val(data);
            }
                // $("#bcode").prop('disabled', true);

            }   
        });

    });

    String.prototype.rtrim = function () 
    {
        return this.replace(/((\s*\S+)*)\s*/, "$1");
    }

   NameChecker();
  
    


$('.saveInfobtn').on('click', function(){


  
var bcode = $('#bcode').val();
var dfullname = $('#dfullname').text();
var dfirstname = $('#dfirstname').val();




var pnumber = $('#pnumber').val();
var gender = $('#gender').val();
var birthday = $('#birthday').val();

var height = $('#height').val();
var classification = $('#class').val();
var editor101 = CKEDITOR.instances.editor101.getData()

var image_filename = "";



var error_msgs = '';

if(bcode==""){
   error_msgs = 'barcode is Required';
   alert(error_msgs);
   $('#bcode').focus();
   return;
}else  if(dfirstname==""){
   error_msgs = 'Fullname is Required';
   alert(error_msgs);
   return;
}else  if(gender==""){
   error_msgs = 'Gender is Required';
   alert(error_msgs);
   return;
   // throw new Error(error_msgs);
}else  if(birthday==""){
   error_msgs = 'Birthday is Required';
   alert(error_msgs);
   return;
   // throw new Error(error_msgs);
}else  if(height==""){
   error_msgs = 'Height is Required';
   alert(error_msgs);
   return;
   // throw new Error(error_msgs);
}else  if(classification==""){
   error_msgs = 'Classification is Required';
   alert(error_msgs);
   return;
   // throw new Error(error_msgs);
}




// CONTACT INFO 

var cno1 = $('#cno1').val();
var cno2 = $('#cno2').val();
var email1 = $('#email1').val();
var email2 = $('#email2').val();
var skype = $('#skype').val();
var contact_person = $('#contact_person').val();
var contact_number1 = $('#contact_number1').val();
var address = $('#address').val();




if(cno1==''){
   error_msgs = 'Primary Number is Required';
   alert(error_msgs);
   return;   
}else if(email1==''){
   error_msgs = 'Primary Email is Required';
   alert(error_msgs);
   return; 

}else if(address==''){
   error_msgs = 'Address is Required';
   alert(error_msgs);
   return; 

}

 


// CATEGORY INFO (POSITION)

var cat2 = $('#cat2').val();
var cat3 = $('#cat3').val();
var cat4 = $('#cat4').val();


if (cat2==''){
   error_msgs = 'Primary position is Required';
   alert(error_msgs);
   return; 

}

     


if (jQuery('#sortpicture').val() == '') {
  alert('Please Attach Image')
  return;
}else {

   var file_data = $('#sortpicture').prop('files')[0];   
   var form_data = new FormData();                  
   form_data.append('file', file_data);
                            
   $.ajax({
       url: 'upload.php', // point to server-side PHP script 
       dataType: 'text',  // what to expect back from the PHP script, if anything
       cache: false,
       contentType: false,
       processData: false,
       data: form_data,                         
       type: 'post',
       success: function(data){
          image_filename = data;

     
                

           
                   $.ajax({
                       url: 'save.php',
                       type: 'POST',
                       data: {
                           'bcode_bcode' : bcode,
                           'dfullname' : dfullname,
                           'pnumber' : pnumber,
                           'gender' : gender,
                           'birthday' : birthday,
                           'height' : height,
                           'classification' : classification,
                           'editor101' : editor101,
                           'image_filename' : image_filename,
                           'cno1' : cno1,
                           'cno2' : cno2,
                           'email1' : email1,
                           'email2' : email2,
                           'skype' : skype,
                           'contact_person' : contact_person,
                           'contact_number1' : contact_number1,
                           'cat2' : cat2,
                           'cat3' : cat3,
                           'cat4' : cat4,
                           'username': username,
                           'address': address
                          
                       }, 
                       success: function( data ){

                           alert(data); 
						   console.log(data)
                           window.location.href = "/v2/resume_builder/?barcode="+bcode;
                       }   
                   });     
       }
   });


}

});





}else{

// UPDATE MODE HERE/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
console.log("UPDATE ENTRY");


$('#dlastname').on('change', function(){
    String.prototype.rtrim = function () 
    {
        return this.replace(/((\s*\S+)*)\s*/, "$1");
    }

   NameChecker();
   
  

});

$('#dfirstname').on('change', function(){
    String.prototype.rtrim = function () 
    {
        return this.replace(/((\s*\S+)*)\s*/, "$1");
    }

   NameChecker();
  

});

$('#dmiddlename').on('change', function(){
    String.prototype.rtrim = function () 
    {
        return this.replace(/((\s*\S+)*)\s*/, "$1");
    }

   NameChecker();
  

});




 ///////////////////
    
 $('#educBtnSave').on('click', function(){
    var MainBarcode = $("#bcode").val();
    var school = $('#school').val();
    var degree = $('#degree').val();
    var school_year = $('#school_year').val();

 

    if(MainBarcode ==""){
        alert('Barcode is not set');
        return;
    }else if(school==""){
        alert('Name of School is required!');
        return;
    }else if(degree==""){
        alert('Degree is required!');
        return;
    }else if(school_year==""){
        alert('School year is required!');
        return;
    }


    $.ajax({
        url: 'processor.php',
        type: 'POST',
        data: {
            'MainBarcode' : MainBarcode,
            'school' : school,
            'degree' : degree,
            'school_year' : school_year,
        },
        success: function( data ){

          alert(data)

          location.reload();

        }   
    });

});	


$('.educDeleteBtn').on('click', function(){

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      
        if (result.value) {
            
            var id_delete_educ = $(this).attr('data-delete');
        
            $.ajax({
                    url: 'processor.php',
                    type: 'POST',
                    data: {
                        'id_delete_educ' : id_delete_educ,
                    },
                    success: function( data ){
                        
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )

                        $('.swal2-confirm').on('click', function(){
                             location.reload();
                        });

                       
                     

                    }   
            });


           
        }
    })

});

$('.educEditBtn').on('click', function(){

    var id = $(this).attr('data-id');
    var school = $(this).attr('data-school');
    var year = $(this).attr('data-year');
    var degree = $(this).attr('data-degree');
  
    $('#editid').val(id);
    $('#Eschool').val(school);
    $('#Edegree').val(degree);
    $('#Eschool_year').val(year);


});



$('.UpdateInfobtn').on('click', function(){

        
var bcode = $('#bcode').val();
var dfullname = $('#dfullname').text();
var dfirstname = $('#dfirstname').val();

var pnumber = $('#pnumber').val();
var gender = $('#gender').val();
var birthday = $('#birthday').val();

var height = $('#height').val();
var classification = $('#class').val();
var editor101 = CKEDITOR.instances.editor101.getData()

var image_filename = "";



var error_msgs = '';

if(bcode==""){
   error_msgs = 'barcode is Required';
   alert(error_msgs);
   $('#bcode').focus();
   return;
}else  if(gender==""){
   error_msgs = 'Gender is Required';
   alert(error_msgs);
   return;
   // throw new Error(error_msgs);
}else  if(birthday==""){
   error_msgs = 'Birthday is Required';
   alert(error_msgs);
   return;
   // throw new Error(error_msgs);
}else  if(height==""){
   error_msgs = 'Height is Required';
   alert(error_msgs);
   return;
   // throw new Error(error_msgs);
}else  if(classification==""){
   error_msgs = 'Classification is Required';
   alert(error_msgs);
   return;
   // throw new Error(error_msgs);
}




// CONTACT INFO 

var cno1 = $('#cno1').val();
var cno2 = $('#cno2').val();
var email1 = $('#email1').val();
var email2 = $('#email2').val();
var skype = $('#skype').val();
var contact_person = $('#contact_person').val();
var contact_number1 = $('#contact_number1').val();
var address = $('#address').val();




if(cno1==''){
   error_msgs = 'Primary Number is Required';
   alert(error_msgs);
   return;   
}else if(email1==''){
   error_msgs = 'Primary Email is Required';
   alert(error_msgs);
   return; 

}else if(address==''){
   error_msgs = 'Address is Required';
   alert(error_msgs);
   return; 

}

 


// CATEGORY INFO (POSITION)

var cat2 = $('#cat2').val();
var cat3 = $('#cat3').val();
var cat4 = $('#cat4').val();


if (cat2==''){
   error_msgs = 'Primary position is Required';
   alert(error_msgs);
   return; 

}

     
  

if (jQuery('#sortpicture').val() == '') {
//   alert('Please Attach Image')
    var default_image = $('#default_image').val();

    
    image_filename = default_image;

    $.ajax({
        url: 'update.php',
        type: 'POST',
        data: {
        'bcode_bcode' : bcode,
        'dfullname' : dfullname,
        'pnumber' : pnumber,
        'gender' : gender,
        'birthday' : birthday,
        'height' : height,
        'classification' : classification,
        'editor101' : editor101,
        'image_filename' : image_filename,
        'cno1' : cno1,
        'cno2' : cno2,
        'email1' : email1,
        'email2' : email2,
        'skype' : skype,
        'contact_person' : contact_person,
        'contact_number1' : contact_number1,
        'cat2' : cat2,
        'cat3' : cat3,
        'cat4' : cat4,
        'username': username,
        'address': address

        },
            success: function( data ){

            console.log(data);
             window.location.href = "/v2/resume_builder/?barcode="+bcode;
        }   
    });     


 
 
}else {

   var file_data = $('#sortpicture').prop('files')[0];   
   var form_data = new FormData();                  
   form_data.append('file', file_data);
                           
   $.ajax({
       url: 'upload.php', // point to server-side PHP script 
       dataType: 'text',  // what to expect back from the PHP script, if anything
       cache: false,
       contentType: false,
       processData: false,
       data: form_data,                         
       type: 'post',
       success: function(data){
          image_filename = data;

     
              

           
                   $.ajax({
                       url: 'update.php',
                       type: 'POST',
                       data: {
                           'bcode_bcode' : bcode,
                           'dfullname' : dfullname,
                           'pnumber' : pnumber,
                           'gender' : gender,
                           'birthday' : birthday,
                           'height' : height,
                           'classification' : classification,
                           'editor101' : editor101,
                           'image_filename' : image_filename,
                           'cno1' : cno1,
                           'cno2' : cno2,
                           'email1' : email1,
                           'email2' : email2,
                           'skype' : skype,
                           'contact_person' : contact_person,
                           'contact_number1' : contact_number1,
                           'cat2' : cat2,
                           'cat3' : cat3,
                           'cat4' : cat4,
                           'username': username,
                           'address': address
                          
                       },
                       success: function( data ){

                           alert(data);
                           window.location.href = "/v2/resume_builder/?barcode="+bcode;
                       }   
                   });     
       }
   });


}


});




$('.expBtnSave').on('click', function(){
    var bcode = $('#bcode').val();
    var cposition = $('#cposition').val();
    var ccompany = $('#ccompany').val();
    var cdate = $('#cdate').val();
    var editor102 = CKEDITOR.instances.editor102.getData();

    $.ajax({
                    url: 'processor.php',
                    type: 'POST',
                    data: {
                        'bcode' : bcode,
                        'cposition' : cposition,
                        'ccompany' : ccompany,
                        'cdate' : cdate,
                        'editor102' : editor102
                    },
                    success: function( data ){
                        
                        Swal.fire(
                        'ALERT',
                        data,
                        'success'
                        )
                       

                        $('.swal2-confirm').on('click', function(){
                             location.reload();
                        });

                     

                    }   
            });

   
});



$('.expeditbtn').on('click', function(){

    var id = $(this).attr('data-id');
	
	
	
	
	  $.ajax({
            url: 'processor.php',
            type: 'POST',
			dataType: 'json',
            data: {
                'id_ni_edit' : id,
               
            },
            success: function( data ){
				
				
			var Editcposition = data[0].cposition;
			var Editccompany = data[0].ccompany;
			var cdate = data[0].cdate;
			var Editeditor102 = data[0].cdesc;

    
			$('#expEditid').val(id);
			$('#Editcposition').val(Editcposition);
			$('#Editccompany').val(Editccompany);
			$('#Editcdate').val(cdate);
			$('#Editeditor102').val(Editeditor102);
			CKEDITOR.instances['Editeditor102'].setData(Editeditor102)

                // Swal.fire(
                // 'ALERT',
                // data,
                // 'success'
                // )

			console.log(data)
                // $('.swal2-confirm').on('click', function(){
                    // location.reload();
                // });

            }   
        });
	
	
	
	
	
	
	
	
	

   
   
  
});


// expUPDATE

$('.expBtnupdate').on('click', function(){

    var id  = $('#expEditid').val();
    var Editcposition = $('#Editcposition').val();
    var Editccompany = $('#Editccompany').val();
    var Editcdate  = $('#Editcdate').val();
    var Editeditor102 = CKEDITOR.instances.Editeditor102.getData();


        $.ajax({
            url: 'processor.php',
            type: 'POST',
            data: {
                'id' : id,
                'Editcposition' : Editcposition,
                'Editccompany' : Editccompany,
                'Editcdate' : Editcdate,
                'Editeditor102' : Editeditor102
            },
            success: function( data ){

                Swal.fire(
                'ALERT',
                data,
                'success'
                )


                $('.swal2-confirm').on('click', function(){
                    location.reload();
                });

            }   
        });



});

$('.expDelete').on('click', function(){
    var id = $(this).attr('data-id');


        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

            $.ajax({
                url: 'processor.php',
                type: 'POST',
                data: {
                'id_expDelete' : id,

                },
                success: function( data ){

                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )

                $('.swal2-confirm').on('click', function(){
                    location.reload();
                });

                }   
            });




               
            }
        })



    
  
});


$('.btnSkillsUpdate').on('click', function(){
    var bcode = $('#bcode').val();
    var editorskill101 = CKEDITOR.instances.editorskill101.getData();

    $.ajax({
                url: 'processor.php',
                type: 'POST',
                data: {
                'bcode' : bcode,
                'editorskill101': editorskill101,

                },
                success: function( data ){


                Swal.fire(
                    'Attention',
                    data,
                    'success'
                )
                
                $('.swal2-confirm').on('click', function(){
                    location.reload();
                });

                }   
            });

    
    
});


$('.skillbtnSave').on('click', function(){

    var bcode = $('#bcode').val();
    var SAVEeditorskill101 = CKEDITOR.instances.editorskill101.getData();

    $.ajax({
                url: 'processor.php',
                type: 'POST',
                data: {
                'bcode' : bcode,
                'SAVEeditorskill101': SAVEeditorskill101,

                },
                success: function( data ){


                Swal.fire(
                    'Attention',
                    data,
                    'success'
                )
                
                $('.swal2-confirm').on('click', function(){
                    location.reload();
                });

                }   
            });

});



$('.seminarbtnSave').on('click', function(){
    var bcode = $('#bcode').val();
    var seminarANDtraining = CKEDITOR.instances.seminarANDtraining.getData();

    $.ajax({
            url: 'processor.php',
            type: 'POST',
            data: {
            'bcode' : bcode,
            'seminarANDtrainingSave': seminarANDtraining,

            },
            success: function( data ){


            Swal.fire(
                'Attention',
                data,
                'success'
            )
            
            $('.swal2-confirm').on('click', function(){
                location.reload();
            });

            }   
        });
    });


    $('.seminarbtnUpdate').on('click', function(){

        var bcode = $('#bcode').val();
        var seminarANDtraining = CKEDITOR.instances.seminarANDtraining.getData();

        $.ajax({
            url: 'processor.php',
            type: 'POST',
            data: {
            'bcode' : bcode,
            'seminarANDtrainingUpdate': seminarANDtraining,

            },
            success: function( data ){


            Swal.fire(
                'Attention',
                data,
                'success'
            )
            
            $('.swal2-confirm').on('click', function(){
                location.reload();
            });

            }   
        });
    });



}//END ELSE MODE//////////////////////////////////////////////////////////////////////////////////////////////////




function NameChecker(){

//   PROPER CASE  FUNCTION
jQuery.fn.ucwords = function() {
    return this.each(function(){
        var val = $(this).text().toLowerCase(), newVal = '';
        val = val.split(' ');

        for(var c=0; c < val.length; c++) {
            if (c>0 && val[c]=="is" || c>0 && val[c]=="to" || c>0 && val[c]=="the"){
                newVal+=val[c]+' ';
            } else newVal += val[c].substring(0,1).toUpperCase() + val[c].substring(1,val[c].length) + (c+1==val.length ? '' : ' '); 
        }
            $(this).text(newVal);
    });
}
  


var lastname = $('#dlastname').val().rtrim();
var firstname = $('#dfirstname').val().rtrim(); 
var middlname = $('#dmiddlename').val().rtrim(); 
var x = middlname.charAt(0);



if(middlname == ""){
    var nameC = firstname+" "+ lastname;
    $("#dfullname").text(nameC);
    $('#dfullname').ucwords();
}else{
    
    var nameC = firstname+" " + x.charAt(0)+" " + lastname;
    $("#dfullname").text(nameC);
    $('#dfullname').ucwords();
}
NameExist();

setTimeout(NameChecker, 1000);
// Stopper = 	setTimeout(NameChecker, 1000);
}





function NameExist(){

var fnames = $('#dfullname').text();

if(fnames==""){
    $('#suggestion').hide();
}else{
  
    $.ajax({
            url: 'processor.php',
            type: 'POST',
            data: {
            'fnames' : fnames,
            },
            success: function( data ){

                if(data==""){
                    $('#suggestion').hide();
                }else{
                    $('#suggestion').show();
                    $('.suggestlist').html(data);
                }

            }   
        });

}



}












    

    
   
// $('#imahe').on('change', function(){
// alert(1)
// });



// $('#upload').on('click', function() {
  
// });




  


</script>

</body>
</html>