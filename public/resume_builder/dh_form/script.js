$('.dropify').dropify();


$('.save_first').on('click', function(){

// C_INFORMATION

//$(this).prop('disabled', true);

bcode = $('.bcode').val();

var surname = $('.surname').val();
var firstname = $('.firstname').val();
var middlename = $('.middlename').val();

var fullname = firstname+" " + middlename.charAt(0) +" "+surname
var passport = $('.passport').val();
var gender = $('.gender').val();
var dob = $('.dob').val();
var height = $('.height').val();
var resume = bcode + "-" + surname + " " + firstname + " " + middlename.charAt(0);
var objectivesblank = "-";
var newName; 
var status = 0;
var classD = "D";
var scomment = "";
// var contactperson = "ADMIN";
var religion = $('.religion').val();
var place_of_birth = $('.place_of_birth').val();
var weight_dh = $('.weight_dh').val();
var blood_type = $('.blood_type').val();
var country = $('.country').val();
var msalary = "";
var category_radio_check
var previous_agency = $('.previous_agency').val();

var position_applied  = $('.position_applied').val();



var whole_body_pic = $('.whole_body_pic').val();







// var position = $('.position').val();

// var nationality = $('.nationality').val();
// var perma_address = $('.perma_address').val();
// var marital_status = $('.marital_status').val();
// var no_of_children = $('.no_of_children').val();
// var contact_number = $('.contact_number').val();
// var educational_status = $('.educational_status').val();




// var isCheck_washing = "NO"
// if($('#c_washing').is(':checked')) { 
//      isCheck_washing = "1"
// }


// var isCheck_sewing = "NO"
// if($('#c_sewing').is(':checked')) { 
//      isCheck_sewing = "1"
// }


// var isCheck_cleaning = "NO"
// if($('#c_cleaning').is(':checked')) {
//       isCheck_cleaning = "1"
// }


// var isCheck_cooking = "NO"
// if($('#c_cooking').is(':checked')) { 
//      isCheck_cooking = "1"
// }


// var isCheck_ironing = "NO"
// if($('#c_ironing').is(':checked')) { 
//      isCheck_ironing = "1"
// }


// var isCheck_babycare = "NO"
// if($('#c_babycare').is(':checked')) { 
//      isCheck_babycare = "1"
// }

// isCheck_washing
// isCheck_sewing
// isCheck_cleaning
// isCheck_cooking
// isCheck_ironing
// isCheck_babycare

// GET THE CHECKED RADIO
// var category_radio_check
// if($('#radio_first').is(':checked')) { category_radio_check = "1ST" }
// if($('#radio_ex').is(':checked')) { category_radio_check = "EX" }
// alert(category_radio_check)
// var radio_first = $('#radio_first').val();
// var radio_ex = $('#radio_ex').val();


// Restriction

// if(no_of_children==""){
//     $('.no_of_children').val(0);
// }

// if(position ==""){
//     alert("No Position")
//     $('.position').focus();
//     return
// }

if(surname ==""){
    alert("No Surname")
    $('.surname').focus();
    return
}else if(firstname ==""){
    alert("No Firstname")
    $('.firstname').focus();
    return
}else if(country ==""){
    alert("No Country")
    $('.country').focus();
    return
}


//  if(contact_number ==""){
//     alert("No Contact No.")
//     $('.contact_number').focus();
//     return
// }

if($('#radio_first').is(':checked')) { 
    category_radio_check = "0";
}

if($('#radio_ex').is(':checked')) { 
    category_radio_check = "1";
    if(previous_agency==""){
        alert("No  Agency")
        $('.previous_agency').focus()
        return
    }
}

if(dob==""){
    alert("No DOB")
    $('.dob').focus();
    return
}

if(religion==""){
    alert("No religion")
    $('.religion').focus();
    return
}else if(place_of_birth==""){
    alert("No Place of Birth")
    $('.place_of_birth').focus();
    return
}


// if(perma_address==""){
//     alert("No Permanent Address")
//     $('.perma_address').focus();
//     return
// }


// if(marital_status==""){
//     alert("No Civil Status")
//     $('.marital_status').focus();
//     return
// }


// if(educational_status==""){
//     alert("No Educational Status")
//     $('.educational_status').focus();
//     return
// }

if(whole_body_pic ==""){
    alert("Please Upload Image")
    return
}else{
 
    var file_data = $('.whole_body_pic').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    // alert(form_data);                             
    $.ajax({
        url: 'upload.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
             newName =  php_script_response// display response from the PHP script, if any
           

             $.ajax({

                url: 'create_process.php',
                type: 'post',
                data: {
            
                    'bcode' : bcode,
       
                    'fullname': fullname,
                    'passport': passport,
                    'gender':gender,
                    'dob': dob,
                    'height': height,
                    'resume': resume,
                    'objectivesblank': objectivesblank,
                    'newName': newName,
                    'status': status,
                    'classD': classD,
                    'scomment': scomment,
                    'contactperson': contactperson,
                    'religion': religion,
                    'place_of_birth': place_of_birth,
                    'weight_dh': weight_dh,
                    'blood_type': blood_type,
                    'country': country,
                    'msalary': msalary,
                    'category_radio_check': category_radio_check,
                    'previous_agency': previous_agency,
                    'position_applied': position_applied,
                 
            
                
                },
                success: function( data ){
                  console.log(data)
                //    location.reload()
                alert("Generating other Information");
                window.location.href = "update.php?bcode="+bcode;
                },
            
            });

        }
     });
     
}





  


    
});//END




$('#upload').on('click', function() {
    var file_data = $('#sortpicture').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    // alert(form_data);                             
    $.ajax({
        url: 'upload.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            alert(php_script_response); // display response from the PHP script, if any
        }
     });
});

 

$('#barcode').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){

        var barc = $(this).val();
		
		

        // Search Barcode if Exist
        $.ajax({

            url: 'create_process.php',
            type: 'post',
            data: {
                
                'barc' : barc,
             
            },
            success: function( data ){
             
    
                if(data=="0"){

                    Swal.fire({
                        icon: 'error',
                        title: 'INVALID BARCODE',
                        text: barc,
                    })

                }else if(data==1){

                    Swal.fire(
                        'BARCODE VALIDATED',
                        '',
                        'success'
                      )
        
                      $('.swal2-confirm').on('click', function(){
                            $(".barcode_card").css("display", "none");
                            $('.bcode').val(barc)
                      });

                }else if(data==2){

                    Swal.fire({
                        icon: 'error',
                        title: 'WARNING!!',
                        text: 'THIS BARCODE '+ barc+' IS ALREADY TAKEN',
                       
                      })
                   
                  
                }
          
            },
        
        });




        // if(barc =="1"){

        //     Swal.fire(
        //         'BARCODE VALIDATED',
        //         '',
        //         'success'
        //       )

        //       $('.swal2-confirm').on('click', function(){
        //             $(".barcode_card").css("display", "none");
        //             $('.bcode').val(barc)
        //       });

          

        // }else{
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'INVALID BARCODE',
        //         text: barc,
        //     })

        // }
      
      
    }
});




$('.exp_save').on('click', function(){
   
    var prev_position = $('.prev_position').val();
    var prev_country = $('.prev_country').val();
    var frm_date = $('.frm_date').val();
    var to_date = $('.to_date').val();
    
    $.ajax({

        url: 'create_process.php',
        type: 'post',
        data: {
            
            'general_barcode' : general_barcode,
            'prev_position' : prev_position,
            'prev_country' : prev_country,
            'frm_date' : frm_date,
            'to_date' : to_date,
          
         
        },
        success: function( data ){
         

          alert(data)
          location.reload();
      
     
         
        },
    
    });


});



$('.update_now').on('click', function(){

    alert(1)

});


 
$('.save_other_info').on('click', function(){
 
    // alert(update_barcode)
    var marital_status = $('.marital_status').val();
    var no_children = $('.no_children').val();
    var cno1 = $('.cno1').val();
    var cno2 = $('.cno2').val();
    var email1 = $('.email1').val();
    var skype = $('.skype').val();
    var address = $('.address').val();


    var contact_name = $('.contact_name').val();
    var c_relation = $('.c_relation').val();
    var contact_no = $('.contact_no').val();
    var c_address = $('.c_address').val();



    if(marital_status==""){
        alert("Marital Status Required");
        $('.marital_status').focus();
        return;
    }

    if(cno1==""){
        alert("Primary number is Required");
        $('.cno1').focus();
        return;
    }

    if(cno2==""){
        $('.cno2').val("-");
    }

  
    
    if(email1 ==""){
        $('.email1').val("-");
    }

    if(skype ==""){
        $('.skype').val("-");
    }

    if(address==""){
        alert("Permanent address is required");
        $('.address').focus();
        return;
    }

   

    if(contact_name ==""){
        alert("CONTACT PERSON is required");
        $('.contact_name').focus();
        return;
    }

    if(c_relation ==""){
        alert("Relation is required");
        $('.c_relation').focus();
        return;
    }

    if(contact_no ==""){
        alert("Contact person number is required");
        $('.contact_no').focus();
        return;
    }


    if(c_address ==""){
        alert("Contact person address is required");
        $('.c_address').focus();
        return;
    }







    $.ajax({

        url: 'update_process.php',
        type: 'post',
        data: {
            
            'update_barcode' : update_barcode,
            'marital_status' : marital_status,
            'no_children' : no_children,
            'cno1' : cno1,
            'cno2' : cno2,
            'email1' : email1,
            'skype' : skype,
            'address' : address,
            'contact_name' : contact_name,
            'c_relation' : c_relation,
            'contact_no' : contact_no,
            'c_address' : c_address,
           
          
         
        },
        success: function( data ){
         

         location.reload();
        
      
     
         
        },
    
    });



});


var isbuttonActive = document.getElementsByClassName('u_add_____other');
if (isbuttonActive.length > 0) {
    // alert("u_add_____other is active")
    counter_validator += 1;
  
    $(".o_i").attr('class', 'far fa-check-circle correct o_i');
}else{
    // alert("u_add_____other not active")
    $(".o_i").attr('class', 'far fa-times-circle wrong o_i');
}





var isUpdate_skills_buttonActive = document.getElementsByClassName('update_skills');
if (isUpdate_skills_buttonActive.length > 0) {
    // alert("update button skill is active")
    counter_validator += 1;
    $(".h_w_e").attr('class', 'far fa-check-circle correct h_w_e');
}else{
    // alert("update button skill is inactive")
    $(".h_w_e").attr('class', 'far fa-times-circle wrong h_w_e');
}




$('.u_add_____other').on('click', function(){

// alert(update_barcode)

var id_other = $(this).attr('data-id');
var datacno1 = $(this).attr('data-cno1');
var datacno2 = $(this).attr('data-cno2');
var dataemail1 = $(this).attr('data-email1');
var dataskype = $(this).attr('data-skype');
var dataaddress = $(this).attr('data-address');
var dataname = $(this).attr('data-name');
var datacno = $(this).attr('data-cno');
var datamarital_status = $(this).attr('data-marital_status');
var datano_of_children = $(this).attr('data-no_of_children');
var datacrelationship = $(this).attr('data-crelationship');
var datacaddress = $(this).attr('data-caddress');


$('.id_other').val(id_other);
$('.u_marital_status').val(datamarital_status);
$('.u_no_children').val(datano_of_children);
$('.u_cno1').val(datacno1);
$('.u_cno2').val(datacno2);
$('.u_email1').val(dataemail1);
$('.u_skype').val(dataskype);
$('.u___address').val(dataaddress);


$('.u_contact_name').val(dataname);
$('.u_c_relation').val(datacrelationship);
$('.u_contact_no').val(datacno);
$('.u_c_address').val(datacaddress);





});



$('.update_first').on('click', function(){
   
    var hidden_id = $('.hidden_id').val();
    bcode = $('.bcode').val();

    var surname = $('.surname').val();
    var firstname = $('.firstname').val();
    var middlename = $('.middlename').val();
    

    var recent_fullname = $('.recent_fullname').text();
    var fullname = recent_fullname;


    var passport = $('.passport').val();
    var gender = $('.gender').val();
    var dob = $('.dob').val();
    var height = $('.height').val();
    var resume = bcode + "-" + surname + " " + firstname + " " + middlename.charAt(0);
    var objectivesblank = "-";
    var newName; 
    var status = 0;
    var classD = "D";
    var scomment = "";
    var contactperson = contactperson
    var religion = $('.religion').val();
    var place_of_birth = $('.place_of_birth').val();
    var weight_dh = $('.weight_dh').val();
    var blood_type = $('.blood_type').val();
    var country = $('.country').val();
    var msalary = "";
    var category_radio_check
    var previous_agency = $('.previous_agency').val();



    if($('#radio_first').is(':checked')) { 
        category_radio_check = "0";
    }

    if($('#radio_ex').is(':checked')) { 
        category_radio_check = "1";
        if(previous_agency==""){
            alert("No  Agency")
            $('.previous_agency').focus()
            return
        }
    }
    
    
    
    var whole_body_pic = $('.whole_body_pic').val();


    if(recent_fullname != fullname ){
        namevalidtor(firstname , surname);
        recent_fullname = firstname+" " + middlename.charAt(0) +" "+surname;
        alert(recent_fullname)
    }else{
        alert(recent_fullname);
    }

   if(whole_body_pic ==""){

        var recentPhoto = $('.whole_body_pic').attr('data-recentPhoto');
        alert(recentPhoto);

        $.ajax({
    
            url: 'update_process.php',
            type: 'post',
            data: {
         
                'hidden_id2' : hidden_id,
                'bcode' : bcode,
   
                'recent_fullname': recent_fullname,
                'passport': passport,
                'gender':gender,
                'dob': dob,
                'height': height,
                'resume': resume,
                'objectivesblank': objectivesblank,
                'newName': recentPhoto,
                'status': status,
                'classD': classD,
                'scomment': scomment,
                'contactperson': contactperson,
                'religion': religion,
                'place_of_birth': place_of_birth,
                'weight_dh': weight_dh,
                'blood_type': blood_type,
                'country': country,
                'msalary': msalary,
                'category_radio_check': category_radio_check,
                'previous_agency': previous_agency,
            
        
            
            },
            success: function( data ){
                alert(data)
              location.reload()
          
            },
        
        });














   }else{

       

        var file_data = $('.whole_body_pic').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        // alert(form_data);                             
        $.ajax({
            url: 'upload.php', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(php_script_response){
                 newName =  php_script_response// display response from the PHP script, if any
               
    
                 $.ajax({
    
                    url: 'update_process.php',
                    type: 'post',
                    data: {
                 
                        'hidden_id' : hidden_id,
                        'bcode' : bcode,
           
                        'recent_fullname': recent_fullname,
                        'passport': passport,
                        'gender':gender,
                        'dob': dob,
                        'height': height,
                        'resume': resume,
                        'objectivesblank': objectivesblank,
                        'newName': newName,
                        'status': status,
                        'classD': classD,
                        'scomment': scomment,
                        'contactperson': contactperson,
                        'religion': religion,
                        'place_of_birth': place_of_birth,
                        'weight_dh': weight_dh,
                        'blood_type': blood_type,
                        'country': country,
                        'msalary': msalary,
                        'category_radio_check': category_radio_check,
                        'previous_agency': previous_agency,
                    
                
                    
                    },
                    success: function( data ){
                        alert(data)
                      location.reload()
                  
                    },
                
                });
    
            }
         });













   }
   


});


// SAVE EXP DH

$('.save_exp_dh').on('click', function(){


    var cbarcode  = update_barcode;
    var ccountry = $('.ccountry').val();
    var cposition = $('.cposition').val();
    var cdate = $('.cdate').val();
    var ccompany = $('.ccompany').val();



    $.ajax({
 
        url: 'update_process.php',
        type: 'post',
        data: {
            
            'cbarcode' : cbarcode,
            'ccountry' : ccountry,
            'cposition' : cposition,
            'cdate' : cdate,
            'ccompany' : ccompany,
        
           
          
         
        },
        success: function( data ){
         
            alert(data)
            location.reload();
          
        },
    
    });

    

});



var washing = 0;
var cleaning = 0;
var ironing = 0;
var sewing = 0;
var cooking = 0;
var baby_care = 0;




$('#c_washing').change(function () {
    if ($(this).prop("checked")) {
        washing = 1;
    }else{
        washing = 0;
    }
   
});


$('#c_sewing').change(function () {
    if ($(this).prop("checked")) {
        sewing = 1;
    }else{
        sewing = 0;
    }
   
});

$('#c_cleaning').change(function () {
    if ($(this).prop("checked")) {
        cleaning = 1;
    }else{
        cleaning = 0;
    }
   
});

$('#c_cooking').change(function () {
    if ($(this).prop("checked")) {
        cooking = 1;
    }else{
        cooking = 0;
    }
   
});


$('#c_ironing').change(function () {
    if ($(this).prop("checked")) {
        ironing = 1;
    }else{
        ironing = 0;
    }
   
});

$('#c_babycare').change(function () {
    if ($(this).prop("checked")) {
        baby_care = 1;
    }else{
        baby_care = 0;
    }
   
});




var English_flexRadioDefault1 = 0;
var English_flexRadioDefault2 = 0;
var English_flexRadioDefault3 = 0;
var english = 0

var arabic_flexRadioDefault1 = 0;
var arabic_flexRadioDefault2 = 0;
var arabic_flexRadioDefault3 = 0;
var arabic = 0;

var mandarin_flexRadioDefault1 = 0;
var mandarin_flexRadioDefault2 = 0;
var mandarin_flexRadioDefault3 = 0;
var mandarin = 0;

// English
$('#English_flexRadioDefault1').change(function () {
    if ($(this).prop("checked")) {
        english = 1;
    }
   
});

$('#English_flexRadioDefault2').change(function () {
    if ($(this).prop("checked")) {
        english = 2;
    }
   
});

$('#English_flexRadioDefault3').change(function () {
    if ($(this).prop("checked")) {
        english = 3;
    }
   
});

// Arabic
$('#arabic_flexRadioDefault1').change(function () {
    if ($(this).prop("checked")) {
        arabic = 1;
    }
   
});

$('#arabic_flexRadioDefault2').change(function () {
    if ($(this).prop("checked")) {
        arabic = 2;
    }
   
});

$('#arabic_flexRadioDefault3').change(function () {
    if ($(this).prop("checked")) {
        arabic = 3;
    }
   
});


// Mandarin

$('#mandarin_flexRadioDefault1').change(function () {
    if ($(this).prop("checked")) {
        mandarin = 1;
    }
   
});

$('#mandarin_flexRadioDefault2').change(function () {
    if ($(this).prop("checked")) {
        mandarin = 2;
    }
   
});

$('#mandarin_flexRadioDefault3').change(function () {
    if ($(this).prop("checked")) {
        mandarin = 3;
    }
   
});




$('.save_skills').on('click', function(){

    var skill_barcode  = update_barcode;


    $.ajax({

        url: 'update_process.php',
        type: 'post',
        data: {
            
            'skill_barcode' : skill_barcode,

            'washing' : washing,
            'cleaning' : cleaning,
            'ironing' : ironing,
            'sewing' : sewing,
            'cooking' : cooking,
            'baby_care' : baby_care,

            'english' : english,
            'arabic' : arabic,
            'mandarin' : mandarin,
        
           
          
         
        },
        success: function( data ){
         
            alert(data)
            location.reload();
          
        },
    
    });



});




$('.sk_update').on('click', function(){
    var u_id = $(this).attr('data-id');
    var u_ccountry = $(this).attr('data-ccountry');
    var u_cposition = $(this).attr('data-cposition');
    var u_cdate = $(this).attr('data-cdate');
    var u_ccompany = $(this).attr('data-employer');

    
    $('.update_id').val(u_id);
    $('.u_ccountry').val(u_ccountry);
    $('.u_cposition').val(u_cposition);
    $('.u_cdate').val(u_cdate);
    $('.u_ccompany').val(u_ccompany);
  


});




function namevalidtor(firstname , lastname){
    if(firstname==""){
        alert("Please enter the Firstname");
        throw new Error("Firstname is Required");
      
    }else if(lastname==""){
        alert("Please enter the Lastname");
        throw new Error("Lastname is Required");
     
    }
}




$('.update_other_info').on('click', function(){

    var id_other = $('.id_other').val();
    var u_marital_status = $('.u_marital_status').val();
    var u_no_children = $('.u_no_children').val();
    var u_cno1 = $('.u_cno1').val();
    var u_cno2 = $('.u_cno2').val();
    var u_email1 = $('.u_email1').val();
    var u_skype = $('.u_skype').val();
    var address = $('.u___address').val();
    var u_contact_name = $('.u_contact_name').val();
    var u_c_relation = $('.u_c_relation').val();
    var u_contact_no = $('.u_contact_no').val();
    var u_c_address = $('.u_c_address').val();
    

    $.ajax({

        url: 'update_process.php',
        type: 'post',
        data: {
            
            'id_other' : id_other,
            'u_marital_status' : u_marital_status,
            'u_no_children' : u_no_children,
            'u_cno1' : u_cno1,
            'u_cno2' : u_cno2,
            'u_email1' : u_email1,
            'u_skype' : u_skype,
            'address' : address,
            'u_contact_name' : u_contact_name,
            'u_c_relation' : u_c_relation,
            'u_contact_no' : u_contact_no,
            'u_c_address' : u_c_address,

        },
        success: function( data ){
         
            alert(data)
            location.reload();
          
        },
    
    });

});



// Height Converter
$('#btnConvert').on('click', function(){


    var feet = $('#feet').val();
    var inches = $('#inches').val();
    var height = feet * 12 + parseInt(inches, 10);  
    var result = height *= 2.54;
    $('.height').val(parseFloat(Math.round(result * 100) / 100).toFixed(2));
    $('.height_converter_modal').modal('toggle');

    


});


// update_exp_dh
$('.update_exp_dh').on('click', function(){

  
var update_id = $('.update_id').val();
var u_ccountry = $('.u_ccountry').val();
var u_cposition = $('.u_cposition').val();
var u_cdate = $('.u_cdate').val();
var u_ccompany = $('.u_ccompany').val();

$.ajax({

    url: 'update_process.php',
    type: 'post',
    data: {
        
        'update_id' : update_id,
        'u_ccountry' : u_ccountry,
        'u_cposition' : u_cposition,
        'u_cdate' : u_cdate,
        'u_ccompany' : u_ccompany,
      
     
 
    },
    success: function( data ){
     
        alert(data);
        location.reload();
      
    },

});



});


$('.update_skills').on('click', function(){

    var skillId = $('.skillId').val();

  
 
        var isCheck_washing 
        if($('#u_c_washing').is(':checked')) { 
            isCheck_washing = "1";
        }else{
            isCheck_washing = "0";
        }
        
        var isCheck_sewing
        if($('#u_c_sewing').is(':checked')) { 
            isCheck_sewing = "1";
        }else{
            isCheck_sewing = "0";
        }
        
        var isCheck_cleaning
        if($('#u_c_cleaning').is(':checked')) { 
            isCheck_cleaning = "1";
        }else{
            isCheck_cleaning = "0";
        }
        
        var isCheck_cooking
        if($('#u_c_cooking').is(':checked')) { 
            isCheck_cooking = "1";
        }else{
            isCheck_cooking = "0";
        }
        
        var isCheck_ironing
        if($('#u_c_ironing').is(':checked')) { 
            isCheck_ironing = "1";
        }else{
            isCheck_ironing = "0";
        }
        
        var isCheck_babycare
        if($('#u_c_babycare').is(':checked')) { 
            isCheck_babycare = "1";
        }else{
            isCheck_babycare = "0";
        }

  
 
    var english ;
    var arabic;
    var mandarin ;


   
    if($('#u_English_flexRadioDefault1').is(':checked')) { 
        english = 1;
    }else if($('#u_English_flexRadioDefault2').is(':checked')) { 
        english = 2;
    }else if($('#u_English_flexRadioDefault3').is(':checked')) { 
        english = 3;
    }else{
        english = 0;
    }

    if($('#u_arabic_flexRadioDefault1').is(':checked')) { 
        arabic = 1;
    }else if($('#u_arabic_flexRadioDefault2').is(':checked')) { 
        arabic = 2;
    }else if($('#u_arabic_flexRadioDefault3').is(':checked')) { 
        arabic = 3;
    }else{
        arabic = 0;
    }

    if($('#u_mandarin_flexRadioDefault1').is(':checked')) { 
        mandarin = 1;
    }else if($('#u_mandarin_flexRadioDefault2').is(':checked')) { 
        mandarin = 2;
    }else if($('#u_mandarin_flexRadioDefault3').is(':checked')) { 
        mandarin = 3;
    }else{
        mandarin = 0
    }


    $.ajax({ 

        url: 'update_process.php',
        type: 'post',
        data: {
            'skillId' : skillId,
            'isCheck_washing' : isCheck_washing,
            'isCheck_sewing' : isCheck_sewing,
            'isCheck_cleaning' : isCheck_cleaning,
            'isCheck_cooking' : isCheck_cooking,
            'isCheck_ironing' : isCheck_ironing,
            'isCheck_babycare' : isCheck_babycare,
            'english' : english,
            'arabic' : arabic,
            'mandarin' : mandarin, 
     
        },
        success: function( data ){
         
            alert(data);
            location.reload();
          
        },
    
    });

});



$('.convert_kgs').on('click', function(){
    var kgs_input = $('.kgs_input').val();
    var result = kgs_input * 2.20462262185;
    var output =   Number((result).toFixed(1));
    $('.weight_dh').val(output);

    $('#lbs_modal').modal('toggle');
    

});


$('.educ_Save').on('click', function(){
    
    var u_num = $('.u_num').val();
    var degree = $('.degree').val();
    var school = $('.school').val();
    var year = $('.year').val();


   

    $.ajax({ 

        url: 'update_process.php',
        type: 'post',
        data: {
            'u_num___11' : u_num,
            'degree' : degree,
            'school' : school,
            'year' : year,
          
       
     
        },
        success: function( data ){
         
            alert(data);
            location.reload();
          
        },
    
    });





});

$('.add______education').on('click', function(){

var barcode_educ = $(this).attr('data-barccode');

    $('.u_num').val(barcode_educ);


});



$('.update_________educ').on('click', function(){

    var data_id = $(this).attr('data-id');
    var data_unum = $(this).attr('data-unum');
    var data_degree = $(this).attr('data-degree');
    var data_school = $(this).attr('data-school');
    var data_year = $(this).attr('data-year');
    
      
        $('.id_update_educ').val(data_id);
        $('.update_u_num').val(data_unum);
        $('.update_degree').val(data_degree);
        $('.update_school').val(data_school);
        $('.update_year').val(data_year);


      

  

});



$('.update__educ').on('click', function(){


    var u___data_id = $('.id_update_educ').val();
    var u___data_unum = $('.update_u_num').val();
    var u___data_degree = $('.update_degree').val();
    var u___data_school = $('.update_school').val();
    var u___data_year = $('.update_year').val();

    


    $.ajax({ 

        url: 'update_process.php',
        type: 'post',
        data: {
            'u___data_id' : u___data_id,
            'u___data_unum' : u___data_unum,
            'u___data_degree' : u___data_degree,
            'u___data_school' : u___data_school,
            'u___data_year' : u___data_year,

     
        },
        success: function( data ){
         
            alert(data);
            location.reload();
          
        },
    
    });

});



$('.remark_update').on('click', function(){
    var barcode_remarks = $('.barcode_remarks').val();
    var remarks =  $('.remarks_textarea').val();

 

   $.ajax({ 

    url: 'update_process.php',
    type: 'post',
    data: {
        'barcode_remarks' : barcode_remarks,
        'remarks' : remarks,

 
    },
    success: function( data ){
     
        alert(data);
        location.reload();
      
    },

});

});


if(counter_validator == 5){
  
    $('.view_application_form').show();
    $('.title__status').text('Completed Information')
  
}else{
    $('.title__status').text('Incomplete Information')
    $('.view_application_form').hide();
  
}
