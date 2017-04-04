/* WRITE YOUR JS */

// get dom element by class: delete
$('.btn-danger').click(function(e){
	if(!confirm("Are you sure you want to delete this item?")){
		e.preventDefault();
	}
});
// show prompt "Are you sure?"

	// if user say YES, open url from bttn/link

	// if user say NO, nothing happen