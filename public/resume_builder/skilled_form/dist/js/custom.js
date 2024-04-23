

$('.gen_me_save').one('click', function(){
    $(this).attr("disabled", true);

    var lst_bcode = $('.lst_bcode').val();
    var nxt_bcode = $('.nxt_bcode').val();
    var add_higher_num = $('.add_higher_num').val();



    // alert(lst_bcode)
    // alert(nxt_bcode)


            swal({
                title: "Are you sure?",
                text: "Once Generated, you will save all generated barcode in the database. Please generate min. of 50pcs ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Successfully Generated", {
                        icon: "success",
                    });


                    $('.swal-button--confirm').one('click', function(){
                        $.ajax({ 

                            url: 'processor.php',
                            type: 'POST',
                            data: {
                                'lst_bcode' : lst_bcode,
                                'nxt_bcode' : nxt_bcode,
                                'add_higher_num' : add_higher_num,
                                'year_is' : year_is,
                                'code_type' : code_type,
                                
                        
                         
                            },
                            success: function( data ){
                             
                                var next_barcode = $('.nxt_bcode').val();
                                var add_higher_num = $('.add_higher_num').val();
                                var yr_created = year_is;
                                var url = 'gen_me.php';
                                var data_input = 'start_page=' + next_barcode + '&end_page=' + add_higher_num +
                                    '&yr_created=' + yr_created 
            
                                window.open(url + '?' + data_input, '_blank');
                                setTimeout(
                                    function() {
                                        location.reload();
                                    }, 2000);
                              
                            },
                        
                        });
                    });

                 


                } else {
                    swal("Generating Cancelled");
                }
            });




});



$('.preview_only').on('click', function(){
    
    var next_barcode = $('.nxt_bcode').val();
    var add_higher_num = $('.add_higher_num').val();
    var yr_created = year_is;
    var url = 'gen_me.php';
    var data_input = 'start_page=' + next_barcode + '&end_page=' + add_higher_num +
        '&yr_created=' + yr_created 

    window.open(url + '?' + data_input, '_blank');
    setTimeout(
        function() {
            location.reload();
        }, 2000);


});