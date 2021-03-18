$('#login-button').click(function(){
  $('#login-button').fadeOut("slow",function(){
    $("#login-form").fadeIn();
    TweenMax.from("#login-form", .2, { scale: 0, ease:Sine.easeInOut});
    TweenMax.to("#login-form", .2, { scale: 1, ease:Sine.easeInOut});
  });
  $('#admin-button').fadeOut("slow");
  $('#url-button').fadeOut("slow");
  $('#github-button').fadeOut("slow");
  $('.title').fadeOut("slow");
});

$('#url-button').click(function(){
  $('#url-button').fadeOut("slow",function(){
    $("#url-form").fadeIn();
    TweenMax.from("#url-form", .2, { scale: 0, ease:Sine.easeInOut});
    TweenMax.to("#lurl-form", .2, { scale: 1, ease:Sine.easeInOut});
  });
  $('#login-button').fadeOut("slow");
  $('#admin-button').fadeOut("slow");
  $('#github-button').fadeOut("slow");
  $('.title').fadeOut("slow");
});

$(".close-btn").click(function(){
  TweenMax.from("#login-form", .2, { scale: 1, ease:Sine.easeInOut});
  TweenMax.to("#login-form", .2, { left:"0px", scale: 0, ease:Sine.easeInOut});
  $("#login-form, #url-form").fadeOut(400, function(){
    $("#login-button").fadeIn(400);
    $("#url-button").fadeIn(400);
    $('#admin-button').fadeIn("slow");
    $("#github-button").fadeIn(400);
    $(".title").fadeIn(400);
  });
});

$("#admin-button").click(function() {
  window.location.href = '/dashboard';
});

$(document).ready(function() {
	$('#url-data').submit(function(event) {
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
          $('#url-result').html('Your url: ' + json.url);
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

  $('#login-data').submit(function(event) {
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
        if (json.url) {
					window.location.href = '/' + json.url;
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
