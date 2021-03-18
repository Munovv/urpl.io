$('#url-button').click(function(){
  $('#url-button').fadeOut("slow",function(){
    $("#url-table").fadeIn();
    TweenMax.from("#url-table", .2, { scale: 0, ease:Sine.easeInOut});
    TweenMax.to("#url-table", .2, { scale: 1, ease:Sine.easeInOut});
  });
  $('#logout-button').fadeOut("slow");
  $('#github-button').fadeOut("slow");
  $('.title').fadeOut("slow");
});

$(".close-btn").click(function(){
  TweenMax.from("#url-table", .2, { scale: 1, ease:Sine.easeInOut});
  TweenMax.to("#url-table", .2, { left:"0px", scale: 0, ease:Sine.easeInOut});
  $("#url-table").fadeOut(200, function(){
    $("#logout-button").fadeIn(400);
    $("#url-button").fadeIn(400);
    $("#github-button").fadeIn(400);
    $(".title").fadeIn(400);
  });
});

$("#logout-button").click(function() {
  $.ajax({
    type: "POST",
    url: '/logout',
    contentType: false,
    cache: false,
    processData: false,
    success: function(result) {
      window.location.href = '/';
    }
  });
});

$(document).ready(function() {
    $('#main-table').DataTable();

    $('#edit').submit(function(event) {
  		if ($(this).attr('id') == 'no_ajax') {
  			return;
  		}
  		var json;
  		event.preventDefault();
  		$.ajax({
  			type: $(this).attr('method'),
  			url: $(this).attr('action'),
  			data: new FormData(this),
  			contentType: false,
  			cache: false,
  			processData: false,
  			success: function(result) {
          console.log(result);
          json = jQuery.parseJSON(result);
          if (json.status == "Success") {
            Swal.fire({
              confirmButtonColor: "#6957ad",
              icon: 'success',
              title: json.status,
              text: json.message,
            });
  				} else {
            Swal.fire({
              confirmButtonColor: "#6957ad",
              icon: 'error',
              title: json.status,
              text: json.message,
            });
  				}
  			},
  		});
  	});
});
