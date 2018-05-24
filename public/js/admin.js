/** add active class and stay opened when selected */
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.sidebar-menu a').filter(function() {
	 return this.href == url;
}).parent().addClass('active');

// for treeview
$('ul.treeview-menu a').filter(function() {
	 return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');


$( "#nurse_category_is_active" ).click(function() {
	if($('#nurse_category_is_active').is(':checked')) {
		$('#nurse_category_is_active_val').val('1');
	} else {
		$('#nurse_category_is_active_val').val('0');
	}
});




$('#testing-confirm').on('click', function () {
	return confirm($(this).data('confirm'));
});
