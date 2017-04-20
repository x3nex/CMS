/* WRITE YOUR JS */


$('.btn-danger').click(function(e){
	e.preventDefault();
 	var linkURL = $(this).attr("href");
    warnBeforeRedirect(linkURL);
});

function warnBeforeRedirect(linkURL){

	swal({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: 'No, cancel!',
		confirmButtonClass: 'btn btn-success',
		cancelButtonClass: 'btn btn-danger',
		buttonsStyling: false
	}).then(

	function () {
	
		window.location.href = linkURL;
	}, 
	function (dismiss) {
		
	});

}