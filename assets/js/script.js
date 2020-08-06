$('button').on('click', function () {
	$('#rating-kecocokan').slideToggle(200);
	$('#perhitungan').slideToggle(200);
})


$('.nav-link').on('click', function () {
	$('.nav-link').removeClass('active');
	$('.nav-item').addClass('active');

});
