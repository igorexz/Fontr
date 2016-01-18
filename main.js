$(function(){
	var text = $('.result');
	var input = $('.input_text');
	input.on('keydown', function () {
  		setTimeout(function () {
    		text.html(input.val());
  		}, 0); // On next loop
	});
});