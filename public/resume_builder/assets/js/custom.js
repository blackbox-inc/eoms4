$('#example').DataTable({
    "order": [[ 0, "desc" ]]
});
    

$('.screen_saver').on('click', function(){
   
    var num0 = 0;
    
     $.ajax({
         url: 'processors.php',
         type: 'POST',
         data: {
             'num0' : num0,
           
         },
         success: function( data ){
             Swal.fire(
                 'Activated',
                  data,
                 'success'
               )
         }   
     });
 }); 



$('.new_candidates').on('click', function(){
   
   var num1 = 1;
   
    $.ajax({
        url: 'processors.php',
        type: 'POST',
        data: {
            'num1' : num1,
          
        },
        success: function( data ){
            Swal.fire(
                'Activated',
                 data,
                'success'
              )
        }   
    });
}); 






$('.old_candidates').on('click', function(){
    var num2 = 1;
   
    $.ajax({
        url: 'processors.php',
        type: 'POST',
        data: {
            'num2' : num2,
          
        },
        success: function( data ){
            Swal.fire(
                'Activated',
                 data,
                'success'
              )
        }   
    });
});

$('.visitors').on('click', function(){
    var num3 = 1;
   
    $.ajax({
        url: 'processors.php',
        type: 'POST',
        data: {
            'num3' : num3,
          
        },
        success: function( data ){
            Swal.fire(
                'Activated',
                 data,
                'success'
              )
        }   
    });
});

$('.logout').on('click', function(){
    var num4 = 1;
   
    $.ajax({
        url: 'processors.php',
        type: 'POST',
        data: {
            'num4' : num4,
          
        },
        success: function( data ){
            Swal.fire(
                'Activated',
                 data,
                'success'
              )
               // location.reload();
        }   
    });
});





$(function() {
    var $tabButtonItem = $('#tab-button li'),
        $tabSelect = $('#tab-select'),
        $tabContents = $('.tab-contents'),
        activeClass = 'is-active';
  
    $tabButtonItem.first().addClass(activeClass);
    $tabContents.not(':first').hide();
  
    $tabButtonItem.find('a').on('click', function(e) {
      var target = $(this).attr('href');
  
      $tabButtonItem.removeClass(activeClass);
      $(this).parent().addClass(activeClass);
      $tabSelect.val(target);
      $tabContents.hide();
      $(target).show();
      e.preventDefault();
    });
  
    $tabSelect.on('change', function() {
      var target = $(this).val(),
          targetSelectNum = $(this).prop('selectedIndex');
  
      $tabButtonItem.removeClass(activeClass);
      $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
      $tabContents.hide();
      $(target).show();
    });
  });