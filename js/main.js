$(document).ready(function(){
	$('#togglebutton').click(function(){
		$('#mobiledropdown').toggle();
	});
})

/*SCROLL TO TOP ARROW*/
$(document).ready(function(){

  $(window).scroll(function(){
    if($(this).scrollTop() > 1){
      $('#topBtn').fadeIn(1000);
    } else{
      $('#topBtn').fadeOut(1000);
    }
  });

  $("#topBtn").click(function(){
    $('html ,body').animate({scrollTop : 0},800);
  });
});




